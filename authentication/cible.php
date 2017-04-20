<?php

require_once '../database/singleton.php';
require_once '../database/config.php';


$email3=$_POST['email1'];
$password3=sha1($_POST['pass']);


$req = singleton::getInstance()->prepare('SELECT pk_id_user, role FROM user WHERE email = :email AND pass = :pass');
$req->execute(array(
    'email' => $email3,
    'pass' => $password3));

$resultat = $req->fetch();



if (!$resultat)
{

echo 'Mauvais identifiant ou mot de passe, redirection vers la page de login !';
    header("Refresh: 2; url=login.html");
}

else

{
    $_SESSION['user_id'] = $resultat['pk_id_user'];
    $_SESSION['role'] = $resultat['role'];
    header("location: ../home.php");
    echo 'Connexion en cours, redirection vers la page d\'accueil !';
}

//closecursor?

?>