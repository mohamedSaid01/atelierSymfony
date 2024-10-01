<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;

class ServiceController extends AbstractController
{
    #[Route('/service', name: 'app_service')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ServiceController.php',
        ]);
    }


    #[Route('/show_service/{name}', name: 'app_show_service')]
    public function showService($name){
        // return new Response("This name is : " . $name);
        return $this ->render('service/affiche.html.twig', ['name'=>$name]);
    }


    #[Route('/redirect', name: 'redirect_route')]
    public function goToIndex(){
        return $this->redirectToRoute('app_home');
    }
}
