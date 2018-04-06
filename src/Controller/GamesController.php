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
        session_start();

        $gameManager = new GameManager();
        $games = $gameManager->gameList($_SESSION['user']['id']);


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
            $data['error'] = $e->getMessage();
            echo json_encode($data);
            exit();
        }

    }

    public function myGame()
    {
        try{
            session_start();

            if(empty($_GET['id'])){
                throw new \Exception('erreur de récupération du id de la partie.');
            }


            $gameId = $_GET['id'];

            $gameManager = new GameManager();
            $gameStep = $gameManager->getGameStep($gameId);

            if(empty($gameStep)){
                $gameManager->addGameStep($gameId);
                $gameStep = $gameManager->getGameStep($gameId);
            }

            if ($gameStep['step'] == 1){ // on charge l'initialisation de la partie
                return $this->twig->render('Games/army.html.twig',['user' => $this->session()]);
            }

            if ($gameStep['step'] == 2){ // on charge la partie

                // --------- TODO -> CHOPPER TOUTES LES INFOS DE LA PARTY AVANT ----

                return $this->twig->render('Games/party.html.twig',['user' => $this->session()]);
            }

        }
        catch (\Exception $e){
           /* $data['error'] = $e->getMessage();
            echo json_encode($data);*/
           echo $e->getMessage();
            exit();
        }

    }


}