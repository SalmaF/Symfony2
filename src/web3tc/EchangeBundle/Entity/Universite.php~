<?php

namespace web3tc\EchangeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Universite
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="web3tc\EchangeBundle\Entity\UniversiteRepository")
 */
class Universite
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
    private $nbContratsUniversite;
    
    /**
     * @ORM\OneToMany(targetEntity="ContratEtude", mappedBy="universite")
     */
    private $contratEtude;
    
    /**
     * @ORM\ManyToOne(targetEntity="Ville")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ville;
    
    /**
     * @ORM\OneToMany(targetEntity="Commentaires", mappedBy="universite")
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
     * @ORM\Column(name="Presentation", type="text")
     */
    private $presentation;


    /**
     * @ORM\prePersist
     */
    public function increase()
    {
      $nbContratsUniversite = $this->getContratEtude()->getNbContratsUniversite();
      $this->getContratEtude()->setNbContratsUniversite($nbContratsUniversite+1);
    }
  
    /**
     * @ORM\preRemove
     */
    public function decrease()
    {
      $nbContratsUniversite = $this->getContratEtude()->getNbContratsUniversite();
      $this->getContratEtude()->setNbContratsUniversite($nbContratsUniversite-1);
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
     * @return Universite
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
     * @return Universite
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
        $this->contratEtude = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add contratEtude
     *
     * @param \web3tc\EchangeBundle\Entity\ContratEtude $contratEtude
     * @return Universite
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

    /**
     * Set ville
     *
     * @param \web3tc\EchangeBundle\Entity\Ville $ville
     * @return Universite
     */
    public function setVille(\web3tc\EchangeBundle\Entity\Ville $ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return \web3tc\EchangeBundle\Entity\Ville 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Add commentaires
     *
     * @param \web3tc\EchangeBundle\Entity\Commentaires $commentaires
     * @return Universite
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
