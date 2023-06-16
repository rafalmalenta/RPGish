<?php

namespace App\Entity;

use App\Repository\HeroRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HeroRepository::class)]
class Hero
{
    public const HERO_STATS = [
        'strength'=>"Strength",
    ];
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'hero', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'heroes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Role $class = null;

    #[ORM\OneToMany(mappedBy: 'hero', targetEntity: HeroStat::class, cascade: ['persist', 'remove'], orphanRemoval: true)]
    private Collection $heroStats;

    public function __construct()
    {
        $this->heroStats = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getClass(): ?Role
    {
        return $this->class;
    }

    public function setClass(?Role $class): static
    {
        $this->class = $class;

        return $this;
    }

    /**
     * @return Collection<int, HeroStat>
     */
    public function getHeroStats(): Collection
    {
        return $this->heroStats;
    }

    public function addHeroStat(HeroStat $heroStat): static
    {
        if (!$this->heroStats->contains($heroStat)) {
            $this->heroStats->add($heroStat);
            $heroStat->setHero($this);
        }

        return $this;
    }

    public function removeHeroStat(HeroStat $heroStat): static
    {
        if ($this->heroStats->removeElement($heroStat)) {
            // set the owning side to null (unless already changed)
            if ($heroStat->getHero() === $this) {
                $heroStat->setHero(null);
            }
        }

        return $this;
    }

    public function getStatByName(string $name): ?HeroStat
    {
        /** @var HeroStat $stat */
        foreach ($this->heroStats as $stat){
            $statName = $stat->getStat()->getName();
            if ($statName === $name){
                return $stat;
            }
        }
        return null;
    }

}
