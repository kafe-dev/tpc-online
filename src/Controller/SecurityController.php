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
#[Route('/security', name: 'app_security_')]
class SecurityController extends AbstractController
{

    /**
     * Action login.
     * 
     * This action is used to handle the login request
     * and display the login page.
     */
    #[Route('/login', name: 'login')]
    public function login(): Response
    {
        return $this->render('security/login.html.twig');
    }
}
