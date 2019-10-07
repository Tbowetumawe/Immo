<?php

namespace App\Controller;
use App\Entity\Bien;
use App\Form\BienType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class BienController extends AbstractController
{
    /**
     * @Route("/bien", name="bien")
     */
    /*public function index()
    {
        return $this->render('bien/index.html.twig', [
            'controller_name' => 'BienController',
        ]);
    }*/
    
    public function home(){
        return $this->render('bien/vueHome.html.twig');
    }
    /**
     * @Route("/add_bien", name="add_bien")
     */
    
    public function ajouterBien(Request $query) {
        $bien = new Bien();
   
        $form = $this->createForm(BienType::class, $bien);
        $form->handleRequest($query);
        
        if ($form->isSubmitted() && $form->isValid()) {
           $em = $this->getDoctrine()->getManager();
           $em->persist($bien);
           $em->flush();  
           
           
           //$result = $em->getRepository(User::class)->seConnecter($nb_piece,$nb_chambre,$superficie,$prix,$chauffage,$année,$localisation,$etat ); //on envoie les données reçus pour tester

          $query->getSession()
              ->getFlashBag()
              ->add('success','Bien ajouté avec succès');
       
        return $this->redirectToRoute('add_bien');
    }
        return $this->render('bien/addBien.html.twig',array('form'=>$form->createView(),'id'=>$bien->getId()));    
    }
	
    /**
        * @Route("/afficherBien", name="affichage")
        */
    public function AfficherBien(){
        $em = $this->getDoctrine()->getManager();
 
        $Bien = $em->getRepository(Bien::class)->findAll();
        
        return $this->render('bien/afficherBien.html.twig', array('bien' => $Bien));
        
    }
    
        /**
        * @Route("/update_bien/{id}", name="updateBien")
        */
    
    
	public function updateBien(Request $request, Session $session, $id){
         
        $bien = new Bien() ;
        $bien = $this->getDoctrine()->getManager()->getRepository(Bien::class)->getUnBien($id);
        
        //$id = $session->get('login');
        $request->getSession()->getFlashBag()->add('notice', '');
        
        $form = $this->createForm(BienType::class, $bien);
        
        if($request->isMethod('POST')){
            $form->handleRequest($request);
            if($form->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em->flush();
                $request->getSession()->getFlashBag()->add('success', 'Bien modifié avec succès.');
                return $this->redirectToRoute('updateBien',array('id'=>$id));
            }
        }
        return $this->render( 'bien/updateBien.html.twig', array(
            'form' =>$form->createView(), 'bien'=>$bien));
    }
    
     /**
      *
      *@Route("/verif/supprimer/{id}",name="verif_del_art")
      *
      */
   
    public function deleteVerif(Session $session, $id){
        $bien = new Bien() ;
        $bien = $this->getDoctrine()->getManager()->getRepository(Bien::class)->getUnBien($id);
        return $this->render('bien/delete.html.twig', array('bien'=>$bien));
    }
        /**
      *
      *@Route("/bien/supprimer/{id}",name="del_bien")
      *
      */
    public function deleterArticle(Session $session, $id){
        $bien = new Bien() ;
        $bien= $this->getDoctrine()->getManager()->getRepository(Bien::class)->getUnBien($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($bien);
        $em->flush();
        return $this->redirectToRoute('updateBien');
    }

 }