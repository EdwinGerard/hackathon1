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
use Model\HeroManager;

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
                /*$tab = [
                    0 => ['heroId' => 0, 'posId' => 5],
                    1 => ['heroId' => 1, 'posId' => 8],
                    2 => ['heroId' => 2, 'posId' => 12],
                    3 => ['heroId' => 3, 'posId' => 15],

                ];*/
                $heroManager = new HeroManager();
                $positionHeros = $heroManager->getPositionHeros($gameId);
                $heroId = $heroManager->getHeroIdFromApi();
                if (empty($positionHeros)){
                    $heroManager->addPositionHero($gameId, $heroId);
                    $positionHeros = $heroManager->getPositionHeros($gameId);
                }


                return $this->twig->render('Games/party.html.twig',['user' => $this->session(), 'tab'=> $positionHeros]);
            }

        }
        catch (\Exception $e){
           /* $data['error'] = $e->getMessage();
            echo json_encode($data);*/
           echo $e->getMessage();
            exit();
        }

    }
    public function addGame()
    {
        try{
            session_start();
            if(empty($_POST['gameName'])){
                throw new \Exception('erreur de récupération du nom de la partie.');
            }
            $gameName = $_POST['gameName'];
            $player1 = $_SESSION['user']['id'];
            $gameManager = new GameManager();
            $gameManager-> addGame($gameName,$player1);
        }
        catch (\Exception $e){
            echo $e->getMessage();
            exit();
        }
        header('Location: /games');
        exit;;
    }
}