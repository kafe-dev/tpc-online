<?php

namespace App\Entity;

use App\Repository\SuppliersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SuppliersRepository::class)]
class Suppliers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<int, SupplierMeta>
     */
    #[ORM\OneToMany(targetEntity: SupplierMeta::class, mappedBy: 'supplier', orphanRemoval: true)]
    private Collection $supplierMetas;

    /**
     * @var Collection<int, Products>
     */
    #[ORM\OneToMany(targetEntity: Products::class, mappedBy: 'supplier')]
    private Collection $products;

    public function __construct()
    {
        $this->supplierMetas = new ArrayCollection();
        $this->products = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
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

    /**
     * @return Collection<int, SupplierMeta>
     */
    public function getSupplierMetas(): Collection
    {
        return $this->supplierMetas;
    }

    public function addSupplierMeta(SupplierMeta $supplierMeta): static
    {
        if (!$this->supplierMetas->contains($supplierMeta)) {
            $this->supplierMetas->add($supplierMeta);
            $supplierMeta->setSupplier($this);
        }

        return $this;
    }

    public function removeSupplierMeta(SupplierMeta $supplierMeta): static
    {
        if ($this->supplierMetas->removeElement($supplierMeta)) {
            // set the owning side to null (unless already changed)
            if ($supplierMeta->getSupplier() === $this) {
                $supplierMeta->setSupplier(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Products>
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Products $product): static
    {
        if (!$this->products->contains($product)) {
            $this->products->add($product);
            $product->setSupplier($this);
        }

        return $this;
    }

    public function removeProduct(Products $product): static
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getSupplier() === $this) {
                $product->setSupplier(null);
            }
        }

        return $this;
    }
}
