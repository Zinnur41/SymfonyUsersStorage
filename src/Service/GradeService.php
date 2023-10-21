<?php

namespace App\Service;

use App\Entity\Grades;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class GradeService
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function addGrade(int $value, int $id): void
    {
        $user = $this->entityManager->getRepository(User::class)->find($id);
        $grade = new Grades();
        $grade->setUsers($user);
        $grade->setGrade($value);
        $this->entityManager->persist($grade);
        $this->entityManager->flush();
    }
}