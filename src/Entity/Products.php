<?php

namespace App\Entity;

use App\Repository\ProductsRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity(repositoryClass: ProductsRepository::class)]
class Products
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 150)]
    private $name;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $quantity_ml;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $reference;

    #[ORM\Column(type: 'float')]
    private $price_ht;

    #[ORM\Column(type: 'integer')]
    private $tva;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $stock;

    #[ORM\Column(type: 'string', length: 150, nullable: true)]
    private $picture;

    #[ORM\ManyToOne(targetEntity: Category::class, inversedBy: 'products')]
    private $category;

    #[Gedmo\Slug(fields:['name'])]
    #[ORM\Column(type: 'string', length: 150)]
    private $slug;

    public function __toString()
    {
        return $this->id . ' - ' . $this->name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getQuantityMl(): ?int
    {
        return $this->quantity_ml;
    }

    public function setQuantityMl(?int $quantity_ml): self
    {
        $this->quantity_ml = $quantity_ml;

        return $this;
    }

    public function getReference(): ?int
    {
        return $this->reference;
    }

    public function setReference(?int $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getPriceHt(): ?int
    {
        return $this->price_ht;
    }

    public function setPriceHt(int $price_ht): self
    {
        $this->price_ht = $price_ht;

        return $this;
    }

    public function getTva(): ?int
    {
        return $this->tva;
    }

    public function setTva(int $tva): self
    {
        $this->tva = $tva;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(?int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }
}
