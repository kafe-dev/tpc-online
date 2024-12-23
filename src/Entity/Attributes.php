<?php

namespace App\Entity;

use App\Repository\AttributesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AttributesRepository::class)]
class Attributes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private array $data = [];

    /**
     * @var Collection<int, ProductVariantsAttributes>
     */
    #[ORM\OneToMany(targetEntity: ProductVariantsAttributes::class, mappedBy: 'attribute', orphanRemoval: true)]
    private Collection $productVariantsAttributes;

    public function __construct()
    {
        $this->productVariantsAttributes = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function setData(array $data): static
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return Collection<int, ProductVariantsAttributes>
     */
    public function getProductVariantsAttributes(): Collection
    {
        return $this->productVariantsAttributes;
    }

    public function addProductVariantsAttribute(ProductVariantsAttributes $productVariantsAttribute): static
    {
        if (!$this->productVariantsAttributes->contains($productVariantsAttribute)) {
            $this->productVariantsAttributes->add($productVariantsAttribute);
            $productVariantsAttribute->setAttribute($this);
        }

        return $this;
    }

    public function removeProductVariantsAttribute(ProductVariantsAttributes $productVariantsAttribute): static
    {
        if ($this->productVariantsAttributes->removeElement($productVariantsAttribute)) {
            // set the owning side to null (unless already changed)
            if ($productVariantsAttribute->getAttribute() === $this) {
                $productVariantsAttribute->setAttribute(null);
            }
        }

        return $this;
    }
}
