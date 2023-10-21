<?php

namespace App\Controller;

use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/', name: 'app_user')]
    public function index(UserService $userService): Response
    {
        $users = $userService->getAllUsers();
        return $this->render('users/index.html.twig', [
            'users' => $users
        ]);
    }

    #[Route('/addUser', name: 'app_show_add_form', methods: 'GET')]
    public function showFormAddUser(): Response
    {
        return $this->render('users/addUser.html.twig');
    }
    #[Route('/addUser', name: 'app_add_user', methods: 'POST')]
    public function addUser(UserService $userService): Response
    {
        $field = [
            'firstname' => $_POST['firstname'],
            'secondname' => $_POST['secondname'],
            'thirdname' => $_POST['thirdname'],
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];
        $userService->addUser($field);
        return $this->redirectToRoute('app_user');
    }
    #[Route('/deleteUser', name: 'app_user_deleteUser', methods: 'POST')]
    public function deleteUser(UserService $userService): Response
    {
        $userService->deleteUser($_POST['id']);
        return $this->redirectToRoute('app_user');
    }
}
