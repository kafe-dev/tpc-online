<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
/**
 * Class BlogController.
 *
 * This is the controller for blog
 */
#[Route(name: 'app_home_')]
class BlogController extends AbstractController
{
    /**
     * Action blog.
     *
     * This is Blog page controller
     */
    #[Route('/blog', name: 'blog')]
    public function blog(): Response
    {
        $title = "Blog";

        return $this->render('blog/blog.html.twig', ['title' => $title]);
    }

    /**
     * Action blog details.
     *
     * This is Blog Details page controller
     */
    #[Route('/blog-details', name: 'blog_details')]
    public function blogDetails(): Response
    {
        $title = "Blog Details";

        return $this->render('blog/blog_details.html.twig', ['title' => $title]);
    }
}
