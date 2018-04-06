<?php
/**
 * Created by PhpStorm.
 * User: aragorn
 * Date: 05/04/18
 * Time: 16:30
 */

namespace Model;

use Model\Stats;


class Hero
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $position;

    /**
     * @var Stats
     */
    private $stats;

    /**
     * @var string
     */
    private $name;

    /**
     * @var bool
     */
    private $isDefense;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getPosition(): int
    {
        return $this->position;
    }

    /**
     * @param int $position
     */
    public function setPosition(int $position): void
    {
        $this->position = $position;
    }

    /**
     * @return \Model\Stats
     */
    public function getStats(): \Model\Stats
    {
        return $this->stats;
    }

    /**
     * @param \Model\Stats $stats
     */
    public function setStats(\Model\Stats $stats): void
    {
        $this->stats = $stats;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return bool
     */
    public function isDefense(): bool
    {
        return $this->isDefense;
    }

    /**
     * @param bool $isDefense
     */
    public function setIsDefense(bool $isDefense): void
    {
        $this->isDefense = $isDefense;
    }

    public function fightMelee(Hero $hero)
    {
        $heroPv = $hero->getStats()->getPv();
        if ($hero->isDefense() == true){
            $hero->getStats()->setResistance($hero->getStats()->getResistance() * 2);
            if ($hero->getStats()->getResistance() >= $this->getStats()->getMelee()) {
                $hero->getStats()->setPv($heroPv);
            }else{
                $hero->getStats()->setPv($heroPv - ($this->getStats()->getMelee() * 0.1 - $hero->getStats()->getResistance() * 0.1));
            }
        }
    }

    public function fightDistant(Hero $hero)
    {
        $heroPv = $hero->getStats()->getPv();
        if ($hero->isDefense() == true){
            $hero->getStats()->setResistance($hero->getStats()->getResistance() * 2);
            if ($hero->getStats()->getResistance() >= $this->getStats()->getDistant()) {
                $hero->getStats()->setPv($heroPv);
            }else{
                $hero->getStats()->setPv($heroPv - ($this->getStats()->getDistant() * 0.1 - $hero->getStats()->getResistance() * 0.1));
            }
        }
    }

    public function fightSpecial(Hero $hero)
    {
        $heroPv = $hero->getStats()->getPv();

        $hero->getStats()->setPv($heroPv - ($this->getStats()->getSpell() * 0.1) );
    }

}