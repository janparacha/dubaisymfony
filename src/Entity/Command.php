<?php

namespace App\Entity;

use App\Repository\CommandRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandRepository::class)]
class Command
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime')]
    private $date;

    #[ORM\Column(type: 'string', length: 70)]
    private $payment_type;

    #[ORM\Column(type: 'boolean')]
    private $delivery_option;

    #[ORM\Column(type: 'string', length: 70)]
    private $delivery_number;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getPaymentType(): ?string
    {
        return $this->payment_type;
    }

    public function setPaymentType(string $payment_type): self
    {
        $this->payment_type = $payment_type;

        return $this;
    }

    public function getDeliveryOption(): ?bool
    {
        return $this->delivery_option;
    }

    public function setDeliveryOption(bool $delivery_option): self
    {
        $this->delivery_option = $delivery_option;

        return $this;
    }

    public function getDeliveryNumber(): ?string
    {
        return $this->delivery_number;
    }

    public function setDeliveryNumber(string $delivery_number): self
    {
        $this->delivery_number = $delivery_number;

        return $this;
    }
}
