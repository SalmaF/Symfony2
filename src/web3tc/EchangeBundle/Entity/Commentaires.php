<?php

namespace web3tc\EchangeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaires
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="web3tc\EchangeBundle\Entity\CommentairesRepository")
 */
class Commentaires
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
     * @ORM\ManyToOne(targetEntity="Ville", inversedBy="commentaires")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ville;
    
    /**
     * @ORM\ManyToOne(targetEntity="Universite", inversedBy="commentaires")
     * @ORM\JoinColumn(nullable=false)
     */
    private $universite;
    
    /**
     * @ORM\ManyToOne(targetEntity="Pays", inversedBy="commentaires")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pays;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="Contenu", type="text")
     */
    private $contenu;


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
     * Set date
     *
     * @param \DateTime $date
     * @return Commentaires
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     * @return Commentaires
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string 
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set ville
     *
     * @param \web3tc\EchangeBundle\Entity\Ville $ville
     * @return Commentaires
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
     * Set universite
     *
     * @param \web3tc\EchangeBundle\Entity\Universite $universite
     * @return Commentaires
     */
    public function setUniversite(\web3tc\EchangeBundle\Entity\Universite $universite)
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

    /**
     * Set pays
     *
     * @param \web3tc\EchangeBundle\Entity\Pays $pays
     * @return Commentaires
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
}
