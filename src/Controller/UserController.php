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
        // Pobieranie przepisu według ID
        $users = $entityManager->getRepository(User::class)->find($id);

        if (!$users) {
            throw $this->createNotFoundException('Przepis nie został uytkownika');
        }

        dd($users);
    }
}
