<?php

namespace App\Entity;

use App\Repository\ProductsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;

#[ORM\Entity(repositoryClass: ProductsRepository::class)]
#[HasLifecycleCallbacks]
class Products
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Suppliers::class, cascade: ['persist', 'remove'], inversedBy: 'products')]
    #[ORM\JoinColumn(name: 'supplier_id', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    private ?Suppliers $supplier = null;

    #[ORM\Column(length: 255)]
    private ?string $sku = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(length: 500)]
    private ?string $short_description = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 65, scale: 2)]
    private ?string $original_price = null;

    //	type: 0 = 'Simple', 1 = 'Variant'
    #[ORM\Column]
    private ?int $type = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $thumbnail = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $meta_keyword = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $meta_description = null;

    //	status: 0 = 'Inactive', 1 = 'Active', 2 = 'Draft'
    #[ORM\Column(options: ["default" => 0])]
    private ?int $status = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;

    /**
     * @var Collection<int, ProductsCategories>
     */
    #[ORM\OneToMany(targetEntity: ProductsCategories::class, mappedBy: 'product', orphanRemoval: true)]
    private Collection $productsCategories;

    /**
     * @var Collection<int, ProductReviews>
     */
    #[ORM\OneToMany(targetEntity: ProductReviews::class, mappedBy: 'product', orphanRemoval: true)]
    private Collection $productReviews;

    /**
     * @var Collection<int, ProductsTags>
     */
    #[ORM\OneToMany(targetEntity: ProductsTags::class, mappedBy: 'product', orphanRemoval: true)]
    private Collection $productsTags;

    /**
     * @var Collection<int, RelatedProducts>
     */
    #[ORM\OneToMany(targetEntity: RelatedProducts::class, mappedBy: 'from_target', orphanRemoval: true)]
    private Collection $relatedProducts_from;

    /**
     * @var Collection<int, RelatedProducts>
     */
    #[ORM\OneToMany(targetEntity: RelatedProducts::class, mappedBy: 'target', orphanRemoval: true)]
    private Collection $relatedProducts_target;

    /**
     * @var Collection<int, ProductComboItems>
     */
    #[ORM\OneToMany(targetEntity: ProductComboItems::class, mappedBy: 'parent', orphanRemoval: true)]
    private Collection $productComboItems;

    /**
     * @var Collection<int, ProductVariants>
     */
    #[ORM\OneToMany(targetEntity: ProductVariants::class, mappedBy: 'product', orphanRemoval: true)]
    private Collection $productVariants;

    /**
     * @var Collection<int, Wishlist>
     */
    #[ORM\OneToMany(targetEntity: Wishlist::class, mappedBy: 'product', orphanRemoval: true)]
    private Collection $wishlists;

    public function __construct()
    {
        $this->productsCategories = new ArrayCollection();
        $this->productReviews = new ArrayCollection();
        $this->productsTags = new ArrayCollection();
        $this->relatedProducts_from = new ArrayCollection();
        $this->relatedProducts_target = new ArrayCollection();
        $this->productComboItems = new ArrayCollection();
        $this->productVariants = new ArrayCollection();
        $this->wishlists = new ArrayCollection();
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

    public function getSku(): ?string
    {
        return $this->sku;
    }

    public function setSku(string $sku): static
    {
        $this->sku = $sku;

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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getShortDescription(): ?string
    {
        return $this->short_description;
    }

    public function setShortDescription(string $short_description): static
    {
        $this->short_description = $short_description;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getOriginalPrice(): ?string
    {
        return $this->original_price;
    }

    public function setOriginalPrice(string $original_price): static
    {
        $this->original_price = $original_price;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getThumbnail(): ?string
    {
        return $this->thumbnail;
    }

    public function setThumbnail(?string $thumbnail): static
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    public function getMetaKeyword(): ?string
    {
        return $this->meta_keyword;
    }

    public function setMetaKeyword(?string $meta_keyword): static
    {
        $this->meta_keyword = $meta_keyword;

        return $this;
    }

    public function getMetaDescription(): ?string
    {
        return $this->meta_description;
    }

    public function setMetaDescription(?string $meta_description): static
    {
        $this->meta_description = $meta_description;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): static
    {
        $this->status = $status;

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
     * @return Collection<int, ProductsCategories>
     */
    public function getProductsCategories(): Collection
    {
        return $this->productsCategories;
    }

    public function addProductsCategory(ProductsCategories $productsCategory): static
    {
        if (!$this->productsCategories->contains($productsCategory)) {
            $this->productsCategories->add($productsCategory);
            $productsCategory->setProduct($this);
        }

        return $this;
    }

    public function removeProductsCategory(ProductsCategories $productsCategory): static
    {
        if ($this->productsCategories->removeElement($productsCategory)) {
            // set the owning side to null (unless already changed)
            if ($productsCategory->getProduct() === $this) {
                $productsCategory->setProduct(null);
            }
        }

        return $this;
    }

    public function getSupplier(): ?Suppliers
    {
        return $this->supplier;
    }

    public function setSupplier(?Suppliers $supplier): static
    {
        $this->supplier = $supplier;

        return $this;
    }

    /**
     * @return Collection<int, ProductReviews>
     */
    public function getProductReviews(): Collection
    {
        return $this->productReviews;
    }

    public function addProductReview(ProductReviews $productReview): static
    {
        if (!$this->productReviews->contains($productReview)) {
            $this->productReviews->add($productReview);
            $productReview->setProduct($this);
        }

        return $this;
    }

    public function removeProductReview(ProductReviews $productReview): static
    {
        if ($this->productReviews->removeElement($productReview)) {
            // set the owning side to null (unless already changed)
            if ($productReview->getProduct() === $this) {
                $productReview->setProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProductsTags>
     */
    public function getProductsTags(): Collection
    {
        return $this->productsTags;
    }

    public function addProductsTag(ProductsTags $productsTag): static
    {
        if (!$this->productsTags->contains($productsTag)) {
            $this->productsTags->add($productsTag);
            $productsTag->setProduct($this);
        }

        return $this;
    }

    public function removeProductsTag(ProductsTags $productsTag): static
    {
        if ($this->productsTags->removeElement($productsTag)) {
            // set the owning side to null (unless already changed)
            if ($productsTag->getProduct() === $this) {
                $productsTag->setProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, RelatedProducts>
     */
    public function getRelatedProductsFrom(): Collection
    {
        return $this->relatedProducts_from;
    }

    public function addRelatedProductsFrom(RelatedProducts $relatedProductsFrom): static
    {
        if (!$this->relatedProducts_from->contains($relatedProductsFrom)) {
            $this->relatedProducts_from->add($relatedProductsFrom);
            $relatedProductsFrom->setFromTarget($this);
        }

        return $this;
    }

    public function removeRelatedProductsFrom(RelatedProducts $relatedProductsFrom): static
    {
        if ($this->relatedProducts_from->removeElement($relatedProductsFrom)) {
            // set the owning side to null (unless already changed)
            if ($relatedProductsFrom->getFromTarget() === $this) {
                $relatedProductsFrom->setFromTarget(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, RelatedProducts>
     */
    public function getRelatedProductsTarget(): Collection
    {
        return $this->relatedProducts_target;
    }

    public function addRelatedProductsTarget(RelatedProducts $relatedProductsTarget): static
    {
        if (!$this->relatedProducts_target->contains($relatedProductsTarget)) {
            $this->relatedProducts_target->add($relatedProductsTarget);
            $relatedProductsTarget->setTarget($this);
        }

        return $this;
    }

    public function removeRelatedProductsTarget(RelatedProducts $relatedProductsTarget): static
    {
        if ($this->relatedProducts_target->removeElement($relatedProductsTarget)) {
            // set the owning side to null (unless already changed)
            if ($relatedProductsTarget->getTarget() === $this) {
                $relatedProductsTarget->setTarget(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProductComboItems>
     */
    public function getProductComboItems(): Collection
    {
        return $this->productComboItems;
    }

    public function addProductComboItem(ProductComboItems $productComboItem): static
    {
        if (!$this->productComboItems->contains($productComboItem)) {
            $this->productComboItems->add($productComboItem);
            $productComboItem->setParent($this);
        }

        return $this;
    }

    public function removeProductComboItem(ProductComboItems $productComboItem): static
    {
        if ($this->productComboItems->removeElement($productComboItem)) {
            // set the owning side to null (unless already changed)
            if ($productComboItem->getParent() === $this) {
                $productComboItem->setParent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProductVariants>
     */
    public function getProductVariants(): Collection
    {
        return $this->productVariants;
    }

    public function addProductVariant(ProductVariants $productVariant): static
    {
        if (!$this->productVariants->contains($productVariant)) {
            $this->productVariants->add($productVariant);
            $productVariant->setProduct($this);
        }

        return $this;
    }

    public function removeProductVariant(ProductVariants $productVariant): static
    {
        if ($this->productVariants->removeElement($productVariant)) {
            // set the owning side to null (unless already changed)
            if ($productVariant->getProduct() === $this) {
                $productVariant->setProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Wishlist>
     */
    public function getWishlists(): Collection
    {
        return $this->wishlists;
    }

    public function addWishlist(Wishlist $wishlist): static
    {
        if (!$this->wishlists->contains($wishlist)) {
            $this->wishlists->add($wishlist);
            $wishlist->setProduct($this);
        }

        return $this;
    }

    public function removeWishlist(Wishlist $wishlist): static
    {
        if ($this->wishlists->removeElement($wishlist)) {
            // set the owning side to null (unless already changed)
            if ($wishlist->getProduct() === $this) {
                $wishlist->setProduct(null);
            }
        }

        return $this;
    }
}
