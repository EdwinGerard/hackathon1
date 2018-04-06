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
            $herosTab[] = json_decode($json,true);
        }

        for($i = 0; $i < 4; $i++){
            $heroJson = $herosTab[$i];
            $hero = new Hero();
            $hero->setId($heroJson['id']);
            $hero->setName($heroJson['name']);
            $stats = new Stats();
            $stats->setPa(10);
            $stats->setPv($heroJson['powerstats']['durability']);
            $stats->setResistance($heroJson['powerstats']['strength']);
            $stats->setMelee($heroJson['powerstats']['combat']);
            $stats->setDistant($heroJson['powerstats']['combat']);
            $stats->setSpell($heroJson['powerstats']['power']);
            $hero->setStats($stats);
            $position = new Position();
            $position->setPositionX($i+1);
            $position->setPositionY($i+1);
            $hero->setPosition($position);

            $heros[] = $hero;

        }
        return $heros;

    }

}