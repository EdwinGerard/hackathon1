<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 * PHP version 7
 */

namespace Controller;

use Model\User;
use Model\UserManager;

use Model\ProcManager;

/**
 * Class ItemController
 *
 */
class ProcController extends AbstractController
{


    /**
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function signIn()
    {


        try {

            if (isset($_POST['login'])) {

                $user = new User();
                $user->setName($_POST['login']);
                $user->checkPassword($_POST['pwd1'],$_POST['pwd2']);
                $user->setPassword($_POST['pwd1']);



                $userManager = new UserManager();
                if($userManager->checkUserExist($_POST['login'])){
                    throw new \Exception('Login déjà éxistant');
                }

                $userManager->addUser($user);

            }
            else {
                throw new \Exception('Erreur de récupération des données.');
            }
        }catch(\Exception $e){
            echo $e->getMessage();
            exit();
        }



        //return $this->twig->render('Home/signin.html.twig',['test',$post]);
    }


    public function edit(int $id)
    {
        // TODO : edit item with id $id
        return $this->twig->render('Item/edit.html.twig', ['item', $id]);
    }


    public function add()
    {
        // TODO : add a new item
        return $this->twig->render('Item/add.html.twig');
    }


    public function delete(int $id)
    {
        // TODO : delete the item with id $id
        return $this->twig->render('Item/index.html.twig');
    }
}
