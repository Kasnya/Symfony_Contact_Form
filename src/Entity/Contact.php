<?php

namespace App\Entity;
use  App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
{
/**
 * @ORM\Id()
 * @ORM\GeneratedValue()
 * @ORM\Column(type="integer")
 */
private int $id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->Name;
    }

    /**
     * @param string $Name
     */
    public function setName(string $Name): void
    {
        $this->Name = $Name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->Email;
    }

    /**
     * @param string $Email
     */
    public function setEmail(string $Email): void
    {
        $this->Email = $Email;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->Message;
    }

    /**
     * @param string $Message
     */
    public function setMessage(string $Message): void
    {
        $this->Message = $Message;
    }

/**
 * @ORM\Column(type="string", length=50)
 */
public string $Name;

/**
 * @ORM\Column(type="string", length=50)
 */
public string $Email;

/**
 * @ORM\Column(type="string", length=255)
 */
    public string $Message;
}