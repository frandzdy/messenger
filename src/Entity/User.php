<?php
// src/AppBundle/Entity/User.php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="lastname", type="text")
     */
    private $lastname;
    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Image", cascade={"persist", "remove"})
     * @Assert\Valid()
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\RefHobbies", cascade={"persist", "remove"})
     * @Assert\Valid()
     */
    private $preferences;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\RefCivilite")
     * @Assert\Valid()
     */
    private $civilite;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\RefDepartement")
     * @Assert\Valid()
     */
    private $departement;

    /**
     * @var string
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\RefDepartement")
     * @Assert\Valid()
     */
    private $preferenceDepartements;

    /**
     * @ORM\Column(name="date_naissance", type="datetime")
     */

    private $dateNaissance;

    /**
     * @var string
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\RefCivilite")
     * @Assert\Valid()
     */
    private $preferenceSexes;

    /**
     * User constructor.
     */

    public function __construct()
    {
        parent::__construct();
        // Par défaut, la date de l'annonce est la date d'aujourd'hui
        // $this -> date = new \Datetime();
        // $this -> creator = "Frandzdy Sanon";
        $this->preferences = new ArrayCollection();
        // $this -> commentaires = new ArrayCollection();
    }

    /**
     * Set image
     *
     * @param Image $image
     *
     * @return User
     */
    public function setImage(Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return Image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Add preference
     *
     * @param RefHobbies $preference
     *
     * @return User
     */
    public function addPreference(RefHobbies $preference)
    {
        $this->preferences[] = $preference;

        return $this;
    }

    /**
     * Remove preference
     *
     * @param RefHobbies $preference
     */
    public function removePreference(RefHobbies $preference)
    {
        $this->preferences->removeElement($preference);
    }

    /**
     * Get preferences
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPreferences()
    {
        return $this->preferences;
    }

    /**
     * Set civilite
     *
     * @param RefCivilite $civilite
     *
     * @return RefCivilite
     */
    public function setCivilite(RefCivilite $civilite)
    {
        $this->civilite = $civilite;

        return $this;
    }

    /**
     * Get Civilite
     *
     * @return RefCivilite
     */
    public function getCivilite()
    {
        return $this->civilite;
    }

    /**
     * Set Departement
     *
     * @param RefDepartement $civilite
     *
     * @return RefCivilite
     */
    public function setDepartement(RefDepartement $departement)
    {
        $this->departement = $departement;

        return $this;
    }

    /**
     * Get Departement
     *
     * @return RefDepartement
     */
    public function getDepartement()
    {
        return $this->departement;
    }

    /**
     * Add preferenceDepartement
     *
     * @param RefDepartement $preferenceDepartement
     *
     * @return User
     */
    public function addPreferenceDepartement(RefDepartement $preferenceDepartement)
    {
        $this->preferenceDepartements[] = $preferenceDepartement;

        return $this;
    }

    /**
     * Remove preferenceDepartement
     *
     * @param RefDepartement $preferenceDepartement
     */
    public function removePreferenceDepartement(RefDepartement $preferenceDepartement)
    {
        $this->preferenceDepartements->removeElement($preferenceDepartement);
    }

    /**
     * Get preferenceDepartements
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPreferenceDepartements()
    {
        return $this->preferenceDepartements;
    }

    /**
     * Set dateNaissance
     *
     * @param $dateNaissance
     * @return $this
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set civilite
     * @param RefCivilite $preferenceSexes
     * @return $this
     */
    public function setPreferenceSexes(RefCivilite $preferenceSexes)
    {
        $this->preferenceSexes = $preferenceSexes;

        return $this;
    }

    /**
     * Get Civilite
     *
     * @return RefCivilite
     */
    public function getPreferenceSexes()
    {
        return $this->preferenceSexes;
    }
    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }
}