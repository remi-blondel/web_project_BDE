<?php


require_once 'database/singleton.php';
require_once 'database/config.php';


//header("Refresh: 5; url=Login.html");


$email3=$_POST['email1'];
$password3=sha1($_POST['pass']);


$req = singleton::getInstance()->prepare('SELECT pk_id_user FROM user WHERE email = :email AND pass = :pass');
$req->execute(array(
    'email' => $email3,
    'pass' => $password3));

$resultat = $req->fetch();

echo $resultat['pk_id_user'] . '<br />';

if (!$resultat)
{

echo 'Mauvais identifiant ou mot de passe !';

}

else

{	

session_start();
    $_SESSION['pk_id_user'] = $resultat['pk_id_user'];
    $_SESSION['email1'] = $email3;
    echo 'Vous êtes connecté !';

}

?>