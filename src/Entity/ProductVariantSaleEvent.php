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

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $product_variant_id = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $sale_event_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
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

    public function getSaleEventId(): ?string
    {
        return $this->sale_event_id;
    }

    public function setSaleEventId(string $sale_event_id): static
    {
        $this->sale_event_id = $sale_event_id;

        return $this;
    }
}
