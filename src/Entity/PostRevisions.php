<?php

namespace App\Entity;

use App\Repository\PostRevisionsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PostRevisionsRepository::class)]
class PostRevisions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $post_id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $revised_content = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $revised_at = null;

    #[ORM\Column]
    private ?int $revised_by = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPostId(): ?int
    {
        return $this->post_id;
    }

    public function setPostId(int $post_id): static
    {
        $this->post_id = $post_id;

        return $this;
    }

    public function getRevisedContent(): ?string
    {
        return $this->revised_content;
    }

    public function setRevisedContent(string $revised_content): static
    {
        $this->revised_content = $revised_content;

        return $this;
    }

    public function getRevisedAt(): ?\DateTimeInterface
    {
        return $this->revised_at;
    }

    public function setRevisedAt(\DateTimeInterface $revised_at): static
    {
        $this->revised_at = $revised_at;

        return $this;
    }

    public function getRevisedBy(): ?int
    {
        return $this->revised_by;
    }

    public function setRevisedBy(int $revised_by): static
    {
        $this->revised_by = $revised_by;

        return $this;
    }
}
