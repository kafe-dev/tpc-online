<?php

namespace App\Entity;

use App\Repository\LoyaltyCouponRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LoyaltyCouponRepository::class)]
#[ORM\Table(name: 'loyalties_coupons')]
class LoyaltyCoupon
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $loyalty_id = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $coupon_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getLoyaltyId(): ?string
    {
        return $this->loyalty_id;
    }

    public function setLoyaltyId(string $loyalty_id): static
    {
        $this->loyalty_id = $loyalty_id;

        return $this;
    }

    public function getCouponId(): ?string
    {
        return $this->coupon_id;
    }

    public function setCouponId(string $coupon_id): static
    {
        $this->coupon_id = $coupon_id;

        return $this;
    }
}
