<?php

namespace App\Entity;

use App\Repository\ProductVariantsAttributesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductVariantsAttributesRepository::class)]
class ProductVariantsAttributes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $product_variant_id = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $attribute_id = null;

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

    public function getAttributeId(): ?string
    {
        return $this->attribute_id;
    }

    public function setAttributeId(string $attribute_id): static
    {
        $this->attribute_id = $attribute_id;

        return $this;
    }
}
