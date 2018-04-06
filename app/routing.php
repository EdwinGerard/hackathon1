<?php
/**
 * This file hold all routes definitions.
 *
 * PHP version 7
 *
 * @author   WCS <contact@wildcodeschool.fr>
 *
 * @link     https://github.com/WildCodeSchool/simple-mvc
 */

$routes = [
    /*'Item' => [ // Controller
         ['index', '/', 'GET'], // action, url, method
         ['add', '/item/add', 'GET'], // action, url, method
         ['edit', '/item/edit/{id:\d+}', 'GET'], // action, url, method
         ['show', '/item/{id:\d+}', 'GET'], // action, url, method
     ],*/
    'Home' => [
        ['index', '/', 'GET'], // action, url, method
        ['signIn','/sign_in','GET'],
    ],

    'Games' => [
        ['games', '/games',['GET', 'POST']], // action, url, method
        ['joinGame','/proc/join_game',['GET', 'POST']],
        ['addGame','/proc/addGame',['GET', 'POST']],
        ['myGame','/myGame',['GET', 'POST']],
    ],

    'Army' => [
        ['army', '/army',['GET', 'POST']], // action, url, method
    ],

    'Proc' => [
        ['signIn','/proc/sign_in',['GET', 'POST']],
        ['connexion','/proc/connexion',['GET', 'POST']],
        ['deconnect','/proc/deconnect',['GET', 'POST']],
    ],

];