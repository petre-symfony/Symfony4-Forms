<?php
namespace App\Form\DataTransformer;


use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\Form\DataTransformerInterface;

class EmailToUserTransformer implements  DataTransformerInterface {

	/**
	 * @var UserRepository
	 */
	private $userRepo;

	public function __construct(UserRepository $userRepo) {
		$this->userRepo = $userRepo;
	}
	
	public function transform($value) {
		if(null === $value){
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