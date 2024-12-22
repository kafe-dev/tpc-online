<?php

namespace App\Entity;

use App\Repository\ProductComboItemsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductComboItemsRepository::class)]
class ProductComboItems
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $parent_id = null;

    #[ORM\Column]
    private array $child_ids = [];

    #[ORM\Column(type: Types::DECIMAL, precision: 65, scale: 2)]
    private ?string $discount_amount = null;

    //	type: 0 = 'Percentage', 1 = 'Flat'
    #[ORM\Column]
    private ?int $discount_type = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParentId(): ?string
    {
        return $this->parent_id;
    }

    public function setParentId(string $parent_id): static
    {
        $this->parent_id = $parent_id;

        return $this;
    }

    public function getChildIds(): array
    {
        return $this->child_ids;
    }

    public function setChildIds(array $child_ids): static
    {
        $this->child_ids = $child_ids;

        return $this;
    }

    public function getDiscountAmount(): ?string
    {
        return $this->discount_amount;
    }

    public function setDiscountAmount(string $discount_amount): static
    {
        $this->discount_amount = $discount_amount;

        return $this;
    }

    public function getDiscountType(): ?int
    {
        return $this->discount_type;
    }

    public function setDiscountType(int $discount_type): static
    {
        $this->discount_type = $discount_type;

        return $this;
    }
}
