<?php

namespace App\Entity;

use App\Repository\BlogPostTagRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BlogPostTagRepository::class)]
class BlogPostTag
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: BlogPosts::class)]
    #[ORM\JoinColumn(name: 'post_id', referencedColumnName: 'id')]
    private ?BlogPosts $post = null;

    #[ORM\ManyToOne(targetEntity: BlogTags::class)]
    #[ORM\JoinColumn(name: 'tag_id', referencedColumnName: 'id')]
    private ?BlogTags $tag = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPost(): ?BlogPosts
    {
        return $this->post;
    }

    public function setPost(?BlogPosts $post): static
    {
        $this->post = $post;

        return $this;
    }

    public function getTag(): ?BlogTags
    {
        return $this->tag;
    }

    public function setTag(?BlogTags $tag): static
    {
        $this->tag = $tag;

        return $this;
    }
}
