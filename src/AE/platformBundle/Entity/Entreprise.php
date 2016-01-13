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
     * @ORM\Column(type="string", length=255)
     */

    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */

    private $prenom;

    /**
     * @ORM\Column(type="string")
     * @Assert\Email()
     */

    private $email;

    /**
     * @ORM\Column(type="integer", length=50)
     */

    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     *
     */

    private $adresse;

    /**
     * @ORM\Column(type="integer", length=10)
     */

    private $codePostal;

    /**
     * @ORM\Column(type="string", length=255)
     *
     */

    private $ville;

    /**
     * @ORM\Column(type="string", length=255)
     *
     */

    private $pays;

    /**
     * @ORM\Column(type="string", length=255)
     *
     */

    private $villeRCS;

    /**
     * @ORM\Column(type="float")
     */

    private $chiffreDAffaire;

    /**
     * @ORM\Column(type="string", length=255)
     *
     */

    private $nomEntreprise;

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


    private $siretId;

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

    private $nafId;

    /**
     * @ORM\Column(type="string", length=255)
     */

    private $activite;

    /**
     * @ORM\Column(type="string", length=255)
     */

    private $secteurDActivite;

    /**
     * @ORM\Column(type="string", length=255)
     */

    private $declaration;

    /**
     * @ORM\Column(type="string", length=255)
     */

    private $accre;

    /**
     * @ORM\Column(type="date")
     */

    private $startDate;

    /**
     * Set nom
     *
     * @param string $nom
     * @return Entreprise
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
     * Set nomEntreprise
     *
     * @param string $nomEntreprise
     * @return Entreprise
     */
    public function setNomEntreprise($nomEntreprise)
    {
        $this->nomEntreprise = $nomEntreprise;

        return $this;
    }

    /**
     * Get nomEntreprise
     *
     * @return string 
     */
    public function getNomEntreprise()
    {
        return $this->nomEntreprise;
    }

    /**
     * Set siretId
     *
     * @param integer $siretId
     * @return Entreprise
     */
    public function setSiretId($siretId)
    {
        $this->siretId = $siretId;

        return $this;
    }

    /**
     * Get siretId
     *
     * @return integer 
     */
    public function getSiretId()
    {
        return $this->siretId;
    }

    /**
     * Set nafId
     *
     * @param string $nafId
     * @return Entreprise
     */
    public function setNafId($nafId)
    {
        $this->nafId = $nafId;

        return $this;
    }

    /**
     * Get nafId
     *
     * @return string 
     */
    public function getNafId()
    {
        return $this->nafId;
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
     * Set secteurDActivite
     *
     * @param string $secteurDActivite
     * @return Entreprise
     */
    public function setSecteurDActivite($secteurDActivite)
    {
        $this->secteurDActivite = $secteurDActivite;

        return $this;
    }

    /**
     * Get secteurDActivite
     *
     * @return string 
     */
    public function getSecteurDActivite()
    {
        return $this->secteurDActivite;
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
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return Entreprise
     */
    public function setStartDate(\DateTime $startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Entreprise
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Entreprise
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set telephone
     *
     * @param integer $telephone
     * @return Entreprise
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return integer 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Entreprise
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set codePostal
     *
     * @param integer $codePostal
     * @return Entreprise
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return integer 
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return Entreprise
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set pays
     *
     * @param string $pays
     * @return Entreprise
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string 
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set villeRCS
     *
     * @param string $villeRCS
     * @return Entreprise
     */
    public function setVilleRCS($villeRCS)
    {
        $this->villeRCS = $villeRCS;

        return $this;
    }

    /**
     * Get villeRCS
     *
     * @return string 
     */
    public function getVilleRCS()
    {
        return $this->villeRCS;
    }

    /**
     * Set chiffreDAffaire
     *
     * @param float $chiffreDAffaire
     * @return Entreprise
     */
    public function setChiffreDAffaire($chiffreDAffaire)
    {
        $this->chiffreDAffaire = $chiffreDAffaire;

        return $this;
    }

    /**
     * Get chiffreDAffaire
     *
     * @return float 
     */
    public function getChiffreDAffaire()
    {
        return $this->chiffreDAffaire;
    }
}
