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

            if (isset($_POST['login']) && isset($_POST['pwd1']) && isset($_POST['pwd2'])) {

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
            $data['error'] = $e->getMessage();
            echo json_encode($data);
            exit();
        }

        $data['success']='Inscription réalisé avec succes.';
        echo json_encode($data);



        //return $this->twig->render('Home/signin.html.twig',['test',$post]);
    }

    public function connexion(){
        try
        {
            //var_dump($_POST);
            if (isset($_POST['login']) && isset($_POST['pwd'])) {
                $userManager = new userManager();
                $user = $userManager->checkConnexion($_POST['login'],$_POST['pwd']);
                if($user->nb == 0){
                    throw new \Exception('Erreur de login ou de mot de passe');
                }
                print_r($user);
            }
        }
        catch(\Exception $e)
        {
           echo $e->getMessage();
           exit();
        }
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
