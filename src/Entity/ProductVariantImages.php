<?php

namespace App\Entity;

use App\Repository\ProductVariantImagesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductVariantImagesRepository::class)]
class ProductVariantImages
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $product_variant_id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $image = null;

    #[ORM\Column]
    private ?int $position = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductVariantId(): ?string
    {
        return $this->product_variant_id;
    }

    public function setProductVariantId(string $product_variant_id): static
    {
        $this->product_variant_id = $product_variant_id;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

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
