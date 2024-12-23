<?php

namespace App\Entity;

use App\Repository\SaleEventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;

#[ORM\Entity(repositoryClass: SaleEventRepository::class)]
#[ORM\Table(name: 'sale_events')]
#[HasLifecycleCallbacks]
class SaleEvent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 65, scale: 2)]
    private ?string $discount_amount = null;

    //	discount type: 0 = 'Percentage', 1 = 'Flat'
    #[ORM\Column]
    private ?int $discount_type = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $start_at = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $end_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;

    /**
     * @var Collection<int, SaleEventMeta>
     */
    #[ORM\OneToMany(targetEntity: SaleEventMeta::class, mappedBy: 'sale_event', orphanRemoval: true)]
    private Collection $saleEventsMetas;

    /**
     * @var Collection<int, ProductVariantSaleEvent>
     */
    #[ORM\OneToMany(targetEntity: ProductVariantSaleEvent::class, mappedBy: 'sale_event', orphanRemoval: true)]
    private Collection $productVariantSaleEvents;

    public function __construct()
    {
        $this->saleEventsMetas = new ArrayCollection();
        $this->productVariantSaleEvents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

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

    public function getStartAt(): ?\DateTimeInterface
    {
        return $this->start_at;
    }

    public function setStartAt(?\DateTimeInterface $start_at): static
    {
        $this->start_at = $start_at;

        return $this;
    }

    public function getEndAt(): ?\DateTimeInterface
    {
        return $this->end_at;
    }

    public function setEndAt(?\DateTimeInterface $end_at): static
    {
        $this->end_at = $end_at;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeImmutable $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    //	Lifecycle Callbacks

    #[ORM\PrePersist]
    public function lifecyclePersist(): void
    {
        $this->setCreatedAt(new \DateTimeImmutable());
        $this->setUpdatedAt(new \DateTimeImmutable());
    }

    #[ORM\PreUpdate]
    public function lifecycleUpdate(): void
    {
        $this->setUpdatedAt(new \DateTimeImmutable());
    }

    /**
     * @return Collection<int, SaleEventMeta>
     */
    public function getSaleEventsMetas(): Collection
    {
        return $this->saleEventsMetas;
    }

    public function addSaleEventsMeta(SaleEventMeta $saleEventsMeta): static
    {
        if (!$this->saleEventsMetas->contains($saleEventsMeta)) {
            $this->saleEventsMetas->add($saleEventsMeta);
            $saleEventsMeta->setSaleEvent($this);
        }

        return $this;
    }

    public function removeSaleEventsMeta(SaleEventMeta $saleEventsMeta): static
    {
        if ($this->saleEventsMetas->removeElement($saleEventsMeta)) {
            // set the owning side to null (unless already changed)
            if ($saleEventsMeta->getSaleEvent() === $this) {
                $saleEventsMeta->setSaleEvent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProductVariantSaleEvent>
     */
    public function getProductVariantSaleEvents(): Collection
    {
        return $this->productVariantSaleEvents;
    }

    public function addProductVariantSaleEvent(ProductVariantSaleEvent $productVariantSaleEvent): static
    {
        if (!$this->productVariantSaleEvents->contains($productVariantSaleEvent)) {
            $this->productVariantSaleEvents->add($productVariantSaleEvent);
            $productVariantSaleEvent->setSaleEvent($this);
        }

        return $this;
    }

    public function removeProductVariantSaleEvent(ProductVariantSaleEvent $productVariantSaleEvent): static
    {
        if ($this->productVariantSaleEvents->removeElement($productVariantSaleEvent)) {
            // set the owning side to null (unless already changed)
            if ($productVariantSaleEvent->getSaleEvent() === $this) {
                $productVariantSaleEvent->setSaleEvent(null);
            }
        }

        return $this;
    }
}
