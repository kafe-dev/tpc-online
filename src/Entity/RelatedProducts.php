<?php

namespace App\Entity;

use App\Repository\RelatedProductsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RelatedProductsRepository::class)]
class RelatedProducts
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $from_id = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $target_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFromId(): ?string
    {
        return $this->from_id;
    }

    public function setFromId(string $from_id): static
    {
        $this->from_id = $from_id;

        return $this;
    }

    public function getTargetId(): ?string
    {
        return $this->target_id;
    }

    public function setTargetId(string $target_id): static
    {
        $this->target_id = $target_id;

        return $this;
    }
}
