<?php

namespace App\Form;


use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;

class UserSelectTextType extends AbstractType {
	public function getParent() {
		return TextType::class;
	}

}