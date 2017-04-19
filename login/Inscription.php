<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Registration</title>

        <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="style.css" />
    </head>

    <body class="container-fluid">

    	<header class="liens">

    		<a href="https://exia.cesi.fr"><img src="exia.png" alt="Site de Exia" height="30" width="34"/></a>
    		<a href="exia.cesi.fr"><img src="mail.png" alt="Mail Exia" height="30" width="35"/></a>
    		<a href="https://www.facebook.com/Exia.Cesi"><img src="facebook.png" alt="Facebook Exia" height="30" width="35"/></a> 
			<a href="https://twitter.com/exiacesi"><img src="twitter.png" alt="Twitter Exia" height="30" width="35"/></a> 
			<a href="https://www.youtube.com/playlist?list=PLox3niDoWNEP8WvaWa0yfQpetRg6I8gx8"><img src="youtube.png" 
				alt="Youtube Exia" height="30" width="35"/></a> 



    	</header>


		<section>


			<div class="row" id="titre2">
			
				<div class="col-md-4"></div>

				<h1 class="col-md-4"> Sign up !</h1>

				<div class="col-md-4"></div>

			</div>


			<div class="row" id="formulaire2">

				<div class="col-md-4"></div>

				<form class="col-md-4" method="POST" action="db3.php">

				   <fieldset>

					   <legend>Please fill out this form and submit:</legend> 

				   	  	<label for="firstname"> First Name :</label>
				   	  	<input type="text" name="firstname" id="firstname" size="40" required data-toggle="tooltip" data-placement="right" title="Tooltip on right"/>
				   		</br>

				   	  	<label for="lastname">Last Name :</label>
				   	  	<input type="text" name="lastname" id="lastname" size="40" required/>
				   	  	</br>

				   	  	<label for="email">Email addr:</label>
				   	  	<input type="email" name="email" id="email" size="40" required/>
				   	  	</br>

						<label for="pass2">Password :</label>
				   	  	<input type="password" name="pass2" id="pass2" size="40" required/>
				   	  	</br>

						<label for="pass3">Password :</label>
				   	  	<input type="password" name="pass3" id="pass3" size="40" required/>
				   	  	</br>
						</br>

				   	  	<input type="image" src="submit.png" height="35" width="90" required data-toggle="tooltip" data-placement="right" title="Tooltip on right"/>
			   	  
			   	   </fieldset>

				</form>

				<div class="col-md-4"></div>

			</div>



			<div class="row" id="note">


				<div class="col-md-2"></div>

				<p class="col-md-8"> Note 1: All fields required.			
				</br>
				Note 2: To set a profile picture, you have to create a Gravatar account with your viacesi email. 
				</br>
				<a href="https://fr.gravatar.com">https://fr.gravatar.com</a>
				</p>

				<div class="col-md-2"></div>
			


			</div>
			

			<div class="row" id="logo2">
				<div class="col-md-4"></div>

				<p class="col-md-4">
					<img src="logoexiacesi.jpg" alt="Logo Exia.Cesi" height="135" width="258"/>
		   		</p>

				<div class="col-md-4"></div>
	   		</div>

    
    	</section>

    	

		<footer>

			<div class="row">
				<div class="col-md-4"></div>


					<p class="col-md-4"> 
						<a href="Mentionslegales.html">Mentions légales</a>
						 | ©2017 - Exia.Cesi BDE
					</p>

				<div class="col-md-4"></div>

	   		</div>

		</footer>
		<?php
		header('Location: Inscription.php');
		?>

    </body>
</html>