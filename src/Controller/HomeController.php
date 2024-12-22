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
        $title = "Homepage";

        return $this->render('home/index.html.twig', ['title' => $title]);
    }

    /**
     * Action shop.
     *
     * This is shop page controller
     */
    #[Route('/shop', name: 'shop')]
    public function shop(): Response
    {
        $title = "Shop";

        return $this->render('home/shop.html.twig', ['title' => $title]);
    }

    /**
     * Action Product Details.
     *
     * This is Product Details page controller
     */
    #[Route('/product-details', name: 'product_details')]
    public function productDetails(): Response
    {
        $title = "Product Details";

        return $this->render('home/product_details.html.twig', ['title' => $title]);
    }

    /**
     * Action Product Compare.
     *
     * This is Product Details page controller
     */
    #[Route('/product-compare', name: 'product_compare')]
    public function productCompare(): Response
    {
        $title = "Product Compare";

        return $this->render('home/product_compare.html.twig', ['title' => $title]);
    }

    /**
     * Action Cart.
     *
     * This is Cart page controller
     */
    #[Route('/cart', name: 'cart')]
    public function cart(): Response
    {
        $title = "Cart";

        return $this->render('home/cart.html.twig', ['title' => $title]);
    }

    /**
     * Action Checkout.
     *
     * This is Checkout page controller
     */
    #[Route('/checkout', name: 'checkout')]
    public function checkout(): Response
    {
        $title = "Checkout";

        return $this->render('home/checkout.html.twig', ['title' => $title]);
    }

    /**
     * Action Wishlist.
     *
     * This is Wishlist page controller
     */
    #[Route('/wishlist', name: 'wishlist')]
    public function wishlist(): Response
    {
        $title = "Wishlist";

        return $this->render('home/wishlist.html.twig', ['title' => $title]);
    }

    /**
     * Action Contact Us.
     *
     * This is Contact Us page controller
     */
    #[Route('/contact-us', name: 'contact_us')]
    public function contact(): Response
    {
        $title = "Contact Us";

        return $this->render('home/contact_us.html.twig', ['title' => $title]);
    }

    /**
     * Action About Us.
     *
     * This is About Us page controller
     */
    #[Route('/about-us', name: 'about_us')]
    public function about(): Response
    {
        $title = "About Us";

        return $this->render('home/about_us.html.twig', ['title' => $title]);
    }

    /**
     * Action Register.
     *
     * This is Register page controller
     */
    #[Route('/register', name: 'register')]
    public function register(): Response
    {
        $title = "Register";

        return $this->render('home/register.html.twig', ['title' => $title]);
    }

    /**
     * Action Login.
     *
     * This is Login page controller
     */
    #[Route('/login', name: 'login')]
    public function login(): Response
    {
        $title = "Login";

        return $this->render('home/login.html.twig', ['title' => $title]);
    }

    /**
     * Action 404.
     *
     * This is 404-page controller
     */
    #[Route('/404', name: '404')]
    public function page404(): Response
    {
        $title = "Page Not Found";

        return $this->render('home/404.html.twig', ['title' => $title]);
    }

    /**
     * Action forgot password.
     *
     * This is Forgot password page controller
     */
    #[Route('/forgot-password', name: 'forgot_password')]
    public function forgotPassword(): Response
    {
        $title = "Forgot Password";

        return $this->render('home/forgot_password.html.twig', ['title' => $title]);
    }

    /**
     * Action blog.
     *
     * This is Blog page controller
     */
    #[Route('/blog', name: 'blog')]
    public function blog(): Response
    {
        $title = "Blog";

        return $this->render('home/blog.html.twig', ['title' => $title]);
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

        return $this->render('home/blog_details.html.twig', ['title' => $title]);
    }
}
