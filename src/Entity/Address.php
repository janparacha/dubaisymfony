<?php

namespace App\Entity;

use App\Repository\AddressRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AddressRepository::class)]
class Address
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'addresses')]
    #[ORM\JoinColumn(nullable: false)]
    private $user;

    #[ORM\Column(type: 'string', length: 10)]
    private $number;

    #[ORM\Column(type: 'string', length: 50)]
    private $street;

    #[ORM\Column(type: 'string', length: 15)]
    private $postal_code;

    #[ORM\Column(type: 'string', length: 50)]
    private $city;

    #[ORM\Column(type: 'string', length: 70, nullable: true)]
    private $complementary_address;

    #[ORM\Column(type: 'boolean')]
    private $billing_address;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postal_code;
    }

    public function setPostalCode(string $postal_code): self
    {
        $this->postal_code = $postal_code;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getComplementaryAddress(): ?string
    {
        return $this->complementary_address;
    }

    public function setComplementaryAddress(?string $complementary_address): self
    {
        $this->complementary_address = $complementary_address;

        return $this;
    }

    public function getBillingAddress(): ?bool
    {
        return $this->billing_address;
    }

    public function setBillingAddress(bool $billing_address): self
    {
        $this->billing_address = $billing_address;

        return $this;
    }
}
