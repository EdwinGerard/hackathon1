<?php
/**
 * Created by PhpStorm.
 * User: aragorn
 * Date: 05/04/18
 * Time: 16:36
 */

namespace Model;


class Stats
{
    /**
     * @var int
     */
    private $pa;

    /**
     * durability
     * @var int
     */
    private $pv;

    /**
     * combat
     * @var int
     */
    private $melee;

    /**
     * combat
     * @var int
     */
    private $distant;

    /**
     * power
     * @var int
     */
    private $spell;

    /**
     * strength
     * @var int
     */
    private $resistance;

    /**
     * @return int
     */
    public function getPa(): int
    {
        return $this->pa;
    }

    /**
     * @param int $pa
     */
    public function setPa(int $pa): void
    {
        $this->pa = $pa;
    }

    /**
     * @return int
     */
    public function getPv(): int
    {
        return $this->pv;
    }

    /**
     * @param int $pv
     */
    public function setPv(int $pv): void
    {
        $this->pv = $pv;
    }

    /**
     * @return int
     */
    public function getMelee(): int
    {
        return $this->melee;
    }

    /**
     * @param int $melee
     */
    public function setMelee(int $melee): void
    {
        $this->melee = $melee;
    }

    /**
     * @return int
     */
    public function getDistant(): int
    {
        return $this->distant;
    }

    /**
     * @param int $distant
     */
    public function setDistant(int $distant): void
    {
        $this->distant = $distant;
    }

    /**
     * @return int
     */
    public function getSpell(): int
    {
        return $this->spell;
    }

    /**
     * @param int $spell
     */
    public function setSpell(int $spell): void
    {
        $this->spell = $spell;
    }

    /**
     * @return int
     */
    public function getResistance(): int
    {
        return $this->resistance;
    }

    /**
     * @param int $resistance
     */
    public function setResistance(int $resistance): void
    {
        $this->resistance = $resistance;
    }


}