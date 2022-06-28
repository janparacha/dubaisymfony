<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    #[Route('/post', name: 'app_post')]
    public function index(PostRepository $postrepository): Response
    {
        $posts = $postrepository->PostActive();
        return $this->render('post/post.html.twig', [
            'posts' => $posts,
        ]);
    }
}
