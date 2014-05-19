<?php

namespace web3tc\EchangeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ville
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="web3tc\EchangeBundle\Entity\VilleRepository")
 */
class Ville
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
    private $nbContrats;
    
    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=255)
     */
    private $nom;
    
    /**
     * @ORM\OneToMany(targetEntity="Universite", mappedBy="ville")
     */
    private $universite;
    
    /**
     * @ORM\ManyToOne(targetEntity="Pays")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pays;
    
    /**
     * @ORM\OneToMany(targetEntity="Commentaires", mappedBy="ville")
     */
    private $commentaires;
    
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
      $nbContratsVille = $this->getContratEtude()->getNbContratsVille();
      $this->getContratEtude()->setNbContratsVille($nbContratsVille+1);
    }
  
    /**
     * @ORM\preRemove
     */
    public function decrease()
    {
      $nbContratsVille = $this->getContratEtude()->getNbContratsVille();
      $this->getContratEtude()->setNbContrats($nbContratsVille-1);
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
     * @return Ville
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
     * @return Ville
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
        $this->universite = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add universite
     *
     * @param \web3tc\EchangeBundle\Entity\Universite $universite
     * @return Ville
     */
    public function addUniversite(\web3tc\EchangeBundle\Entity\Universite $universite)
    {
        $this->universite[] = $universite;

        return $this;
    }

    /**
     * Remove universite
     *
     * @param \web3tc\EchangeBundle\Entity\Universite $universite
     */
    public function removeUniversite(\web3tc\EchangeBundle\Entity\Universite $universite)
    {
        $this->universite->removeElement($universite);
    }

    /**
     * Get universite
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUniversite()
    {
        return $this->universite;
    }

    /**
     * Set pays
     *
     * @param \web3tc\EchangeBundle\Entity\Pays $pays
     * @return Ville
     */
    public function setPays(\web3tc\EchangeBundle\Entity\Pays $pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return \web3tc\EchangeBundle\Entity\Pays 
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Add commentaires
     *
     * @param \web3tc\EchangeBundle\Entity\Commentaires $commentaires
     * @return Ville
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
}
