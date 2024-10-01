<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AuthorController extends AbstractController
{

    private $listeAuther;
    public function __construct(){
        $this->listeAuther = array(
            array('id' => 1, 'picture' => '/images/Victor-Hugo.jpg','username' => 'Victor Hugo', 'email' =>
            'victor.hugo@gmail.com ', 'nb_books' => 100),
            array('id' => 2, 'picture' => '/images/william-shakespeare.jpg','username' => ' William Shakespeare', 'email' =>
            ' william.shakespeare@gmail.com', 'nb_books' => 200 ),
            array('id' => 3, 'picture' => '/images/Taha_Hussein.jpg','username' => 'Taha Hussein', 'email' =>
            'taha.hussein@gmail.com', 'nb_books' => 300)
        );
    }

    #[Route('/author', name: 'app_author')]
    public function index(): Response
    {
        return $this->render('author/index.html.twig', [
            'controller_name' => 'AuthorController',
        ]);
    }

    #[Route('/showAuthor/{name}', name: 'app_authorShow',  defaults:['name'=>"victor"], methods:['GET'])]
    public function showAuthor($name): Response
    {
        return $this ->render('author/show.html.twig', ['name'=>$name]);
    }

    #[Route('/listAuthor', name: 'app_listeAuthor')]
    public function listeAuther():Response{
        return $this ->render('author/liste.html.twig', [
            'authers' => $this->listeAuther,
        ]);
    }


    #[Route('/listAuthor/details/{id}', name: 'author_details')]
    public function authorDetails($id): Response
    {
        $authors = array_column($this->listeAuther, null, 'id');
        $author = $authors[$id];
        return $this->render('author/showAuthor.html.twig', [
            'author' => $author,
        ]);
    }
    

}
