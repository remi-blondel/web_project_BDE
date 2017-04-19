<?php

try
{

	$bdd = new PDO('mysql:host=localhost;dbname=Projetweb','root','root');

}


catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}


header("Refresh: 3; url=Login.html");


$firstname1=$_POST['firstname'];
$lastname1=$_POST['lastname'];
$email1=$_POST['email'];
$password1=$_POST['pass2'];
$password2=$_POST['pass3'];

if ($password1 == $password2) {

	echo 'Les informations que vous avez rentré sont corretes et sont enregistrés! Redirection vers la page de connexion';




$req = $bdd->prepare('INSERT INTO Membres_du_site(Prénom, Nom, Email, Mot_de_Passe) VALUES(:prenom, :nom, :email, :mot_de_passe)');
$req->execute(array(
	
	'prenom' => $firstname1,
	'nom' => $lastname1,
	'email' => $email1,
	'mot_de_passe' => $password1
	));



}

else

{

	echo 'les mots de passes sont différents. Veuillez remplir de nouveau le formulaire. Redirection vers la page de connexion';
}


//closecursor?
		
?>