<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PostController extends AbstractController
{
    #[Route('/post', name: 'app_post' )]
    
    public function index(PostRepository $postrepository): Response
    {
        $posts = $postrepository->PostActive();
        return $this->render('post/post.html.twig', [
            'posts' => $posts,
        ]);
    }

    #[Route('/post/{id}', name: 'post_detail' )]

    public function idRoute(Post $post) : Response
    {
        return $this -> render('post/post_detail.html.twig', [
            'post' => $post,
        ]); 
    }
}

