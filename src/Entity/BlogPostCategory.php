<?php

namespace App\Entity;

use App\Repository\BlogPostCategoryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BlogPostCategoryRepository::class)]
class BlogPostCategory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: BlogPosts::class)]
    #[ORM\JoinColumn(name: 'post_id', referencedColumnName: 'id')]
    private ?BlogPosts $post = null;

    #[ORM\ManyToOne(targetEntity: BlogCategories::class)]
    #[ORM\JoinColumn(name: 'category_id', referencedColumnName: 'id')]
    private ?BlogCategories $category = null;

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

    public function getCategory(): ?BlogCategories
    {
        return $this->category;
    }

    public function setCategory(?BlogCategories $category): static
    {
        $this->category = $category;

        return $this;
    }
}
