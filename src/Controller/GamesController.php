<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 05/04/18
 * Time: 19:51
 */

namespace Controller;

use Model\Game;
use Model\GameManager;

class GamesController extends AbstractController
{

    /**
     * Display item listing
     *
     * @return string
     */
    public function games()
    {
        $gameManager = new GameManager();
        $games = $gameManager->gameList();


        /* return $this->twig->render('Item/index.html.twig', ['items' => $items]);*/
        return $this->twig->render('Games/games.html.twig',['games' => $games ,'user' => $this->session()]);
    }

    public function joinGame()
    {
        try{
            session_start();
            if(empty($_POST['gameId'])){
                throw new \Exception('erreur de récupération du id de la partie.');
            }

            $player2 = $_SESSION['user']['id'];
            $gameId = $_POST['gameId'];
            $gameManager = new GameManager();
            $gameManager-> addPlayerAtGame($gameId,$player2);
        }
        catch (\Exception $e){
            echo $e->getMessage();
            exit();
        }
    }


}