<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Service\GradeService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GradeController extends AbstractController
{
    #[Route('/addGrade', name: 'app_add_grade',methods: 'POST')]
    public function index(GradeService $gradeService, UserRepository $userRepository): Response
    {
        $value = $_POST['value'];
        $userId = $_POST['userId'];
        $gradeService->addGrade($value, $userId);
        return $this->redirectToRoute('app_user');
    }
}
