<?php

namespace web3tc\EchangeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use web3tc\EchangeBundle\Entity\Departement;
use web3tc\EchangeBundle\Entity\ContratEtude;
use web3tc\EchangeBundle\Form\ContratEtudeType;

class EchangeController extends Controller
{
    /**
     * @Route("/", name="_acceuil")
     * @Template()
     */
    public function indexAction()
    {    
        $departement = new Departement();

        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {                
            $departement = $this->getDoctrine()
                    ->getManager()
                    ->getRepository('web3tcEchangeBundle:Departement')
                    ->findOneByNom($request->request->get('departement')); //$request->query->get('departement')
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
    */
    public function carteAction()
    {
        
    }
    /**
     * @Route("/contrat_etude", name="_contrat")
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
                return $this->redirect($this->generateUrl('_contrat'));
            }
        }

        return $this->render('web3tcEchangeBundle:Echange:formulaire.html.twig', array(
            'form' => $form->createView(),
          ));
        
      
    }
}
