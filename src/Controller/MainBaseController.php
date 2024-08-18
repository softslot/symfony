<?php

declare(strict_types=1);

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;

#[AsController]
class MainBaseController extends BaseController
{
    public function __construct(
        private readonly LoggerInterface $logger,
    ) {
    }

    #[Route(path: '/', name: 'app_homepage', methods: ['GET'])]
    public function homepage(): Response
    {
        $this->logger->info('{user} is voting on answer!', [
            'user' => $this->getUser()->getUserIdentifier(),
        ]);

        return $this->render('main/homepage.html.twig');
    }
}
