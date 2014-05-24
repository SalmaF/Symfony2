<?php

namespace web3tc\EchangeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use web3tc\EchangeBundle\Entity\Departement;
use web3tc\EchangeBundle\Entity\Pays;
use web3tc\EchangeBundle\Entity\Villes;
use web3tc\EchangeBundle\Entity\ContratEtude;
use web3tc\EchangeBundle\Form\ContratEtudeType;
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
// ajoute des messages flash
$session->getFlashBag()->add('warning', 'Your config file is writable, it should be set read-only');
$session->getFlashBag()->add('error', 'Failed to update name');
$session->getFlashBag()->add('error', 'Another error');
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
     * @Route("/contrat_etude/{departement_nom}", name="_contrat")
     * @Template()
    * @ParamConverter("departement", options={"mapping": {"departement_nom": "nom"}})
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
                return $this->redirect($this->generateUrl('_contrat'));
            }
        }
        
        $pays = $this->getDoctrine()
                    ->getManager()
                    ->getRepository('web3tcEchangeBundle:Pays')
                    ->findAll();
        
        $villes = $this->getDoctrine()
                    ->getManager()
                    ->getRepository('web3tcEchangeBundle:Ville')
                    ->findAll();
        

        return $this->render('web3tcEchangeBundle:Echange:formulaire.html.twig', array(
            'form' => $form->createView(),
            'pays' => $pays,
            'villes' => $villes,
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
        
        return $this->render('web3tcEchangeBundle:Echange:carteSpe.html.twig', array(
            'pays' => $pays,
            'universites'=>$universites,
          ));
        

    }

    
    
    /**
    * @Route("/Selection/Contrat/{departement_nom}", name="_voirContrat")
    * @Template()
    * @ParamConverter("departement_nom", options={"mapping": {"departement_nom": "nom"}})
     *
     */
    public function contratsAction(Departement $departement)
    {
        

        
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {            
            //On arrive initialement sur la page avec une requete detype POST
            $universite = $this->getDoctrine()
                        ->getManager()
                        ->getRepository('web3tcEchangeBundle:Universite')
                        ->findOneByNom($request->request->get('universite')); 
        }
        
        return $this->render('web3tcEchangeBundle:Echange:voirContrat.html.twig', array(
              'departement'=>$departement,
              'universite'=>$universite,
              ));
        
    }

    
 
    
    
}
