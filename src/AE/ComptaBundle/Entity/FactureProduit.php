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
     * Set entreprise
     *
     * @param \AE\platformBundle\Entity\Entreprise $entreprise
     * @return FactureProduit
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
     * @return FactureProduit
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
}
