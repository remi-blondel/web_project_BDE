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

if (preg_match("/.*@viacesi\.fr/", $email1) OR preg_match("/.*@cesi\.fr/", $email1))  


	{


		if ($password1 == $password2)

		{


		$req = $bdd->prepare('INSERT INTO Membres_du_site(Prénom, Nom, Email, Mot_de_Passe) VALUES(:prenom, :nom, :email, :mot_de_passe)');
		$req->execute(array(
		
		'prenom' => $firstname1,
		'nom' => $lastname1,
		'email' => $email1,
		'mot_de_passe' => $password1
		));

		echo 'Les informations que vous avez rentré sont corretes et sont enregistrées! Redirection vers la page de connexion...';


		}

		else

		{
			echo 'Les mots de passes saisis sont différents. Veuillez remplir de nouveau le formulaire. Redirection vers la page de connexion...';
		}



	}

else

	{
			echo 'L\'adresse email saisie n\'est pas valide! Redirection vers la page de connexion...';

	}



//closecursor?
		
?>