<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class VisiteController extends AbstractController
{
    /**
     * @Route("/visite", name="visite")
     */
    public function index()
    {
        return $this->render('visite/index.html.twig', [
            'controller_name' => 'VisiteController',
        ]);
    }
    
    /**
     * @Route("/visite", name="visite")
     */
    
   /*public function upsateVisiteur(Request $query){
        $type = new Type();
   
        $form = $this->createForm(TypeImmoType::class, $type);
        $form->handleRequest($query);
        
        if ($form->isSubmitted() && $form->isValid()) {
           $em = $this->getDoctrine()->getManager();
           $em->persist($type);
           $em->flush();  
           
           
           //$result = $em->getRepository(User::class)->seConnecter($nb_piece,$nb_chambre,$superficie,$prix,$chauffage,$année,$localisation,$etat ); //on envoie les données reçus pour tester

          $query->getSession()
              ->getFlashBag()
              ->add('success','Type ajouté avec succès');
       
        return $this->redirectToRoute('add_type');
    }
        return $this->render('type/addType.html.twig',array('form'=>$form->createView()));    
}*/
}
