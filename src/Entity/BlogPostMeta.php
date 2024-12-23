<?php

namespace App\Entity;

use App\Repository\BlogPostMetaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BlogPostMetaRepository::class)]
#[ORM\HasLifecycleCallbacks]
class BlogPostMeta
{
    #[ORM\PrePersist]
    #[ORM\PreUpdate]
    public function lifecycle(): void
    {
        $this->setUpdatedAt(new \DateTimeImmutable());

        if ($this->getCreatedAt() === null) {
            $this->setCreatedAt(new \DateTimeImmutable());
        }
    }

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: BlogPosts::class)]
    #[ORM\JoinColumn(name: 'post_id', referencedColumnName: 'id')]
    private ?BlogPosts $post = null;

    #[ORM\Column(length: 255)]
    private ?string $meta_key = null;

    #[ORM\Column(type: Types::JSON)]
    private ?array $meta_value = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPost(): ?BlogPosts
    {
        return $this->post;
    }

    public function setPost(BlogPosts $post): static
    {
        $this->post = $post;

        return $this;
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

    public function getMetaValue(): ?array
    {
        return $this->meta_value;
    }

    public function setMetaValue(array $meta_value): static
    {
        $this->meta_value = $meta_value;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }


}
