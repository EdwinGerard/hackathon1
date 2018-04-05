<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 05/04/18
 * Time: 19:51
 */

namespace Controller;


class GamesController extends AbstractController
{

    /**
     * Display item listing
     *
     * @return string
     */
    public function games()
    {
        /* $itemManager = new ItemManager();
         $items = $itemManager->selectAll();*/

        /* return $this->twig->render('Item/index.html.twig', ['items' => $items]);*/
        return $this->twig->render('Games/games.html.twig');
    }
}