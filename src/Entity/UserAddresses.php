<?php

namespace App\Entity;

use App\Repository\UserAddressesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserAddressesRepository::class)]
class UserAddresses
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Users::class, cascade: ['persist', 'remove'], inversedBy: 'userAddresses')]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    private ?Users $user = null;

    #[ORM\OneToOne(targetEntity: Communes::class, inversedBy: 'userAddresses', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(name: 'commune_id', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    private ?Communes $commune = null;

    #[ORM\Column(length: 500)]
    private ?string $address = null;

    #[ORM\Column(length: 10)]
    private ?string $postal_code = null;

    //	type: 0 = 'Home', 1 = 'Office', 2 = 'Other'
    #[ORM\Column]
    private ?int $type = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postal_code;
    }

    public function setPostalCode(string $postal_code): static
    {
        $this->postal_code = $postal_code;

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

    public function getUser(): ?Users
    {
        return $this->user;
    }

    public function setUser(?Users $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getCommune(): ?Communes
    {
        return $this->commune;
    }

    public function setCommune(Communes $commune): static
    {
        $this->commune = $commune;

        return $this;
    }
}
