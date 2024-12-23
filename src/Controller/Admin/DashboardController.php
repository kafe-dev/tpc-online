<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Class DashboardController.
 *
 * This is the default controller for this admin module.
 */
#[Route('/admin', name: 'admin_dashboard_')]
class DashboardController extends AbstractController
{
    /**
     * Action index.
     *
     * This is the default action for this controller.
     */
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('admin/dashboard/index.html.twig');
    }
}
