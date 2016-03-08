<?php

namespace AE\DashBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contractuels
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Contractuels
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
     * @ORM\Column(name="nom_contractuel", type="string", length=50)
     */
    private $nomContractuel;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_contractuel", type="string", length=255)
     */
    private $adresseContractuel;

    /**
     * @var integer
     *
     * @ORM\Column(name="code_postal_contractuel", type="integer")
     */
    private $codePostalContractuel;

    /**
     * @var string
     *
     * @ORM\Column(name="forme_juridique_contractuel", type="string", length=255)
     */
    private $formeJuridiqueContractuel;


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
     * Set nomContractuel
     *
     * @param string $nomContractuel
     * @return Contractuels
     */
    public function setNomContractuel($nomContractuel)
    {
        $this->nomContractuel = $nomContractuel;

        return $this;
    }

    /**
     * Get nomContractuel
     *
     * @return string 
     */
    public function getNomContractuel()
    {
        return $this->nomContractuel;
    }

    /**
     * Set adresseContractuel
     *
     * @param string $adresseContractuel
     * @return Contractuels
     */
    public function setAdresseContractuel($adresseContractuel)
    {
        $this->adresseContractuel = $adresseContractuel;

        return $this;
    }

    /**
     * Get adresseContractuel
     *
     * @return string 
     */
    public function getAdresseContractuel()
    {
        return $this->adresseContractuel;
    }

    /**
     * Set codePostalContractuel
     *
     * @param integer $codePostalContractuel
     * @return Contractuels
     */
    public function setCodePostalContractuel($codePostalContractuel)
    {
        $this->codePostalContractuel = $codePostalContractuel;

        return $this;
    }

    /**
     * Get codePostalContractuel
     *
     * @return integer 
     */
    public function getCodePostalContractuel()
    {
        return $this->codePostalContractuel;
    }

    /**
     * Set formeJuridiqueContractuel
     *
     * @param string $formeJuridiqueContractuel
     * @return Contractuels
     */
    public function setFormeJuridiqueContractuel($formeJuridiqueContractuel)
    {
        $this->formeJuridiqueContractuel = $formeJuridiqueContractuel;

        return $this;
    }

    /**
     * Get formeJuridiqueContractuel
     *
     * @return string 
     */
    public function getFormeJuridiqueContractuel()
    {
        return $this->formeJuridiqueContractuel;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->factures = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add factures
     *
     * @param \AE\DashBundle\Entity\Factures $factures
     * @return Contractuels
     */
    public function addFacture(\AE\DashBundle\Entity\Factures $factures)
    {
        $this->factures[] = $factures;
        $factures->setContractuel($this);

        return $this;
    }

    /**
     * Remove factures
     *
     * @param \AE\DashBundle\Entity\Factures $factures
     */
    public function removeFacture(\AE\DashBundle\Entity\Factures $factures)
    {
        $this->factures->removeElement($factures);
    }

    /**
     * Get factures
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFactures()
    {
        return $this->factures;
    }
}
