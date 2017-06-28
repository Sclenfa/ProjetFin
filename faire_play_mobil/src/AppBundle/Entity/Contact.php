<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 26/06/2017
 * Time: 15:14
 */

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Contact
{
    /**
     *
     * @Assert\NotBlank()
     * @Assert\Length(max=255)
     */
    protected $name;

    /**
     *
     * @Assert\NotBlank()
     * @Assert\Length(max=255)
     */
    protected $email;

    /**     *
     * @Assert\NotBlank()
     * @Assert\Choice(choices = {"info_asso", "info_projet", "pb_site" })
     *
     */
    protected $category;

    /**
     *
     * @Assert\NotBlank()
     * @Assert\Length(max=2500)
     */
    protected $message;

    /**
     *
     * @Assert\NotBlank()
     */
    protected $cgu;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Contact
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * @return Contact
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
     * @return Contact
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     * @return Contact
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCgu()
    {
        return $this->cgu;
    }

    /**
     * @param mixed $cgu
     * @return Contact
     */
    public function setCgu($cgu)
    {
        $this->cgu = $cgu;
        return $this;
    }



}