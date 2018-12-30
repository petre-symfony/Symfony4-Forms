<?php
namespace App\Controller;


use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminUtilityController extends AbstractController {
	/**
	 * @Route("/admin/utility/users", methods="GET")
	 */
	public function getUserApi(UserRepository $userRepo){
		$users = $userRepo->findAllEmailAlphabetical();

		return $this->json([
			'users' => $users
		], 200, [], ['groups' => ['main']]);
	}
}