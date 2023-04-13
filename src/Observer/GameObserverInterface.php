<?php

namespace App\Observer;

interface GameObserverInterface
{
    public function onFightFinished(FightResult $fightResult);
}