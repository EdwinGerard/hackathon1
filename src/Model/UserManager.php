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

    public function checkUserExist(string $userName):bool
    {
        $sql = 'SELECT id FROM user WHERE name=:userName';
        $statement = $this->pdoConnection->prepare($sql);
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
        $statement->bindValue(':userName', $userName);
        $statement->execute();
        $result = $statement->fetch();
        if (empty($result)){
            return false;
        } else {
            return true;
        }
    }

    public function checkConnexion(string $userName,string $password)
    {
        $password = md5($password); //on le crypte pour la comparaison

        $sql = 'SELECT id,name,COUNT(id) as nb FROM user WHERE name=:userName AND password=:password';
        $statement = $this->pdoConnection->prepare($sql);
        $statement->setFetchMode(\PDO::FETCH_CLASS, $this->className);
        $statement->bindValue(':password', $password);
        $statement->bindValue(':userName', $userName);
        $statement->execute();
        return $statement->fetch();

    }
}
