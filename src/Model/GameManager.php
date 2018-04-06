<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 07/03/18
 * Time: 18:20
 * PHP version 7
 */

namespace Model;



/**
 *
 */
class GameManager extends AbstractManager
{
    const TABLE = 'game';

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function gameList(int $playerId)
    {
        // prepared request
        $sql="SELECT g.id,g.name,u1.name as player1,u1.id as playerId1 , u2.name as player2,u2.id as playerId2  
                FROM wildfighter.game as g
                JOIN user as u1 ON player_id1 = u1.id
                LEFT JOIN user as u2 ON player_id2 = u2.id
                WHERE player_id1=:playerId OR player_id2=:playerId OR player_id2 IS NULL";

        $statement = $this->pdoConnection->prepare($sql);
        $statement->setFetchMode(\PDO::FETCH_ASSOC);
        $statement->bindValue(':playerId', $playerId, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function addPlayerAtGame(int $gameId, int $playerId)
    {
        // prepared request
        $sql = 'UPDATE game SET player_id2 = :playerId WHERE id=:gameId';
        $statement = $this->pdoConnection->prepare($sql);
        //$statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
        $statement->bindValue(':playerId', $playerId );
        $statement->bindValue(':gameId', $gameId );
        $statement->execute();
        echo $gameId;
    }

    public function addGame(string $gameName, $player1)
    {
    $sql = 'INSERT INTO game (name, player_id1) VALUES (:game, :id)';
    $prep = $this->pdoConnection->prepare($sql);
    $prep->bindValue(':game', $gameName);
    $prep->bindValue(':id', $player1);
    $prep->execute();
    }
}
