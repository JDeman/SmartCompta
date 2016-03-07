<?php

namespace AE\ComptaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ImpotsMensuels
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class ImpotsMensuels
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
     * @ORM\OnetoOne(targetEntity="AE\platformBundle\Entity\Entreprise")
     */

    private $entreprise;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var float
     *
     * @ORM\Column(name="impotSurRevenu", type="float")
     */
    private $impotSurRevenu;

    /**
     * @var float
     *
     * @ORM\Column(name="impotFormationPro", type="float")
     */
    private $impotFormationPro;

    /**
     * @var float
     *
     * @ORM\Column(name="cotisationsSociales", type="float")
     */
    private $cotisationsSociales;

    /**
     * @var float
     *
     * @ORM\Column(name="tauxGlobal", type="float")
     */
    private $tauxGlobal;

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
     * @return ImpotsMensuels
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
     * Set impotSurRevenu
     *
     * @param float $impotSurRevenu
     * @return ImpotsMensuels
     */
    public function setImpotSurRevenu($impotSurRevenu)
    {
        $this->impotSurRevenu = $impotSurRevenu;

        return $this;
    }

    /**
     * Get impotSurRevenu
     *
     * @return float 
     */
    public function getImpotSurRevenu()
    {
        return $this->impotSurRevenu;
    }

    /**
     * Set impotFormationPro
     *
     * @param float $impotFormationPro
     * @return ImpotsMensuels
     */
    public function setImpotFormationPro($impotFormationPro)
    {
        $this->impotFormationPro = $impotFormationPro;

        return $this;
    }

    /**
     * Get impotFormationPro
     *
     * @return float 
     */
    public function getImpotFormationPro()
    {
        return $this->impotFormationPro;
    }

    /**
     * Set cotisationsSociales
     *
     * @param float $cotisationsSociales
     * @return ImpotsMensuels
     */
    public function setCotisationsSociales($cotisationsSociales)
    {
        $this->cotisationsSociales = $cotisationsSociales;

        return $this;
    }

    /**
     * Get cotisationsSociales
     *
     * @return float 
     */
    public function getCotisationsSociales()
    {
        return $this->cotisationsSociales;
    }


    /**
     * Set entreprise
     *
     * @param \AE\platformBundle\Entity\Entreprise $entreprise
     * @return ImpotsMensuels
     */
    public function setEntreprise(\AE\platformBundle\Entity\Entreprise $entreprise = null)
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    /**
     * Get entreprise
     *
     * @return \AE\platformBundle\Entity\Entreprise 
     */
    public function getEntreprise()
    {
        return $this->entreprise;
    }

    /**
     * Set tauxGlobal
     *
     * @param float $tauxGlobal
     * @return ImpotsMensuels
     */
    public function setTauxGlobal($tauxGlobal)
    {
        $this->tauxGlobal = $tauxGlobal;

        return $this;
    }

    /**
     * Get tauxGlobal
     *
     * @return float 
     */
    public function getTauxGlobal()
    {
        return $this->tauxGlobal;
    }
}
