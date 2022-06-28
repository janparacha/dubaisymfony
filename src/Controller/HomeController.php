<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(PostRepository $postrepository): Response
    {
        $posts = $postrepository->PostActive();
        return $this->render('home/index.html.twig', [
            'posts' => $posts,
        ]);
    }
}
