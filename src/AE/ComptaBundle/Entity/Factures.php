<?php

namespace AE\ComptaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;


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
     * @ORM\Column(type="string", length=255)
     *
     */

    private $client;


    /**
     * @ORM\Column(type="float")
     */

    private $prixUnitaireHT;

    /**
     * @ORM\Column(type="string", length=255)
     *
     */

    private $produit;

    /**
     * @ORM\Column(type="date")
     */

    private $date;


     /**
     * @ORM\Column(type="integer")
     */

    private $quantite;

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
     * Set client
     *
     * @param string $client
     * @return Factures
     */
    public function setClient($client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return string 
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set prixUnitaireHT
     *
     * @param float $prixUnitaireHT
     * @return Factures
     */
    public function setPrixUnitaireHT($prixUnitaireHT)
    {
        $this->prixUnitaireHT = $prixUnitaireHT;

        return $this;
    }

    /**
     * Get prixUnitaireHT
     *
     * @return float 
     */
    public function getPrixUnitaireHT()
    {
        return $this->prixUnitaireHT;
    }

    /**
     * Set produit
     *
     * @param string $produit
     * @return Factures
     */
    public function setProduit($produit)
    {
        $this->produit = $produit;

        return $this;
    }

    /**
     * Get produit
     *
     * @return string 
     */
    public function getProduit()
    {
        return $this->produit;
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
     * Set quantite
     *
     * @param integer $quantite
     * @return Factures
     */
    public function setQuantité($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer 
     */
    public function getQuantite()
    {
        return $this->quantite;
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
}
