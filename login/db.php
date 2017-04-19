<?php

$bdd = new PDO('mysql:host=localhost;dbname=Projetweb','root','root');

$reponse= $bdd->query('SELECT * FROM Membres_du_site');
while($donnees=$reponse->fetch())

{

	echo '<p>' . $donnees['Email'] . '</p>';

}

		
?>