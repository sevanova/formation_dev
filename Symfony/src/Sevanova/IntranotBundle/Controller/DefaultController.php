<?php

namespace Sevanova\IntranotBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sevanova\IntranotBundle\Entity\Fiche;
    
class DefaultController extends Controller
{
    public function indexAction()
    {
        $prenoms = array("berti","baptiste","virgile","fred");
	    
	    $fiche = new Fiche;
	    $fiche->setTitre('Titre');
	    $fiche->setTexte('Texte');
	    
	    $em = $this->getDoctrine()->getManager();
	    $em->persist($fiche);
	    $em->flush();
	    return $this->render('SevanovaIntranotBundle:Default:index.html.twig', array('prenoms' => $prenoms));
    }
    
    public function showAction()
    {
        
	    $em = $this->getDoctrine()->getManager();
	    $repository = $this->getDoctrine()->getRepository("SevanovaIntranotBundle:Fiche");
	    $result = $repository->findAll();
	    return $this->render('SevanovaIntranotBundle:Default:show.html.twig',array('results' => $result));
    }
}
