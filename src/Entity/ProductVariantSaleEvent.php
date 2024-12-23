<?php

namespace App\Entity;

use App\Repository\ProductVariantSaleEventRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductVariantSaleEventRepository::class)]
#[ORM\Table(name: 'product_variants_sale_events')]
class ProductVariantSaleEvent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: ProductVariants::class, cascade: ['persist', 'remove'], inversedBy: 'productVariantSaleEvents')]
    #[ORM\JoinColumn(name: 'product_variant_id', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    private ?ProductVariants $product_variant = null;

    #[ORM\ManyToOne(targetEntity: SaleEvents::class, cascade: ['persist', 'remove'], inversedBy: 'productVariantSaleEvents')]
    #[ORM\JoinColumn(name: 'sale_event_id', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    private ?SaleEvents $sale_event = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
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

    public function getSaleEvent(): ?SaleEvents
    {
        return $this->sale_event;
    }

    public function setSaleEvent(?SaleEvents $sale_event): static
    {
        $this->sale_event = $sale_event;

        return $this;
    }
}
