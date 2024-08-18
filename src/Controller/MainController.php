<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;

#[AsController]
class MainController extends BaseController
{
    #[Route(path: '/', name: 'app_homepage', methods: ['GET'])]
    public function homepage(): Response
    {
        return $this->render('main/homepage.html.twig');
    }
}
