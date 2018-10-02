<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 05/04/18
 * Time: 17:32
 */

namespace Model;


class Game
{

    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $gameName;
    /**
     * @var int
     */
    private $playerId1;
    /**
     * @var int
     */
    private $playerId2;


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
     * @return string
     */
    public function getGameName(): string
    {
        return $this->gameName;
    }

    /**
     * @param string $gameName
     */
    public function setGameName(string $gameName): void
    {
        $this->gameName = $gameName;
    }

    /**
     * @return int
     */
    public function getPlayerId1(): int
    {
        return $this->playerId1;
    }

    /**
     * @param int $playerId1
     */
    public function setPlayerId1(int $playerId1): void
    {
        $this->playerId1 = $playerId1;
    }

    /**
     * @return int
     */
    public function getPlayerId2(): int
    {
        return $this->playerId2;
    }

    /**
     * @param int $playerId2
     */
    public function setPlayerId2(int $playerId2): void
    {
        $this->playerId2 = $playerId2;
    }




}

