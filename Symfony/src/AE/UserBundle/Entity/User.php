<?php

namespace AE\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ORM\Table(name="ae_user")
 */
class User extends BaseUser
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


    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return User
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return User
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
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
     * Set siretId
     *
     * @param integer $siretId
     *
     * @return User
     */
    public function setSiretId($siretId)
    {
        $this->siretId = $siretId;
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
     *
     * @return User
     */
    public function setNafId($nafId)
    {
        $this->nafId = $nafId;
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


}
