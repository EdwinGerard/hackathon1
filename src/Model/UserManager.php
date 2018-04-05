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
class UserManager extends AbstractManager
{
    const TABLE = 'item';

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function addUser(User $user)
    {
        // prepared request
        $sql = 'INSERT INTO user (name,password) VALUES (:name,:password)';
        $statement = $this->pdoConnection->prepare($sql);
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
        $statement->bindValue(':name', $user->getName() );
        $statement->bindValue(':password', $user->getPassword() );
        $statement->execute();
    }
}
