<?php

namespace App\Entity;

use App\Repository\StatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatRepository::class)]
class Stat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: 'stat', targetEntity: HeroStat::class)]
    private Collection $heroStats;

    public function __construct()
    {
        $this->heroStats = new ArrayCollection();
    }

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

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
            $heroStat->setStat($this);
        }

        return $this;
    }

    public function removeHeroStat(HeroStat $heroStat): static
    {
        if ($this->heroStats->removeElement($heroStat)) {
            // set the owning side to null (unless already changed)
            if ($heroStat->getStat() === $this) {
                $heroStat->setStat(null);
            }
        }

        return $this;
    }
}
