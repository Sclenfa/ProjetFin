<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="projects")
 */
class Project
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    protected $id;

    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="projects")
     * @var ArrayCollection
     */

    protected $users;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank()
     * @Assert\Length(max=255)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank()
     * @Assert\Length(max=255)
     */
    protected $email;

    /**
     * @ORM\Column(type="text")
     *
     * @Assert\NotBlank()
     * @Assert\Length(max=2500)
     */
    protected $description;

    /**
     * @ORM\Column(type="text")
     * @Assert\Length(max=255)
     */
    protected $address;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Length(max=5)
     * @Assert\Type("integer")
     */
    protected $cp;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     *
     * @Assert\NotBlank()
     * @Assert\Type("\DateTime")
     */
    protected $dateBegin;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     *
     * @Assert\Type("\DateTime")
     */
    protected $dateEnd;

    /**
     * @ORM\Column(type="text", columnDefinition="ENUM('arts_plastiques', 'photographie', 'performance', 'ateliers')")
     *
     * @Assert\NotBlank()
     * @Assert\Choice(choices = {"arts_plastiques", "photographie", "photographie", "performance", "ateliers" })
     *
     */
    protected $category;

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank()
     * @Assert\Length(max=255)
     */
    protected $city;

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\File(
     *     maxSize = "1024k",
     *     mimeTypes = {"image/jpeg", "image/png"},
     * )
     *
     *
     */
    protected $photo;

    /**
     * @ORM\Column(type="integer")
     *
     */
    protected $participant;

    /**
     * @ORM\Column(type="text", columnDefinition="ENUM('en_cours', 'terminer', 'en_attente')")
     *
     * @Assert\Choice({"en_cours", "terminer", "en_attente" })
     *
     */
    protected $statut = "en_attente";

    protected $currentPhoto;

    public function __construct(){
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Project
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param mixed $users
     * @return Project
     */
    public function setUsers($users)
    {
        $this->users = $users;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return Project
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Project
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return Project
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     * @return Project
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * @param mixed $cp
     * @return Project
     */
    public function setCp($cp)
    {
        $this->cp = $cp;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateBegin()
    {
        return $this->dateBegin;
    }

    /**
     * @param \DateTime $dateBegin
     * @return Project
     */
    public function setDateBegin(\DateTime $dateBegin = null)
    {
        $this->dateBegin = $dateBegin;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateEnd()
    {
        return $this->dateEnd;
    }

    /**
     * @param \DateTime $dateEnd
     * @return Project
     */
    public function setDateEnd(\DateTime $dateEnd = null)
    {
        $this->dateEnd = $dateEnd;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     * @return Project
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     * @return Project
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     * @return Project
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getParticipant()
    {
        return $this->participant;
    }

    /**
     * @param mixed $participant
     * @return Project
     */
    public function setParticipant($participant)
    {
        $this->participant = $participant;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * @param mixed $statut
     * @return Project
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCurrentPhoto()
    {
        return $this->currentPhoto;
    }

    /**
     * @param string $currentPhoto
     * @return Project
     */
    public function setCurrentPhoto($currentPhoto)
    {
        $this->currentPhoto = $currentPhoto;
        return $this;
    }


}