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

    #[ORM\ManyToOne(targetEntity: Products::class, cascade: ['persist', 'remove'], inversedBy: 'relatedProducts_from')]
    #[ORM\JoinColumn(name: 'from_target_id', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    private ?Products $from_target = null;

    #[ORM\ManyToOne(targetEntity: Products::class, cascade: ['persist', 'remove'], inversedBy: 'relatedProducts_target')]
    #[ORM\JoinColumn(name: 'target_id', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    private ?Products $target = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFromTarget(): ?Products
    {
        return $this->from_target;
    }

    public function setFromTarget(?Products $from_target): static
    {
        $this->from_target = $from_target;

        return $this;
    }

    public function getTarget(): ?Products
    {
        return $this->target;
    }

    public function setTarget(?Products $target): static
    {
        $this->target = $target;

        return $this;
    }
}
