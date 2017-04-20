<?php


require_once 'database/singleton.php';
require_once 'database/config.php';


//header("Refresh: 5; url=Login.html");


$email1=$_POST['email1'];
$password1=sha1($_POST['pass']);


$req = singleton::getInstance()->prepare('SELECT pk_id_user FROM user WHERE email = :email AND pass = :pass');
$req->execute(array(
    'email' => $email1,
    'pass' => $password1));

$resultat = $req->fetch();

echo $donnees['pk_id_user'] . '<br />';






?>