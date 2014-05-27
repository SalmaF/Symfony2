<?php

namespace web3tc\EchangeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use web3tc\EchangeBundle\Entity\ContratEtude;

/**
 * Cours
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="web3tc\EchangeBundle\Entity\CoursRepository")
 */
class Cours
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
     * @var string
     *
     * @ORM\Column(name="Numero", type="string", length=255)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="Titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var integer
     *
     * @ORM\Column(name="Semestre", type="integer")
     */
    private $semestre;

    /**
     * @var integer
     *
     * @ORM\Column(name="Credits", type="integer")
     */
    private $credits;
    
    /**
     * @Assert\Type(type="web3tc\EchangeBundle\Entity\ContratEtude")
     * @ORM\ManyToMany(targetEntity="ContratEtude")
     * @ORM\JoinColumn(nullable=false)
     */
    private $contratEtude;    


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
     * Set numero
     *
     * @param string $numero
     * @return Cours
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return string 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Cours
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set semestre
     *
     * @param integer $semestre
     * @return Cours
     */
    public function setSemestre($semestre)
    {
        $this->semestre = $semestre;

        return $this;
    }

    /**
     * Get semestre
     *
     * @return integer 
     */
    public function getSemestre()
    {
        return $this->semestre;
    }

    /**
     * Set credits
     *
     * @param integer $credits
     * @return Cours
     */
    public function setCredits($credits)
    {
        $this->credits = $credits;

        return $this;
    }

    /**
     * Get credits
     *
     * @return integer 
     */
    public function getCredits()
    {
        return $this->credits;
    }
}
