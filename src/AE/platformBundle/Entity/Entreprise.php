<?php
/**
 * Created by PhpStorm.
 * User: Florence
 * Date: 23/11/2015
 * Time: 21:29
 */

namespace AE\platformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ORM\Table(name="ae_entreprise")
 */
class Entreprise
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="AE\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=true, onDelete="CASCADE")
     */

    private $user;

    /**
     * @ORM\Column(type="string")
     * @Assert\Email()
     */

    private $email_entreprise;

    /**
     * @ORM\Column(type="integer", length=50)
     */

    private $telephone_entreprise;

    /**
     * @ORM\Column(type="string", length=255)
     *
     */

    private $adresse_entreprise;

    /**
     * @ORM\Column(type="integer", length=10)
     */

    private $code_postal_entreprise;

    /**
     * @ORM\Column(type="string", length=255)
     *
     */

    private $ville_rcs;

    /**
     * @ORM\Column(type="float")
     */

    private $chiffre_d_affaire_mensuel;

    /**
     * @ORM\Column(type="string", length=255)
     *
     */

    private $nom_entreprise;

    /**
     * @ORM\Column(type="integer", length=14)
     *
     * @Assert\NotBlank(message="Le numéro d'identification (SIREN/SIRET) doit comporter 9 ou 14 chiffres.")
     * @Assert\Length(
     *     min=9,
     *     max=14,
     *     minMessage="Le numéro doit comporter au moins 9 chiffres.",
     *     maxMessage="Le numéro ne doit pas comporter plus de 14 chiffres."
     *     )
     */


    private $siret;

    /**
     * @ORM\Column(type="string", length=5)
     *
     * @Assert\NotBlank(message="Le code APE de la NAF doit comporter 4 chiffres et une lettre.")
     * @Assert\Length(
     *     min=5,
     *     max=5,
     *     exactMessage="Le code APE de la NAF doit comporter 4 chiffres et une lettre."
     *     )
     */

    private $naf_id;

    /**
     * @ORM\Column(type="string", length=255)
     */

    private $activite;

    /**
     * @ORM\Column(type="string", length=255)
     */

    private $secteur_d_activite;

    /**
     * @ORM\Column(type="string", length=255)
     */

    private $declaration;

    /**
     * @ORM\Column(type="boolean")
     */

    private $liberatoire;

    /**
     * @ORM\Column(type="boolean")
     */

    private $accre;

    /**
     * @ORM\Column(type="date")
     */

    private $date_de_lancement;

    /**
     * @ORM\Column(type="date")
     */

    private $date_de_creation;

    /**
     * Set nom_entreprise
     *
     * @param string $nom_entreprise
     * @return Entreprise
     */
    public function setNomEntreprise($nom_entreprise)
    {
        $this->nom_entreprise = $nom_entreprise;

        return $this;
    }

    /**
     * Get nom_entreprise
     *
     * @return string 
     */
    public function getNomEntreprise()
    {
        return $this->nom_entreprise;
    }

    /**
     * Set siret
     *
     * @param integer $siret
     * @return Entreprise
     */
    public function setSiret($siret)
    {
        $this->siret = $siret;

        return $this;
    }

    /**
     * Get siret
     *
     * @return integer 
     */
    public function getSiret()
    {
        return $this->siret;
    }

    /**
     * Set naf_id
     *
     * @param string $naf_id
     * @return Entreprise
     */
    public function setNafId($naf_id)
    {
        $this->naf_id = $naf_id;

        return $this;
    }

    /**
     * Get naf_id
     *
     * @return string 
     */
    public function getNafId()
    {
        return $this->naf_id;
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
     * Set activite
     *
     * @param string $activite
     * @return Entreprise
     */
    public function setActivite($activite)
    {
        $this->activite = $activite;

        return $this;
    }

    /**
     * Get activite
     *
     * @return string 
     */
    public function getActivite()
    {
        return $this->activite;
    }

    /**
     * Set secteur_d_activite
     *
     * @param string $secteur_d_activite
     * @return Entreprise
     */
    public function setSecteurDActivite($secteur_d_activite)
    {
        $this->secteur_d_activite = $secteur_d_activite;

        return $this;
    }

    /**
     * Get secteur_d_activite
     *
     * @return string 
     */
    public function getSecteurDActivite()
    {
        return $this->secteur_d_activite;
    }

    /**
     * Set declaration
     *
     * @param string $declaration
     * @return Entreprise
     */
    public function setDeclaration($declaration)
    {
        $this->declaration = $declaration;

        return $this;
    }

    /**
     * Get declaration
     *
     * @return string 
     */
    public function getDeclaration()
    {
        return $this->declaration;
    }

    /**
     * Set accre
     *
     * @param string $accre
     * @return Entreprise
     */
    public function setAccre($accre)
    {
        $this->accre = $accre;

        return $this;
    }

    /**
     * Get accre
     *
     * @return string 
     */
    public function getAccre()
    {
        return $this->accre;
    }

    /**
     * Set date_de_lancement
     *
     * @param \DateTime $date_de_lancement
     * @return Entreprise
     */
    public function setDateDeLancement(\DateTime $date_de_lancement)
    {
        $this->date_de_lancement = $date_de_lancement;

        return $this;
    }

    /**
     * Get date_de_lancement
     *
     * @return \DateTime 
     */
    public function getDateDeLancement()
    {
        return $this->date_de_lancement;
    }

    /**
     * Set email_entreprise
     *
     * @param string $email_entreprise
     * @return Entreprise
     */
    public function setEmailEntreprise($email_entreprise)
    {
        $this->email_entreprise = $email_entreprise;

        return $this;
    }

    /**
     * Get email_entreprise
     *
     * @return string 
     */
    public function getEmailEntreprise()
    {
        return $this->email_entreprise;
    }

    /**
     * Set telephone_entreprise
     *
     * @param integer $telephone_entreprise
     * @return Entreprise
     */
    public function setTelephoneEntreprise($telephone_entreprise)
    {
        $this->telephone_entreprise = $telephone_entreprise;

        return $this;
    }

    /**
     * Get telephone_entreprise
     *
     * @return integer 
     */
    public function getTelephoneEntreprise()
    {
        return $this->telephone_entreprise;
    }

    /**
     * Set adresse_entreprise
     *
     * @param string $adresse_entreprise
     * @return Entreprise
     */
    public function setAdresseEntreprise($adresse_entreprise)
    {
        $this->adresse_entreprise = $adresse_entreprise;

        return $this;
    }

    /**
     * Get adresse_entreprise
     *
     * @return string 
     */
    public function getAdresseEntreprise()
    {
        return $this->adresse_entreprise;
    }

    /**
     * Set code_postal_entreprise
     *
     * @param integer $code_postal_entreprise
     * @return Entreprise
     */
    public function setCodePostalEntreprise($code_postal_entreprise)
    {
        $this->code_postal_entreprise = $code_postal_entreprise;

        return $this;
    }

    /**
     * Get code_postal_entreprise
     *
     * @return integer 
     */
    public function getCodePostalEntreprise()
    {
        return $this->code_postal_entreprise;
    }

    /**
     * Set ville_rcs
     *
     * @param string $ville_rcs
     * @return Entreprise
     */
    public function setVilleRcs($ville_rcs)
    {
        $this->ville_rcs = $ville_rcs;

        return $this;
    }

    /**
     * Get ville_rcs
     *
     * @return string 
     */
    public function getVilleRcs()
    {
        return $this->ville_rcs;
    }

    /**
     * Set chiffre_d_affaire_mensuel
     *
     * @param float $chiffre_d_affaire_mensuel
     * @return Entreprise
     */
    public function setChiffreDAffaireMensuel($chiffre_d_affaire_mensuel)
    {
        $this->chiffre_d_affaire_mensuel = $chiffre_d_affaire_mensuel;

        return $this;
    }

    /**
     * Get chiffre_d_affaire_mensuel
     *
     * @return float 
     */
    public function getChiffreDAffaireMensuel()
    {
        return $this->chiffre_d_affaire_mensuel;
    }

    /**
     * Set user
     *
     * @param \AE\UserBundle\Entity\User $user
     * @return Entreprise
     */
    public function setUser(\AE\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AE\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set liberatoire
     *
     * @param boolean $liberatoire
     * @return Entreprise
     */
    public function setLiberatoire($liberatoire)
    {
        $this->liberatoire = $liberatoire;

        return $this;
    }

    /**
     * Get liberatoire
     *
     * @return boolean 
     */
    public function getLiberatoire()
    {
        return $this->liberatoire;
    }


    /**
     * Set impotsMensuels
     *
     * @param \AE\ComptaBundle\Entity\ImpotsMensuels $impotsMensuels
     * @return Entreprise
     */
    public function setImpotsMensuels(\AE\ComptaBundle\Entity\ImpotsMensuels $impotsMensuels = null)
    {
        $this->impotsMensuels = $impotsMensuels;

        return $this;
    }

    /**
     * Get impotsMensuels
     *
     * @return \AE\ComptaBundle\Entity\ImpotsMensuels 
     */
    public function getImpotsMensuels()
    {
        return $this->impotsMensuels;
    }

    /**
     * Set date_de_creation
     *
     * @param \DateTime $dateDeCreation
     * @return Entreprise
     */
    public function setDateDeCreation($dateDeCreation)
    {
        $this->date_de_creation = $dateDeCreation;

        return $this;
    }

    /**
     * Get date_de_creation
     *
     * @return \DateTime 
     */
    public function getDateDeCreation()
    {
        return $this->date_de_creation;
    }
}
