<?php

namespace web3tc\EchangeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
//use web3tc\EchangeBundle\Entity\Universite;
use web3tc\EchangeBundle\Entity\Cours;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ContratEtude
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="web3tc\EchangeBundle\Entity\ContratEtudeRepository")
 */
class ContratEtude
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Departement")
     * @ORM\JoinColumn(nullable=false)
     */
    private $departement;
    
    /**
     * @Assert\Type(type="web3tc\EchangeBundle\Entity\Universite")
     * @ORM\ManyToOne(targetEntity="Universite")
     * @ORM\JoinColumn(nullable=false)
     */
    private $universite;
    
    /**
     * @Assert\Type(type="web3tc\EchangeBundle\Entity\Cours")
     * @ORM\ManyToMany(targetEntity="Cours")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cours;
    
    /**
     * @var string
     *
     * @ORM\Column(name="NomEleve", type="string", length=255)
     */    
    private $nomEleve;

    /**
     * @var string
     *
     * @ORM\Column(name="PrenomEleve", type="string", length=255)
     */
    private $prenomEleve;

    /**
     * @var integer
     *
     * @ORM\Column(name="AnneeEnCours", type="integer")
     */
    private $anneeEnCours;

    /**
     * @var string
     *
     * @ORM\Column(name="DureeDuSejour", type="string", length=255)
     */
    private $dureeDuSejour;

    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cours = new \Doctrine\Common\Collections\ArrayCollection();
        
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomEleve
     *
     * @param string $nomEleve
     * @return ContratEtude
     */
    public function setNomEleve($nomEleve)
    {
        $this->nomEleve = $nomEleve;

        return $this;
    }

    /**
     * Get nomEleve
     *
     * @return string 
     */
    public function getNomEleve()
    {
        return $this->nomEleve;
    }

    /**
     * Set prenomEleve
     *
     * @param string $prenomEleve
     * @return ContratEtude
     */
    public function setPrenomEleve($prenomEleve)
    {
        $this->prenomEleve = $prenomEleve;

        return $this;
    }

    /**
     * Get prenomEleve
     *
     * @return string 
     */
    public function getPrenomEleve()
    {
        return $this->prenomEleve;
    }

    /**
     * Set anneeEnCours
     *
     * @param integer $anneeEnCours
     * @return ContratEtude
     */
    public function setAnneeEnCours($anneeEnCours)
    {
        $this->anneeEnCours = $anneeEnCours;

        return $this;
    }

    /**
     * Get anneeEnCours
     *
     * @return integer 
     */
    public function getAnneeEnCours()
    {
        return $this->anneeEnCours;
    }

    /**
     * Set dureeDuSejour
     *
     * @param string $dureeDuSejour
     * @return ContratEtude
     */
    public function setDureeDuSejour($dureeDuSejour)
    {
        $this->dureeDuSejour = $dureeDuSejour;

        return $this;
    }

    /**
     * Get dureeDuSejour
     *
     * @return string 
     */
    public function getDureeDuSejour()
    {
        return $this->dureeDuSejour;
    }

    /**
     * Set departement
     *
     * @param \web3tc\EchangeBundle\Entity\Departement $departement
     * @return ContratEtude
     */
    public function setDepartement(\web3tc\EchangeBundle\Entity\Departement $departement)
    {
        $this->departement = $departement;

        return $this;
    }

    /**
     * Get departement
     *
     * @return \web3tc\EchangeBundle\Entity\Departement 
     */
    public function getDepartement()
    {
        return $this->departement;
    }

    /**
     * Set universite
     *
     * @param \web3tc\EchangeBundle\Entity\Universite $universite
     * @return ContratEtude
     */
    public function setUniversite(Universite $universite = null)
    {
        $this->universite = $universite;

        return $this;
    }

    /**
     * Get universite
     *
     * @return \web3tc\EchangeBundle\Entity\Universite 
     */
    public function getUniversite()
    {
        return $this->universite;
    }

     public function setCours(Cours $cours = null)
    {
        $this->cours = $cours;

        return $this;
    }
    
    /**
     * Add cours
     *
     * @param \web3tc\EchangeBundle\Entity\Cours $cours
     * @return ContratEtude
     */
    public function addCours(\web3tc\EchangeBundle\Entity\Cours $cours)
    {
        $this->cours[] = $cours;

        return $this;
    }

    /**
     * Remove cours
     *
     * @param \web3tc\EchangeBundle\Entity\Cours $cours
     */
    public function removeCours(\web3tc\EchangeBundle\Entity\Cours $cours)
    {
        $this->cours->removeElement($cours);
    }

    /**
     * Get cours
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCours()
    {
        return $this->cours;
    }

    /**
     * Add cours
     *
     * @param \web3tc\EchangeBundle\Entity\Cours $cours
     * @return ContratEtude
     */
    public function addCour(\web3tc\EchangeBundle\Entity\Cours $cours)
    {
        $this->cours[] = $cours;

        return $this;
    }

    /**
     * Remove cours
     *
     * @param \web3tc\EchangeBundle\Entity\Cours $cours
     */
    public function removeCour(\web3tc\EchangeBundle\Entity\Cours $cours)
    {
        $this->cours->removeElement($cours);
    }
}
