<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItemRepository::class)]
class Item
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $name = null;

    #[ORM\Column(length: 20)]
    private ?string $type = null;

    #[ORM\Column(nullable: true)]
    private ?int $damage_min = null;

    #[ORM\Column(nullable: true)]
    private ?int $damage_max = null;

    #[ORM\Column(nullable: true)]
    private ?int $armor = null;

    #[ORM\Column]
    private ?bool $stackable = null;

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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getDamageMin(): ?int
    {
        return $this->damage_min;
    }

    public function setDamageMin(?int $damage_min): static
    {
        $this->damage_min = $damage_min;

        return $this;
    }

    public function getDamageMax(): ?int
    {
        return $this->damage_max;
    }

    public function setDamageMax(?int $damage_max): static
    {
        $this->damage_max = $damage_max;

        return $this;
    }

    public function getArmor(): ?int
    {
        return $this->armor;
    }

    public function setArmor(?int $armor): static
    {
        $this->armor = $armor;

        return $this;
    }

    public function isStackable(): ?bool
    {
        return $this->stackable;
    }

    public function setStackable(bool $stackable): static
    {
        $this->stackable = $stackable;

        return $this;
    }
}
