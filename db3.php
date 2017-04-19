<?php

require_once 'database/singleton.php';
require_once 'database/config.php';

header("Refresh: 3; url=Login.html");


$firstname1=$_POST['firstname'];
$lastname1=$_POST['lastname'];
$email1=$_POST['email'];
$password1=sha1($_POST['pass2']);
$password2=sha1($_POST['pass3']);


if (preg_match("/.*@viacesi\.fr/", $email1)) 

{

$role="none";

}



elseif(preg_match("/.*@cesi\.fr/", $email1))  

{

$role="staff";

}

else


{

	$role= NULL;
}





if (preg_match("/.*@viacesi\.fr/", $email1) OR preg_match("/.*@cesi\.fr/", $email1))  


	{


		if ($password1 == $password2)

		{

		$req = singleton::getInstance()->prepare('INSERT INTO user(firstname, lastname, pass, email, role) VALUES(:prenom, :nom, :mot_de_passe, :email, :role)');
		
		$req->execute(array(
		
		'prenom' => $firstname1,
		'nom' => $lastname1,
		'mot_de_passe' => $password1,
		'email' => $email1,
		'role' => $role
		
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