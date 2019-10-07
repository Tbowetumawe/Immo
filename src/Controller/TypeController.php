<?php

namespace App\Controller;
use App\Form\TypeImmoType;
use App\Entity\Type;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TypeController extends AbstractController
{
    /**
     * @Route("/type", name="type")
     */
    public function index()
    {
        return $this->render('type/index.html.twig', [
            'controller_name' => 'TypeController',
        ]);
    }
    
    /**
     * @Route("/add_type", name="add_type")
     * 
     */
    
    public function addType(Request $query){
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
}
	
    }

