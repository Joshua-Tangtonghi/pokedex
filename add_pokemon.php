<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
	<meta name="add pokemon" description="add pokemon">
	<title>Add pokemon</title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>



<body>
<?php include('includes/header.php');?>
<main>
		
	<?php if(isset($_GET['message']) && !empty($_GET['message'])){
				echo '<p>' . htmlspecialchars($_GET['message']) . '</p>';
			}
			?>
    	<h3 style="padding-top:7.2%;padding-bottom: 6%;">AJOUTER UN POKEMON</h3>
<div class="form">
		<div class="C">
    	<form method="post" action="verif_pokemon.php" enctype="multipart/form-data">
				
				<input type="text" name="nom" placeholder="Nom">
				<input type="text" name="pv" placeholder="PV">
				<input type="text" name="attaque" placeholder="Attaque">
				<input type="text" name="defense" placeholder="Defense">
				<input type="text" name="vitesse" placeholder="Vitesse">
				<div class="fich">
				<h6>Image :</h6>				
				<input type="file" name="image" accept="image/gif, image/png, image/jpeg">
			    </div>
				<input type="submit" value="Ajouter">
			</form>
		</div>
</div>

</main>
<div  class="footerAdd">
<?php include('includes/footer.php');?>
</div>


</body>	



