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
    /**
     * @param \Model\Hero $hero
     * @param Position $position
     * @param int $nbPa
     * @throws \Exception
     */
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
            throw new \Exception('Pas assez de PA');
        }

    }

}