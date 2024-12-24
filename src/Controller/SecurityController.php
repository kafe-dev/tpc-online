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
        $error = $authenticationUtils->getLastAuthenticationError();
        $customErrorMessage = null;

        if ($error) {
            $errorMessage = $error->getMessage();
           if($errorMessage == 'Email không tồn tại trong hệ thống!'){
               $customErrorMessage = 'Email không tồn tại trong hệ thống!';
           }else{
               // Check the type of error
               $customErrorMessage = match (get_class($error)) {
                   'Symfony\Component\Security\Core\Exception\BadCredentialsException' => 'Tài khoản hoặc mật khẩu không đúng, vui lòng thử lại!',
                   'Symfony\Component\Security\Core\Exception\CustomUserMessageAccountStatusException' => $error->getMessage(),
                   'Symfony\Component\Security\Core\Exception\TooManyLoginAttemptsAuthenticationException' => 'Đăng nhập sai quá số lần cho phép!',
                   default => 'Sai thông tin đăng nhập, vui lòng thử lại!',
               };
           }

        }
        if ($this->getUser()) {
            if ($this->isGranted('ROLE_SUPER_ADMIN') || $this->isGranted('ROLE_ADMIN') || $this->isGranted('ROLE_MANAGER')) {
                return $this->redirectToRoute('admin_dashboard_index');
            }

            if ($this->isGranted('ROLE_USER')) {
                return $this->redirectToRoute('app_home_index');
            }
        }
        $lastUsername = $authenticationUtils->getLastUsername();
        $title = "Đăng nhập";
        return $this->render('security/login.html.twig', [
            'title' => $title,
            'last_username' => $lastUsername,
            'error' => $customErrorMessage,
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
