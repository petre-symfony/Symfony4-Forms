$(document).ready(function () {
	$('.js-user-autocomplete').each(function () {
		var autocompleteURL = $(this).data('autocomplete-url');
		$(this).autocomplete({hint: false}, [{
			source: function (query, cb) {
				$.ajax({
					url: autocompleteURL
				})
				.then(function (data) {
					cb(data.users);
				});
			},
			displayKey: 'email',
			debounce: 500
		}])
	});

})