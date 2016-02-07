<?php

namespace AE\ComptaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FactureProduit
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class FactureProduit
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
     *
     * @ORM\Column(name="quantite", type="integer")
     */
    private $quantite;

    /**
     * @ORM\ManyToOne(targetEntity="AE\ComptaBundle\Entity\Factures", cascade={"persist"})
     */

    private $factures;

    /**
     * @ORM\ManyToOne(targetEntity="AE\ComptaBundle\Entity\Produits", cascade={"persist"})
     */

    private $produits;


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
     * Set quantite
     *
     * @param integer $quantite
     * @return FactureProduit
     */
    public function setQuantite($quantite)
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
     * Set factures
     *
     * @param \AE\ComptaBundle\Entity\Factures $factures
     * @return FactureProduit
     */
    public function setFactures(\AE\ComptaBundle\Entity\Factures $factures = null)
    {
        $this->factures = $factures;

        return $this;
    }

    /**
     * Get factures
     *
     * @return \AE\ComptaBundle\Entity\Factures 
     */
    public function getFactures()
    {
        return $this->factures;
    }

    /**
     * Set produits
     *
     * @param \AE\ComptaBundle\Entity\Produits $produits
     * @return FactureProduit
     */
    public function setProduits(\AE\ComptaBundle\Entity\Produits $produits = null)
    {
        $this->produits = $produits;

        return $this;
    }

    /**
     * Get produits
     *
     * @return \AE\ComptaBundle\Entity\Produits 
     */
    public function getProduits()
    {
        return $this->produits;
    }
}
