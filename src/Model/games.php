<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 05/04/18
 * Time: 17:32
 */

namespace Model;


class game
{
private $id;
private $gameName;
private $idPlayer1;
private $idPlayer2;

    /*GETTER // SETTER */

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getGameName()
    {
        return $this->gameName;
    }

    /**
     * @param mixed $gameName
     */
    public function setGameName($gameName)
    {
        $this->gameName = $gameName;
    }

    /**
     * @return mixed
     */
    public function getTeamSize()
    {
        return $this->teamSize;
    }

    /**
     * @param mixed $teamSize
     */
    public function setTeamSize($teamSize)
    {
        $this->teamSize = $teamSize;
    }

    /**
     * @return mixed
     */
    public function getIdPlayer1()
    {
        return $this->idPlayer1;
    }

    /**
     * @param mixed $idPlayer1
     */
    public function setIdPlayer1($idPlayer1)
    {
        $this->idPlayer1 = $idPlayer1;
    }

    /**
     * @return mixed
     */
    public function getIdPlayer2()
    {
        return $this->idPlayer2;
    }

    /**
     * @param mixed $idPlayer2
     */
    public function setIdPlayer2($idPlayer2)
    {
        $this->idPlayer2 = $idPlayer2;
    }


/* MY METHOD */

}

