<?php

namespace App\Form;


use App\Form\DataTransformer\EmailToUserTransformer;
use App\Repository\UserRepository;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserSelectTextType extends AbstractType {
	/**
	 * @var UserRepository
	 */
	private $userRepo;

	public function __construct(UserRepository $userRepo) {
		$this->userRepo = $userRepo;
	}

	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->addModelTransformer(new EmailToUserTransformer($this->userRepo));
	}

	public function getParent() {
		return TextType::class;
	}

	public function configureOptions(OptionsResolver $resolver) {
		$resolver->setDefaults([
			'invalid_message' => 'Hmm, user not found!'
		]);
	}


}