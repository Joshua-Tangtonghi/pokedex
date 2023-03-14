<header>
	<!--<img src="../images/logo.png">-->
	<div class="container">
		<img class="logo" src="images/logo.png">
		<nav>
			<ul>

				<?php 
				session_start();
				if(isset($_SESSION['email'])){
				echo '<li><a href="index.php">Accueil</a></li>';
				echo '<li><a href="collection.php">Collection</a></li>';
				echo '<li><a href="add_pokemon.php">Ajouter un Pokemon</a></li>';
				echo '<li><a href="profile.php">Mon compte</a></li>';
				echo '<li><a href="deconnexion.php">Déconnexion</a></li>';				
				}else{
				echo '<li><a href="index.php"</a>Accueil</li>';
				echo '<li><a href="collection.php"</a>Collection</li>';
				echo '<li><a href="connexion.php">Connexion</a></li>';
				}
				?>
			</ul>
		</nav>
	</div>
</header>