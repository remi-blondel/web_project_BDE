<?php

$bdd = new PDO('mysql:host=localhost;dbname=Projetweb','root','root');

$firstname1=$_POST['firstname'];
$lastname1=$_POST['lastname'];
$email1=$_POST['email'];
$password1=$_POST['pass2'];


$bdd->exec("INSERT INTO Membres_du_site(Id, Prénom, Nom, Email, Mot_de_Passe) VALUES( NULL, '$firstname1', '$lastname1', '$email1', '$password1');");

echo 'Les informations que vous avez rentré sont corretes!';
		
?>