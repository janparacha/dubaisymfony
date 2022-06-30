<?php

namespace App\Controller;

use App\Entity\Products;
use App\Repository\ProductsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductsController extends AbstractController
{
    #[Route('/products', name: 'app_products')]
    public function index(ProductsRepository $productsRepository): Response
    {
        $products = $productsRepository->findAll();
        return $this->render('products/products.html.twig', [
            'products' => $products
        ]);
    }

    #[Route('/products/{slug}', name: 'detail_products')]
    public function idProduct(Products $product): Response
    {
        return $this->render('products/products_detail.html.twig', [
            'product' => $product,
        ]);
    }
}
