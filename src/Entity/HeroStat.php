<?php

namespace App\Entity;

use App\Repository\HeroStatRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HeroStatRepository::class)]
class HeroStat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'heroStats')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Hero $hero = null;

    #[ORM\ManyToOne(inversedBy: 'heroStats')]
    private ?Stat $stat = null;

    #[ORM\Column]
    private ?int $value = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHero(): ?Hero
    {
        return $this->hero;
    }

    public function setHero(?Hero $hero): static
    {
        $this->hero = $hero;

        return $this;
    }

    public function getStat(): ?Stat
    {
        return $this->stat;
    }

    public function setStat(?Stat $stat): static
    {
        $this->stat = $stat;

        return $this;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(int $value): static
    {
        $this->value = $value;

        return $this;
    }
}
