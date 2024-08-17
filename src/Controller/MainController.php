<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;

#[AsController]
class MainController extends Controller
{
    #[Route(path: '/', name: 'app.home', methods: ['GET'])]
    public function home(): JsonResponse
    {
        return new JsonResponse([]);
    }
}
