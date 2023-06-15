<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HeroController extends AbstractController
{
    #[Route('/hero', name: 'app_hero')]
    public function index(): Response
    {
        $hero = $this->getUser()->getHero();
        return $this->render('hero/index.html.twig', [
            'hero' => $hero,
        ]);
    }
}
