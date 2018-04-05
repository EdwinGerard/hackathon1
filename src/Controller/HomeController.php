<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace Controller;

use Model\Home;
use Model\HomeManager;

/**
 * Class ItemController
 *
 */
class HomeController extends AbstractController
{

    /**
     * Display item listing
     *
     * @return string
     */
    public function index()
    {
        session_start();
        $user=null;
        if (isset($_SESSION['user'])){
            $user = $_SESSION['user'];
        }

       /* return $this->twig->render('Item/index.html.twig', ['items' => $items]);*/
        return $this->twig->render('Home/index.html.twig',['user' => $user]);
    }

    public function signIn()
    {
        return $this->twig->render('Home/signin.html.twig');
    }

    /**
     * Display item informations specified by $id
     *
     * @param  int $id
     *
     * @return string
     */
    public function show(int $id)
    {
        $itemManager = new ItemManager();
        $item = $itemManager->selectOneById($id);

        return $this->twig->render('Item/show.html.twig', ['item' => $item]);
    }

    /**
     * Display item edition page specified by $id
     *
     * @param  int $id
     *
     * @return string
     */
    public function edit(int $id)
    {
        // TODO : edit item with id $id
        return $this->twig->render('Item/edit.html.twig', ['item', $id]);
    }

    /**
     * Display item creation page
     *
     * @return string
     */
    public function add()
    {
        // TODO : add a new item
        return $this->twig->render('Item/add.html.twig');
    }

    /**
     * Display item delete page
     *
     * @param  int $id
     *
     * @return string
     */
    public function delete(int $id)
    {
        // TODO : delete the item with id $id
        return $this->twig->render('Item/index.html.twig');
    }
}
