<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
/**
 * Class ProductController.
 *
 * This is the controller for product
 */
#[Route(name: 'app_home_')]
class ProductController extends AbstractController
{
    /**
     * Action shop.
     *
     * This is shop page controller
     */
    #[Route('/shop', name: 'shop')]
    public function shop(): Response
    {
        $title = "Shop";

        return $this->render('product/shop.html.twig', ['title' => $title]);
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

        return $this->render('product/product_details.html.twig', ['title' => $title]);
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

        return $this->render('product/product_compare.html.twig', ['title' => $title]);
    }
}
