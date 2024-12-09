<?php

namespace App\Controller;

use App\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class UsersController extends AbstractController
{
    #[Route('/users', name: 'app_user')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/UsersController.php',
        ]);
    }

    #[Route('/users/{id}', name: 'app_users')]
    public function usersList(int $id, EntityManagerInterface $entityManager): JsonResponse
    {
        $user = $entityManager->getRepository(Users::class)->find($id);

        if (!$user) {
            return $this->json([
                'User not found!'
            ]);
        }

        return $this->json([
            'id' => $user->getId(),
            'name' => $user->getName(),
            'second_name' => $user->getSecondName(),
            'last_name' => $user->getLastName(),
            'age' => $user->getAge(),
        ]);
    }
}
