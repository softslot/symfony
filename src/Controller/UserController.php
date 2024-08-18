<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class UserController extends BaseController
{
    #[IsGranted('IS_AUTHENTICATED_REMEMBERED')]
    #[Route('/api/me', name: 'api_me', methods: ['GET'])]
    public function apiMe(): JsonResponse
    {
        return $this->json($this->getUser(), 200, [], [
            'groups' => 'user:read',
        ]);
    }
}
