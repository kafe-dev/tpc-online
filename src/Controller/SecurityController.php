<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

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
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('admin_dashboard_index');
        }
        $error = $authenticationUtils->getLastAuthenticationError();

        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    /**
     * Action login.
     *
     * This action is used to handle the login request
     * and display the login page.
     */
    #[Route('/logout', name: 'logout')]
    public function logout(Security $security): Response
    {
        return $security->logout();
    }
}
