<?php

namespace web3tc\EchangeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use web3tc\EchangeBundle\Entity\Departement;
use web3tc\EchangeBundle\Entity\Pays;
use web3tc\EchangeBundle\Entity\Ville;
use web3tc\EchangeBundle\Entity\ContratEtude;
use web3tc\EchangeBundle\Entity\Universite;
use web3tc\EchangeBundle\Entity\Cours;
use web3tc\EchangeBundle\Form\PaysType;
use web3tc\EchangeBundle\Form\DepartementType;
use web3tc\EchangeBundle\Form\UniversiteType;
use web3tc\EchangeBundle\Form\VilleType;

class AdminController extends Controller
{
 
    
       
    /**
     * @Route("/Admin/", name="_adminAccueil")
     * @Template()
     */
    public function adminAccueilAction()
    {
        return $this->render('web3tcEchangeBundle:Admin:adminAccueil.html.twig');
    }
    
    
    /**
     * @Route("/Admin/ajouterPays", name="_ajoutPays")
     * @Template()
     */
    public function ajouterPaysAction()
    {
        $pays = new Pays;
        $form = $this->createForm(new PaysType, $pays);
        $em = $this->getDoctrine()->getManager();
       
        $request = $this->get('request');
        // On vérifie qu'elle est de type POST
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($pays);
                $em->flush();
                $this->get('session')->getFlashBag()->add('info', 'Pays
                bien ajouté');            
                    //Ajout d'un message FlashBag : Message stocké dans la session qui n'est affiché
                //qui disparait une fois affiché (disparait au rechargement F5 de la page)
                
                $this->get('session')->getFlashBag()->add(
                'notice',
                'Your changes were saved!'
                );                // On redirige vers la page de visualisation de l'article nouvellement créé
                return $this->redirect($this->generateUrl('_adminAccueil'));
               

            }
        }
        return $this->render('web3tcEchangeBundle:Admin:ajoutPays.html.twig', array(
            'form' => $form->createView(),
          ));    
    }
   
    
        /**
     * @Route("/Admin/ajouterDepartement", name="_ajoutDepartement")
     * @Template()
     */
    public function AjouterDepartementAction()
    {
        
        $departement = new Departement;
        $form = $this->createForm(new DepartementType, $departement);
        $em = $this->getDoctrine()->getManager();
       
        $request = $this->get('request');
        // On vérifie qu'elle est de type POST
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($departement);
                $em->flush();
                    //Ajout d'un message FlashBag : Message stocké dans la session qui n'est affiché
                //qui disparait une fois affiché (disparait au rechargement F5 de la page)
                $this->get('session')->getFlashBag()->add('info', 'Departement
                bien ajouté');            
              
                return $this->redirect($this->generateUrl('_adminAccueil'));
               

            }
        }
        return $this->render('web3tcEchangeBundle:Admin:ajoutDepartement.html.twig', array(
            'form' => $form->createView(),
          ));
        
    }
    
    
    
    
    
    
    /**
     * @Route("/Admin/ajouterVille", name="_ajoutVille")
     * @Template()
     */
    public function AjouterVilleAction()
    {
        $ville = new Ville;
        $form = $this->createForm(new VilleType, $ville);
        $em = $this->getDoctrine()->getManager();
       
        $request = $this->get('request');
        // On vérifie qu'elle est de type POST
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($ville);
                $em->flush();
                    //Ajout d'un message FlashBag : Message stocké dans la session qui n'est affiché
                //qui disparait une fois affiché (disparait au rechargement F5 de la page)
                $this->get('session')->getFlashBag()->add('info', 'Ville
                bien ajouté');            
              
                return $this->redirect($this->generateUrl('_adminAccueil'));
               

            }
        }
        return $this->render('web3tcEchangeBundle:Admin:ajoutVille.html.twig', array(
            'form' => $form->createView(),
          ));
    }
    
    /**
     * @Route("/Admin/ajouterUniversite", name="_ajoutUniversite")
     * @Template()
     */
    public function universiteAction()
    {
        $universite = new Universite;
        $form = $this->createForm(new UniversiteType, $universite);
        $em = $this->getDoctrine()->getManager();
       
        $request = $this->get('request');
        // On vérifie qu'elle est de type POST
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $universite->setNbContratsUniversite(0);
                $em->persist($universite);
                $em->flush();
                    //Ajout d'un message FlashBag : Message stocké dans la session qui n'est affiché
                //qui disparait une fois affiché (disparait au rechargement F5 de la page)
                $this->get('session')->getFlashBag()->add('info', 'Universite
                bien ajouté');            
              
                return $this->redirect($this->generateUrl('_adminAccueil'));
               

            }
        }
        return $this->render('web3tcEchangeBundle:Admin:ajoutUniversite.html.twig', array(
            'form' => $form->createView(),
          ));
        
    }

}
