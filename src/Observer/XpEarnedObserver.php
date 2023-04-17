<?php

namespace App\Observer;

use App\Service\XpCalculator;
use App\FightResult;
use App\Service\XpCalculatorInterface;

class XpEarnedObserver implements GameObserverInterface
{
    public function __construct(private readonly XpCalculatorInterface $xpCalculator){

    }

    public function onFightFinished(FightResult $fightResult)
    {
        $winner = $fightResult->getWinner();
        $loser = $fightResult->getLoser();

        $this->xpCalculator->addXp($winner, $loser->getLevel());
    }
}