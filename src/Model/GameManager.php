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

    public function gameList()
    {
        // prepared request
        $sql="SELECT g.id,g.name,u1.name as player1,u2.name as player2 FROM wildfighter.game as g
                JOIN user as u1 ON player_id1 = u1.id
                LEFT JOIN user as u2 ON player_id2 = u2.id";

        $statement = $this->pdoConnection->prepare($sql);
        $statement->setFetchMode(\PDO::FETCH_ASSOC);
        //$statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll();
    }
}
