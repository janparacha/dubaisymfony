<?php

namespace App\Controller;

use App\Entity\Products;
use App\Repository\PostRepository;
use App\Repository\ProductsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(PostRepository $postrepository, ProductsRepository $productsRepository): Response
    {
        $posts = $postrepository->PostActive();
        $products = $productsRepository->findAll();
        return $this->render('home/index.html.twig', [
            'posts' => $posts,
            'products' => $products,
        ]);
    }
}