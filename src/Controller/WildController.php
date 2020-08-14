<?php
// src/Controller/WildController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("wild/", name="wild_")
*/
Class WildController extends AbstractController
{
    /**
     * @Route("/wild", name="index")
    */
    public function index() : Response
    {
        return $this->render('wild/index.html.twig', [
            'website' => 'Wild Séries',
        ]);
    }

    /**
    * @Route("show/{slug<^[a-z0-9-]+$>}", defaults={"slug" = null}, name="show")
    */
    public function show(?string $slug): Response
    {
        if ($slug === null) {
            $slug = 'Aucune série sélectionnée, veuillez choisir une série';
        } else {
            $slug = preg_replace(
                '/-/',
                ' ', ucwords(trim(strip_tags($slug)), "-")
            );
        }
        return $this->render('wild/show.html.twig', [
            'slug' => $slug
        ]);
    } 
}