<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Titre</title>
    </head>

    <body>

    	<p>
    
		<?php


		echo $_POST['firstname']; 
		echo $_POST['lastname'];
		echo $_POST['email'];
		echo $_POST['pass2'];
		echo $_POST['pass3'];


		/* $bdd = new PDO('mysql:host=localhost;dbname=Projetweb','root','root');
		$bdd->query('SELECT');

		*/
		?>

		</p>


    </body>
</html>



