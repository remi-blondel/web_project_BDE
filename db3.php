<?php

require_once 'database/singleton.php';
require_once 'database/config.php';

header("Refresh: 5; url=Login.html");


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


/*

if(isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0)

{


   $infosfichier = pathinfo($_FILES['monfichier']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'png');

                if (in_array($extension_upload, $extensions_autorisees))

                {
                
                    move_uploaded_file($_FILES['monfichier']['tmp_name'], 'Avatarpics/' . basename($_FILES['monfichier']['name']));
                    echo "L'envoi a bien été effectué !";

                }

                else


                {

                	echo "L'extention du fichier n'est pas valide. Merci d'uploader un fichier .jpg .jpef ou .png";

                }



}



else


{

	echo 'Une erreur s\'est produite. Veuillez reupload l\'image';

}


*/



if (preg_match("/.*@viacesi\.fr/", $email1) OR preg_match("/.*@cesi\.fr/", $email1))  


	{


		if ($password1 == $password2)

		{


			if(isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0)

			{


			   $infosfichier = pathinfo($_FILES['monfichier']['name']);
			                $extension_upload = $infosfichier['extension'];
			                $extensions_autorisees = array('jpg', 'jpeg', 'png');


			                if (in_array($extension_upload, $extensions_autorisees))

			                {


			                	$reponse = singleton::getInstance()->query('SELECT pk_id_user FROM user ORDER BY pk_id_user DESC LIMIT 1');

								while ($donnees = $reponse->fetch())
								{
									echo $donnees['pk_id_user'] . '<br />';
									$nextid=$donnees['pk_id_user']+1;
									echo $nextid;
								}

								$reponse->closeCursor();
			                	

			                	$newname='user_'. $nextid . '.' . $extension_upload;

			                    move_uploaded_file($_FILES['monfichier']['tmp_name'], 'Avatarpics/' . $newname);
			                    

			                    $req = singleton::getInstance()->prepare('INSERT INTO user(firstname, lastname, pass, email, role, user_img) VALUES(:prenom, :nom, :mot_de_passe, :email, :role, :imagename)');
		
								$req->execute(array(
								
								'prenom' => $firstname1,
								'nom' => $lastname1,
								'mot_de_passe' => $password1,
								'email' => $email1,
								'role' => $role,
								'imagename' => $newname
								
								));

								echo 'Les informations que vous avez rentré sont corretes et sont enregistrées! Redirection vers la page de connexion...';




			                }

			                else


			                {

			                	echo "L'extention du fichier n'est pas valide. Merci d'uploader un fichier .jpg .jpeg ou .png. Redirection vers la page de connexion...";

			                }



			}



			else


			{

				echo 'Une erreur s\'est produite. Veuillez reupload l\'image. Redirection vers la page de connexion...';

			}





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