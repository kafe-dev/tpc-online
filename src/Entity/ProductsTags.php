<?php

namespace App\Entity;

use App\Repository\ProductsTagsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductsTagsRepository::class)]
class ProductsTags
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $product_id = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $tag_id = null;

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

    public function getTagId(): ?string
    {
        return $this->tag_id;
    }

    public function setTagId(string $tag_id): static
    {
        $this->tag_id = $tag_id;

        return $this;
    }
}
