<?php

namespace App\Entity;

use App\Repository\ProductVariantsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductVariantsRepository::class)]
class ProductVariants
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $product_id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 65, scale: 2)]
    private ?string $price = null;

    //	on sale: 0 = 'No', 1 = 'Yes'
    #[ORM\Column(options: ["default" => 0])]
    private ?int $on_sale = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 65, scale: 2, nullable: true)]
    private ?string $sale_price = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $sale_start_at = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $sale_end_at = null;

    #[ORM\Column]
    private ?int $stock = null;

    #[ORM\Column]
    private ?int $position = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductId(): ?string
    {
        return $this->product_id;
    }

    public function setProductId(string $product_id): static
    {
        $this->product_id = $product_id;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getOnSale(): ?int
    {
        return $this->on_sale;
    }

    public function setOnSale(int $on_sale): static
    {
        $this->on_sale = $on_sale;

        return $this;
    }

    public function getSalePrice(): ?string
    {
        return $this->sale_price;
    }

    public function setSalePrice(?string $sale_price): static
    {
        $this->sale_price = $sale_price;

        return $this;
    }

    public function getSaleStartAt(): ?\DateTimeInterface
    {
        return $this->sale_start_at;
    }

    public function setSaleStartAt(?\DateTimeInterface $sale_start_at): static
    {
        $this->sale_start_at = $sale_start_at;

        return $this;
    }

    public function getSaleEndAt(): ?\DateTimeInterface
    {
        return $this->sale_end_at;
    }

    public function setSaleEndAt(?\DateTimeInterface $sale_end_at): static
    {
        $this->sale_end_at = $sale_end_at;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): static
    {
        $this->stock = $stock;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): static
    {
        $this->position = $position;

        return $this;
    }
}
