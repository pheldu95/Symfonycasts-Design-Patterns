<?php

namespace App\ArmorType;

use App\Dice;

class ShieldType implements ArmorType
{
    public function getArmorReduction(int $damage): int
    {
        $chanceToBlock = Dice::roll(100);

        //20% chance to block incoming damage. so then would just return the full damage for the reduction. else the reduction is 0
        return $chanceToBlock > 80 ? $damage : 0;
    }
}