<?php
namespace App\Form\DataTransformer;


use App\Entity\User;
use Symfony\Component\Form\DataTransformerInterface;

class EmailToUserTransformer implements  DataTransformerInterface {
	public function transform($value) {
		if(null === false){
			return '';
		}

		if(!$value instanceof User){
			throw new \LogicException('The UserSelectTextType can only be used with User objects.');
		}

		return $value->getEmail();
	}

	public function reverseTransform($value) {
		dd('reverse transform', $value);
	}

}