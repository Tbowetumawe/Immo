<?php

namespace App\Controller;
use App\Entity\Visiteur;
use App\Form\VisiteurType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class VisiteurController extends AbstractController
{
    /**
     * @Route("/visiteur", name="visiteur")
     */
    public function index()
    {
        return $this->render('visiteur/index.html.twig', [
            'controller_name' => 'VisiteurController',
        ]);
    }
    
    /**
     * @Route("/addvisiteur", name="_visiteur")
     */
    
     public function addVisiteur(Request $query){
        $visiteur = new visiteur();
   
        $form = $this->createForm(VisiteurType::class, $visiteur);
        $form->handleRequest($query);
        
        if ($form->isSubmitted() && $form->isValid()) {
           $em = $this->getDoctrine()->getManager();
           $em->persist($visiteur);
           $em->flush();  
           
           
           //$result = $em->getRepository(User::class)->seConnecter($nb_piece,$nb_chambre,$superficie,$prix,$chauffage,$année,$localisation,$etat ); //on envoie les données reçus pour tester

          $query->getSession()
              ->getFlashBag()
              ->add('success','Visiteur ajouté avec succès');
       
        return $this->redirectToRoute('_visiteur');
    }
        return $this->render('visiteur/visiteur.html.twig',array('form'=>$form->createView()));    
}
        /**
        * @Route("/afficherVisiteur", name="affichageV")
        */
    public function AfficherVisiteur(){
        $em = $this->getDoctrine()->getManager();
 
        $Visiteur = $em->getRepository(Visiteur::class)->findAll();
        
        return $this->render('visiteur/afficher.html.twig', array('visiteur' => $Visiteur));
        
    }

        /** 
        * @Route("/update_visiteur/{id}", name="updV")
        */
public function updateVisiteu(Request $request, Session $session, $id){
         
        $visiteur = new Visiteur() ;
        $visiteur = $this->getDoctrine()->getManager()->getRepository(Visiteur::class)->getUnVisiteur($id);
    
        $request->getSession()->getFlashBag()->add('notice', '');
        
        $form = $this->createForm(VisiteurType::class, $visiteur);
        
        if($request->isMethod('POST')){
            $form->handleRequest($request);
            if($form->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em->flush();
                $request->getSession()->getFlashBag()->add('success', 'Visiteur modifié avec succès.');
                return $this->redirectToRoute('updV',array('id'=>$id));
            }
        }
        return $this->render( 'visiteur/visiteur.html.twig', array(
            'form' =>$form->createView(), 'visiteur'=>$visiteur));
    }
    
}
