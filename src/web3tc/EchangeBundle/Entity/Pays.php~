<?php

namespace web3tc\EchangeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pays
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="web3tc\EchangeBundle\Entity\PaysRepository")
 */
class Pays
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
     * @var integer
     */
    private $nbContratsPays;
    
    /**
     * @ORM\OneToMany(targetEntity="Ville", mappedBy="pays")
     */
    private $ville;
    
    /**
     * @ORM\OneToMany(targetEntity="Commentaires", mappedBy="pays")
     */
    private $commentaires;
    
    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="alpha1", type="string", length=255)
     */
    private $alpha1;

        /**
     * @var string
     *
     * @ORM\Column(name="alpha2", type="string", length=255)
     */
    private $alpha2;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_gb", type="string", length=255)
     */
    private $nomEn;
    
    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=3)
     */
    private $code;
    
    /**
     * @var string
     *
     * @ORM\Column(name="Presentation", type="text")
     */
    private $presentation;


    /**
     * @ORM\prePersist
     */
    public function increase()
    {
      $nbContratsPays = $this->getContratEtude()->getNbContratsPays();
      $this->getContratEtude()->setNbContratsPays($nbContratsPays+1);
    }
  
    /**
     * @ORM\preRemove
     */
    public function decrease()
    {
      $nbContratsPays = $this->getContratEtude()->getNbContratsPays();
      $this->getContratEtude()->setNbContratsPays($nbContratsPays-1);
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
     * Set nom
     *
     * @param string $nom
     * @return Pays
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
     * Set presentation
     *
     * @param string $presentation
     * @return Pays
     */
    public function setPresentation($presentation)
    {
        $this->presentation = $presentation;

        return $this;
    }

    /**
     * Get presentation
     *
     * @return string 
     */
    public function getPresentation()
    {
        return $this->presentation;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ville = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add ville
     *
     * @param \web3tc\EchangeBundle\Entity\Ville $ville
     * @return Pays
     */
    public function addVille(\web3tc\EchangeBundle\Entity\Ville $ville)
    {
        $this->ville[] = $ville;

        return $this;
    }

    /**
     * Remove ville
     *
     * @param \web3tc\EchangeBundle\Entity\Ville $ville
     */
    public function removeVille(\web3tc\EchangeBundle\Entity\Ville $ville)
    {
        $this->ville->removeElement($ville);
    }

    /**
     * Get ville
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Add commentaires
     *
     * @param \web3tc\EchangeBundle\Entity\Commentaires $commentaires
     * @return Pays
     */
    public function addCommentaire(\web3tc\EchangeBundle\Entity\Commentaires $commentaires)
    {
        $this->commentaires[] = $commentaires;

        return $this;
    }

    /**
     * Remove commentaires
     *
     * @param \web3tc\EchangeBundle\Entity\Commentaires $commentaires
     */
    public function removeCommentaire(\web3tc\EchangeBundle\Entity\Commentaires $commentaires)
    {
        $this->commentaires->removeElement($commentaires);
    }

    /**
     * Get commentaires
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCommentaires()
    {
        return $this->commentaires;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return Pays
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set alpha1
     *
     * @param string $alpha1
     * @return Pays
     */
    public function setAlpha1($alpha1)
    {
        $this->alpha1 = $alpha1;

        return $this;
    }

    /**
     * Get alpha1
     *
     * @return string 
     */
    public function getAlpha1()
    {
        return $this->alpha1;
    }

    /**
     * Set alpha2
     *
     * @param string $alpha2
     * @return Pays
     */
    public function setAlpha2($alpha2)
    {
        $this->alpha2 = $alpha2;

        return $this;
    }

    /**
     * Get alpha2
     *
     * @return string 
     */
    public function getAlpha2()
    {
        return $this->alpha2;
    }

    /**
     * Set nomEn
     *
     * @param string $nomEn
     * @return Pays
     */
    public function setNomEn($nomEn)
    {
        $this->nomEn = $nomEn;

        return $this;
    }

    /**
     * Get nomEn
     *
     * @return string 
     */
    public function getNomEn()
    {
        return $this->nomEn;
    }
}
