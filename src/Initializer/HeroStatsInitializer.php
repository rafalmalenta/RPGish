<?php

namespace App\Initializer;

use App\Entity\Hero;
use App\Entity\HeroStat;
use App\Repository\StatRepository;

class HeroStatsInitializer
{
    public const INITIAL_STAT_VALUE = 5;
    public function __construct(private readonly StatRepository $statRepository)
    {
    }

    public function initialize(Hero $hero): void
    {
        $stats = $this->statRepository->findAll();
        foreach ($stats as $stat){
            $heroStat = new HeroStat();
            $heroStat->setStat($stat);
            $heroStat->setValue($this::INITIAL_STAT_VALUE);
            $hero->addHeroStat($heroStat);
        }
    }
}
