<?php
/**
 * Created by PhpStorm.
 * User: aragorn
 * Date: 05/04/18
 * Time: 16:29
 */

namespace Model;

use App\Connection;
use Model\Hero;
use Model\Stats;

class Fight
{
    /**
     * @param \Model\Hero $hero1
     * @param \Model\Hero $hero2
     * @return string
     */
    public function resolution(Hero $hero1, Hero $hero2): string
    {
        if ($hero1->getStats()->getPv() <= 0 && $hero2->getStats()->getPv() > 0){
            return $hero1->getName() . ' a perdu lamentablement!!';
        }

        if ($hero2->getStats()->getPv() <= 0 && $hero1->getStats()->getPv() > 0){
            return $hero2->getName() . ' a perdu lamentablement!!';
        }

        if ($hero1->getStats()->getPv() <= 0 && $hero2->getStats()->getPv() <= 0){
            return $hero1->getName() . ' et ' . $hero2->getName() . ' ont fait match nul!!';
        }

    }

}