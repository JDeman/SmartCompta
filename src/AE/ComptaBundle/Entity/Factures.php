<?php

namespace AE\ComptaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity()
 */

class Factures
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="AE\platformBundle\Entity\Entreprise")
     * @ORM\JoinColumn(nullable=false)
     */

    private $entreprise;

    /**
     * @ORM\ManyToOne(targetEntity="AE\ComptaBundle\Entity\Contractuels")
     * @ORM\JoinColumn(nullable=false)
     */

    private $contractuel;

    /**
     * @ORM\OneToMany(targetEntity="AE\ComptaBundle\Entity\FactureProduit", mappedBy="factures", cascade={"persist"})
     */

    private $factureProduit;

    /**
     * @ORM\Column(type="date")
     */

    private $date;

    /**
     * @ORM\Column(type="float")
     */

    private $prixTotalHT;

    /**
     * @ORM\Column(type="float")
     */

    private $recetteTotaleHT;


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
     * @return Factures
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
     * Set prixTotalHT
     *
     * @param float $prixTotalHT
     * @return Factures
     */
    public function setPrixTotalHT($prixTotalHT)
    {
        $this->prixTotalHT = $prixTotalHT;

        return $this;
    }

    /**
     * Get prixTotalHT
     *
     * @return float 
     */
    public function getPrixTotalHT()
    {
        return $this->prixTotalHT;
    }

    /**
     * Set recetteTotaleHT
     *
     * @param float $recetteTotaleHT
     * @return Factures
     */
    public function setRecetteTotaleHT($recetteTotaleHT)
    {
        $this->recetteTotaleHT = $recetteTotaleHT;

        return $this;
    }

    /**
     * Get recetteTotaleHT
     *
     * @return float 
     */
    public function getRecetteTotaleHT()
    {
        return $this->recetteTotaleHT;
    }

    /**
     * Set entreprise
     *
     * @param \AE\platformBundle\Entity\Entreprise $entreprise
     * @return Factures
     */
    public function setEntreprise(\AE\platformBundle\Entity\Entreprise $entreprise)
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
     * Set contractuel
     *
     * @param \AE\ComptaBundle\Entity\Contractuels $contractuel
     * @return Factures
     */
    public function setContractuel(\AE\ComptaBundle\Entity\Contractuels $contractuel)
    {
        $this->contractuel = $contractuel;

        return $this;
    }

    /**
     * Get contractuel
     *
     * @return \AE\ComptaBundle\Entity\Contractuels 
     */
    public function getContractuel()
    {
        return $this->contractuel;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->factureProduit = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add factureProduit
     *
     * @param \AE\ComptaBundle\Entity\FactureProduit $factureProduit
     * @return Factures
     */
    public function addFactureProduit(\AE\ComptaBundle\Entity\FactureProduit $factureProduit)
    {
        $this->factureProduit[] = $factureProduit;
        $factureProduit->setFactures($this);

        return $this;
    }

    /**
     * Remove factureProduit
     *
     * @param \AE\ComptaBundle\Entity\FactureProduit $factureProduit
     */
    public function removeFactureProduit(\AE\ComptaBundle\Entity\FactureProduit $factureProduit)
    {
        $this->factureProduit->removeElement($factureProduit);
    }

    /**
     * Get factureProduit
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFactureProduit()
    {
        return $this->factureProduit;
    }
}
