<?php

namespace web3tc\EchangeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use web3tc\EchangeBundle\Entity\Departement;
use web3tc\EchangeBundle\Entity\Pays;
use web3tc\EchangeBundle\Entity\Ville;
use web3tc\EchangeBundle\Entity\ContratEtude;
use web3tc\EchangeBundle\Entity\Universite;
use web3tc\EchangeBundle\Entity\Cours;
use web3tc\EchangeBundle\Form\ContratEtudeType;
use web3tc\EchangeBundle\Form\ContratEtudeBisType;
use web3tc\EchangeBundle\Form\CoursType;
use Symfony\Component\HttpFoundation\Session\Session;

class EchangeController extends Controller
{
    /**
     * @Route("/", name="_acceuil")
     * @Template()
     */
    public function indexAction()
    {   
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {    
            

                $departement = new Departement();
                $departement = $this->getDoctrine()
                    ->getManager()
                    ->getRepository('web3tcEchangeBundle:Departement')
                    ->findOneByNom($request->request->get('departement'));
            return $this->redirect($this->generateUrl('_carte', array('departement_nom'=>$departement->getNom())));
        }
        
        $departements = $this->getDoctrine()
                        ->getManager()
                        ->getRepository('web3tcEchangeBundle:Departement')
                        ->findAll();
        
        return $this->render('web3tcEchangeBundle:Echange:index.html.twig', array(
            'departements' => $departements,
          ));
    }
 
    
    /**
    * @Route("/carte/{departement_nom}", name="_carte")
    * @Template()
    * @ParamConverter("departement", options={"mapping": {"departement_nom": "nom"}})
     */
    public function carteAction(Departement $departement)
    {
        
        $session = new Session();
        $session->start();
     // définit et récupère des attributs de session
        $session->set('departement', $departement->getNom() );
        
        $pays = $this->getDoctrine()
                        ->getManager()
                        ->getRepository('web3tcEchangeBundle:Pays')
                        ->findAll();

        return $this->render('web3tcEchangeBundle:Echange:carte.html.twig', array(
              'departement'=>$departement,
              'pays'=>$pays,
              ));
        
    }


    
    
    
    /**
     * @Route("/contrat_etude/", name="_contrat")
     * @Template()
     */
    public function formulaireAction()
    {
        $contratEtude = new ContratEtude();

        $form = $this->createForm(new ContratEtudeType, $contratEtude);
                    
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($contratEtude);
                $em->flush();                
                return $this->redirect($this->generateUrl('_accueil'));
            }
        }
        
        return $this->render('web3tcEchangeBundle:Echange:formulaire.html.twig', array(
            'form' => $form->createView(),
          ));


    }

    /**
     * @Route("/ajout_contrat/", name="_ajoutcontratUn")
     * @Template()
     */
    public function AjoutContrat1Action()
    {
        $contratEtude = new ContratEtude();

        $form = $this->createForm(new ContratEtudeBisType, $contratEtude);
                    
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();

                $em->persist($contratEtude);
                $em->persist($contratEtude->getUniversite());
                $em->persist($contratEtude->getUniversite()->getVille());
                $em->persist($contratEtude->getUniversite()->getVille()->getPays());
                $em->flush(); 
                
                return $this->redirect($this-> generateUrl('_ajoutcontratDeux',
                        array ( 'contrat_id'=> $contratEtude->getId()))) ;
            }
        }
        
                return $this->render('web3tcEchangeBundle:Echange:ajoutContratEtude1.html.twig', array(
            'form' => $form->createView(),
          ));
    }

        
        
    
        
    /**
     * @Route("/ajout_contrat2/{contrat_id}", name="_ajoutcontratDeux")
     * @Template()
     * @ParamConverter("contratEtude", options={"mapping": {"contrat_id": "id"}})
     */
    public function AjoutContrat2Action(ContratEtude $contratEtude)
    {
        $cours = new Cours();

        $form = $this->createForm(new CoursType, $cours);
                    
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $contratEtude->addCours($cours);
                $em->persist($cours);
                $em->merge($contratEtude);
                $em->flush();     
                return $this->redirect($this->generateUrl('_ajoutcontratDeux',
                array ( 'contrat_id'=> $contratEtude->getId()))) ;

            }
        }
        return $this->render('web3tcEchangeBundle:Echange:ajoutContratEtude2.html.twig', array(
            'form' => $form->createView(),
            'contrat'=>$contratEtude,
          ));
    }
    
    
    
    
    /**
     * @Route("/Pays/{pays_code}", name="_pays")
     * @Template()
      * @ParamConverter("pays", options={"mapping": {"pays_code": "code"}})
     */
    public function PaysAction(Pays $pays)
    {

        $universites = $this->getDoctrine()
                ->getManager()
                ->getRepository('web3tcEchangeBundle:Universite')
                ->getByPays($pays);
        
        return $this->render('web3tcEchangeBundle:Echange:pays.html.twig', array(
            'pays' => $pays,
            'universites'=>$universites
          ));
        

    }

    
    
    /**
    * @Route("/Pays/Contrat/{departement_nom}", name="_universite")
    * @Template()
    * @ParamConverter("departement", options={"mapping": {"departement_nom": "nom"}})
     *
     */
    public function universiteAction(Departement $departement)
    {
        

        
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {            
            //On arrive initialement sur la page avec une requete de type POST
            $nomUniv = $request->request->get('universite');
            $universite = $this->getDoctrine()
                        ->getManager()
                        ->getRepository('web3tcEchangeBundle:Universite')
                        ->findOneByNom($nomUniv);
            
            $contrats = $this->getDoctrine()
                        ->getManager()
                        ->getRepository('web3tcEchangeBundle:ContratEtude')
                        ->findByUniversite($universite);
            
        }
        
        return $this->render('web3tcEchangeBundle:Echange:universite.html.twig', array(
              'departement'=>$departement,
              'universite'=>$universite,
            'contrats'=>$contrats,
              ));
        
    }

    /**
        * @Route("/Contrat/{id}", name="_liste")
        * @Template()
        * @ParamConverter("contratEtude", options={"mapping": {"id": "id"}})
     */
    public function listeAction(ContratEtude $contrat)
    {
        /*$courss = $this->getDoctrine()
                ->getManager()
                ->getRepository('web3tcEchangeBundle:Cours')
                ->getByCours($contrat);
                ->findByContratEtude($contrat);
*/        

        return $this->render('web3tcEchangeBundle:Echange:listeContrats.html.twig', array(
            'contrat'=>$contrat,
            //'courss'=>$courss,
            ));
        
    }
 
    
    
}
