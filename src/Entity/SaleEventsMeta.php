<?php

namespace App\Entity;

use App\Repository\SaleEventsMetaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SaleEventsMetaRepository::class)]
class SaleEventsMeta
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: SaleEvents::class, cascade: ['persist', 'remove'], inversedBy: 'saleEventsMetas')]
    #[ORM\JoinColumn(name: 'sale_event_id', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    private ?SaleEvents $sale_event = null;

    #[ORM\Column(length: 255)]
    private ?string $meta_key = null;

    #[ORM\Column]
    private array $meta_value = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMetaKey(): ?string
    {
        return $this->meta_key;
    }

    public function setMetaKey(string $meta_key): static
    {
        $this->meta_key = $meta_key;

        return $this;
    }

    public function getMetaValue(): array
    {
        return $this->meta_value;
    }

    public function setMetaValue(array $meta_value): static
    {
        $this->meta_value = $meta_value;

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
