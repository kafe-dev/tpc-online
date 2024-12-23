<?php

namespace App\Entity;

use App\Repository\ProductVariantsAttributesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductVariantsAttributesRepository::class)]
class ProductVariantsAttributes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: ProductVariants::class, cascade: ['persist', 'remove'], inversedBy: 'productVariantsAttributes')]
    #[ORM\JoinColumn(name: 'product_variant_id', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    private ?ProductVariants $product_variant = null;

    #[ORM\ManyToOne(targetEntity: Attributes::class, cascade: ['persist', 'remove'], inversedBy: 'productVariantsAttributes')]
    #[ORM\JoinColumn(name: 'attribute_id', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    private ?Attributes $attribute = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductVariant(): ?ProductVariants
    {
        return $this->product_variant;
    }

    public function setProductVariant(?ProductVariants $product_variant): static
    {
        $this->product_variant = $product_variant;

        return $this;
    }

    public function getAttribute(): ?Attributes
    {
        return $this->attribute;
    }

    public function setAttribute(?Attributes $attribute): static
    {
        $this->attribute = $attribute;

        return $this;
    }
}
