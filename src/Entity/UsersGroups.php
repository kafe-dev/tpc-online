<?php

namespace App\Entity;

use App\Repository\UsersGroupsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsersGroupsRepository::class)]
class UsersGroups
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Users::class, cascade: ['persist', 'remove'], inversedBy: 'usersGroups')]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    private ?Users $user = null;

    #[ORM\ManyToOne(targetEntity: Groups::class, cascade: ['persist', 'remove'], inversedBy: 'usersGroups')]
    #[ORM\JoinColumn(name: 'group_id', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    private ?Groups $group_ref = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getUser(): ?Users
    {
        return $this->user;
    }

    public function setUser(?Users $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getGroupRef(): ?Groups
    {
        return $this->group_ref;
    }

    public function setGroupRef(?Groups $group_ref): static
    {
        $this->group_ref = $group_ref;

        return $this;
    }
}
