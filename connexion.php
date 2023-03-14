<!DOCTYPE html>
<!--RAMOUL MOHAMED AMINE-->
<html>

<head>
	<meta charset="utf-8">
	<title>connexion</title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>
<body>
<?php include('includes/header.php');?>
	

	<h3 style="padding-top:70px;padding-bottom: 70px; text-align: center;">CONNEXION</h3>
	<main>

<?php
			
			if(isset($_GET['message']) && !empty($_GET['message'])){
				echo '<p>' . htmlspecialchars($_GET['message']) . '</p>';
			}
			?>
	
		 
	<div class="formConn">
		<div class="A">
			<form action="verif_connexion.php" method="POST">
                
                <label><b>Je possède un compte</b></label>
                <input type="text" placeholder="Entrer l'email" name="email" required>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>
                <input type="submit" id='submit' value='LOGIN' >
            </form>
		</div>
		<div class="B">
			<label><b>Je crée un compte</b></label>
	 		 <form method="post" action="verif_inscription.php" enctype="multipart/form-data">
				<input type="email" name="email" placeholder="Votre email" value="<?php echo isset($_COOKIE['email']) ? $_COOKIE['email'] : ''; ?>">
				<input type="text" name="pseudo" placeholder="pseudo">
				<input type="password" name="password" placeholder="Votre mot de passe">
				<div style="display:inline-flex;">
				<h6>Image de profil :</h6>
				<input type="file" name="image" accept="image/gif, image/png, image/jpeg">
				</div>
				<input type="submit" value="S'inscrire">
			</form>
        </div>
    </div>
</main>



</body>	
<div class="footerConn">
<?php include('includes/footer.php');?>
</div>
</html>

