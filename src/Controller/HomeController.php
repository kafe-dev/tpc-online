<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Class HomeController.
 *
 * This is the default controller for this app.
 */
#[Route(name: 'app_home_')]
class HomeController extends AbstractController
{
    /**
     * Action index.
     *
     * This is the default action for this controller.
     */
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }
}
