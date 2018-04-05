<?php
/**
 * Created by PhpStorm.
 * User: aragorn
 * Date: 05/04/18
 * Time: 19:06
 */

namespace Model;

use Model\Hero;
use Model\Stats;

class Grid
{
    public function move(Hero $hero, Position $position, int $nbPa)
    {
        $heroPa = $hero->getStats()->getPa();
        $actualPosition = $hero->getPosition();
        $moveX = $position->getPositionX() - $actualPosition->getPositionX();
        $moveY = $position->getPositionY() - $actualPosition->getPositionY();
        if (($moveX + $moveY) == $nbPa && $nbPa <= $heroPa){
            $hero->setPosition($position);
            $hero->getStats()->setPa(($heroPa - $nbPa));
        }else{
            return 'Pas assez de PA';
        }

    }

}