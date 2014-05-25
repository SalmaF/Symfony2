<?php

namespace web3tc\EchangeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class AdminController extends Controller
{
    /**
     * @Route("/pays")
     * @Template()
     */
    public function paysAction()
    {
    }
    
    /**
     * @Route("/ville")
     * @Template()
     */
    public function villeAction()
    {
    }
    
    /**
     * @Route("/universite")
     * @Template()
     */
    public function universiteAction()
    {
    }

}
