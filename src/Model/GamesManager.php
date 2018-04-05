<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 05/04/18
 * Time: 21:48
 */

$pdo = new PDO(DSN, USER, PASS, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

$gameName = "";

/*simple validation*/


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gameName= test_input($_POST["gameName"]);
}

$query = 'INSERT INTO game (name) VALUE (:gameName)';
$prep = $pdo->prepare($query);
$prep->bindvalue( ':gameName', $gameName, PDO::PARAM_STR);
//$prep->execute();
