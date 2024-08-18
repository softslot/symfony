<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;

#[AsController]
class AdminBaseController extends BaseController
{
    #[Route(path: '/admin', name: 'admin', methods: ['GET'])]
    public function dashboard(): JsonResponse
    {
        $a = 1;
        $b = 2;

        return new JsonResponse([]);
    }
}
