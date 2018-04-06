<?php
/**
 * Created by PhpStorm.
 * User: wilder10
 * Date: 06/04/18
 * Time: 12:17
 */

namespace Model;


class TurnManager extends AbstractManager
{
    const TABLE = 'game';

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function getTurn($gameId)
    {
        $sql="SELECT * FROM turn 
                WHERE game_id=:gameId";

        $statement = $this->pdoConnection->prepare($sql);
        $statement->setFetchMode(\PDO::FETCH_ASSOC);
        $statement->bindValue(':gameId', $gameId, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }

    public function addTurn($gameId,$heroId)
    {

        $sql = 'INSERT INTO turn (turn, hero_id,game_id) VALUES (1,:heroId, :gameId)';
        $prep = $this->pdoConnection->prepare($sql);
        $prep->bindValue(':gameId', $gameId);
        $prep->bindValue(':heroId', $heroId);
        $prep->execute();
    }

}