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
}
