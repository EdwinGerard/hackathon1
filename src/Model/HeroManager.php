<?php
/**
 * Created by PhpStorm.
 * User: aragorn
 * Date: 06/04/18
 * Time: 07:43
 */

namespace Model;

use GuzzleHttp\Client;
use Model\Hero;

class HeroManager extends AbstractManager
{
    const TABLE = 'Hero';

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getHeroFromApi()
    {
        $client = new Client([
                'base_uri' => 'https://cdn.rawgit.com/akabab/superhero-api/0.2.0/api/id/',
            ]
        );

        for($i = 1; $i < 5; $i++){
            $response = $client->request('GET', $i . '.json');
            $body = $response->getBody();
            $json = $body->getContents();
            $heros[] = json_decode($json,true);
        }
        $heros = json_encode($heros);

        return $heros;

    }

    /**
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getHeroIdFromApi()
    {
        $client = new Client([
                'base_uri' => 'https://cdn.rawgit.com/akabab/superhero-api/0.2.0/api/id/',
            ]
        );

        for($i = 1; $i < 5; $i++){
            $response = $client->request('GET', $i . '.json');
            $body = $response->getBody();
            $json = $body->getContents();
            $heros[] = json_decode($json,true);
            $tabHeroId[] = $heros[$i-1]['id'];
        }


        return $tabHeroId;

    }

    /**
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getHeroSpeedFromApi()
    {
        $client = new Client([
                'base_uri' => 'https://cdn.rawgit.com/akabab/superhero-api/0.2.0/api/id/',
            ]
        );

        for($i = 1; $i < 5; $i++){
            $response = $client->request('GET', $i . '.json');
            $body = $response->getBody();
            $json = $body->getContents();
            $heros[] = json_decode($json,true);
            $tabHeroSpeed[] = $heros[$i-1]['powerstats']['speed'];
        }

        return $tabHeroSpeed;

    }

    public function getPositionHeros(int $gameId)
    {
        $sql = "SELECT Hero.id, Hero.position_id,Hero.name FROM Hero 
                       WHERE game_id = :gameId";
        $statement = $this->pdoConnection->prepare($sql);
        $statement->setFetchMode(\PDO::FETCH_ASSOC);
        $statement->bindValue(':gameId', $gameId, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll();

    }

    public function addPositionHero(int $gameId, array $herosId)
    {
        foreach ($herosId as $heroId){
            for ($positionId = 0; $positionId < 4; $positionId++) {
                $sql = "INSERT INTO Hero (position_id,game_id)
                         VALUES (:positionId ,:gameId)";
                $statement = $this->pdoConnection->prepare($sql);
                $statement->setFetchMode(\PDO::FETCH_ASSOC);
                $statement->bindValue(':gameId', $gameId, \PDO::PARAM_INT);
                $statement->bindValue(':positionId', $positionId, \PDO::PARAM_INT);
                $statement->execute();
            }
        }


    }

}