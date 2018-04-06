<?php
/**
 * Created by PhpStorm.
 * User: wcs
 * Date: 23/10/17
 * Time: 10:57
 * PHP version 7
 */

namespace Model;

/**
 * Class User
 *
 */
class User
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $password;

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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param $pass1
     * @param $pass2
     * @return bool
     * @throws \Exception
     */
    public function checkPassword($pass1, $pass2):bool
    {
        if($pass1 !== $pass2){
            throw new \Exception('Les mots de passe sont différents.');
        }

        return true;
    }
    /**
     * @param string $name
     * @throws \Exception
     */
    public function setName(string $name): void
    {
        if (empty($name)){
            throw new \Exception('le login est vide');
        }
        if(!preg_match('/^[a-zA-Z]([\w_\.]){1,32}$/',$name)){
            throw new \Exception('caractères spéciaux interdits.');
        }
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }


    /**
     * @param string $password
     * @throws \Exception
     */
    public function setPassword(string $password): void
    {
        if(strlen($password)<6){
            throw new \Exception('mot de passe trop court.');
        }
        $password=md5($password);
        $this->password = $password;
    }


}
