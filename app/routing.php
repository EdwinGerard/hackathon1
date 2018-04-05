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

    'Proc' => [
        ['signIn','/proc/sign_in',['GET', 'POST']],
        ['connexion','/proc/connexion',['GET', 'POST']],
    ],

];