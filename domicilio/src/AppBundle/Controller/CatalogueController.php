<?php


namespace AppBundle\Controller;

use AppBundle\Entity\Catalogue;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class CatalogueController extends Controller
{
    /**
     * @Route("/catalogue", name="catalogue")
     */
    public function listAction()
    {
        // displays the todo table

        $article = $this->getDoctrine()->getRepository( 'AppBundle:Catalogue' )->findAll();

        return $this->render( 'catalogue/article.html.twig', array('catalogue' => $article) );
    }


}