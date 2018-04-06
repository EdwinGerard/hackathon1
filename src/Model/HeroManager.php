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

}