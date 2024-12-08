<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/UserController.php',
        ]);
    }

    #[Route('/users/{id}', name: 'app_users')]
    public function usersList(int $id, EntityManagerInterface $entityManager): JsonResponse
    {
        $user = $entityManager->getRepository(User::class)->find($id);

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
