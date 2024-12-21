<?php

namespace App\Entity;

use App\Repository\ProductVariantInventoryRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductVariantInventoryRepository::class)]
#[ORM\Table(name: 'product_variants_inventories')]
class ProductVariantInventory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $product_variant_id = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $inventory_id = null;

    #[ORM\Column]
    private ?int $stock = null;

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

    public function getInventoryId(): ?string
    {
        return $this->inventory_id;
    }

    public function setInventoryId(string $inventory_id): static
    {
        $this->inventory_id = $inventory_id;

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
}
