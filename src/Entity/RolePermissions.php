<?php

namespace App\Entity;

use App\Repository\RolePermissionsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RolePermissionsRepository::class)]
class RolePermission
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Role::class)]
    #[ORM\JoinColumn(name: 'role_id', referencedColumnName: 'id')]
    private ?Role $role = null;

    #[ORM\ManyToOne(targetEntity: Permissions::class)]
    #[ORM\JoinColumn(name: 'permission_id', referencedColumnName: 'id')]
    private ?Permissions $permission = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRole(): ?Role
    {
        return $this->role;
    }

    public function setRole(?Role $role): static
    {
        $this->role = $role;

        return $this;
    }

    public function getPermission(): ?Permissions
    {
        return $this->permission;
    }

    public function setPermission(?Permissions $permission): static
    {
        $this->permission = $permission;

        return $this;
    }
}
