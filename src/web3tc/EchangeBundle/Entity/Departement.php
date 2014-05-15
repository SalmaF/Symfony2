<?php

namespace web3tc\EchangeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Departement
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="web3tc\EchangeBundle\Entity\DepartementRepository")
 */
class Departement
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
     * @ORM\OneToMany(targetEntity="ContratEtude", mappedBy="departement")
     */
    private $contratEtude;
    
    /**
     * @var string
     *
     * @ORM\Column(name="Abreviation", type="string", length=5)
     */
    private $abreviation;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="ProfResponsable", type="string", length=255)
     */
    private $profResponsable;


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
     * Set abreviation
     *
     * @param string $abreviation
     * @return Departement
     */
    public function setAbreviation($abreviation)
    {
        $this->abreviation = $abreviation;

        return $this;
    }

    /**
     * Get abreviation
     *
     * @return string 
     */
    public function getAbreviation()
    {
        return $this->abreviation;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Departement
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set profResponsable
     *
     * @param string $profResponsable
     * @return Departement
     */
    public function setProfResponsable($profResponsable)
    {
        $this->profResponsable = $profResponsable;

        return $this;
    }

    /**
     * Get profResponsable
     *
     * @return string 
     */
    public function getProfResponsable()
    {
        return $this->profResponsable;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->contratEtude = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add contratEtude
     *
     * @param \web3tc\EchangeBundle\Entity\ContratEtude $contratEtude
     * @return Departement
     */
    public function addContratEtude(\web3tc\EchangeBundle\Entity\ContratEtude $contratEtude)
    {
        $this->contratEtude[] = $contratEtude;

        return $this;
    }

    /**
     * Remove contratEtude
     *
     * @param \web3tc\EchangeBundle\Entity\ContratEtude $contratEtude
     */
    public function removeContratEtude(\web3tc\EchangeBundle\Entity\ContratEtude $contratEtude)
    {
        $this->contratEtude->removeElement($contratEtude);
    }

    /**
     * Get contratEtude
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContratEtude()
    {
        return $this->contratEtude;
    }
}
