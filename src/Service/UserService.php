<?php

namespace App\Service;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserService
{
    private  $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getAllUsers(): array
    {
       return $this->entityManager->getRepository(User::class)->findAll();
    }

    public function addUser(array $fields): void
    {
        $user = new User();
        $user->setFirstname($fields['firstname']);
        $user->setSecondname($fields['secondname']);
        $user->setThirdname($fields['thirdname']);
        $user->setEmail($fields['email']);
        $user->setPassword($fields['password']);
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

    public function deleteUser(int $id): void
    {
        $user = $this->entityManager->getRepository(User::class)->find($id);
        $this->entityManager->remove($user);
        $this->entityManager->flush();
    }
}