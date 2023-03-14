<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="Index" content="Page d'accueil">
    <title>POKEDEX</title>
    <meta name="viewport" content="width=device-width, initial-scale=2.0">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">

 

</head>
<body>
    <?php include('includes/header.php')?>

 

    <main>	<?php if(isset($_GET['message'])){
    				echo '<p>' . $_GET['message'] . '</p>';
    		} ?>
            <img style="width: 50%; " class="pikachu" src="images/pikachu.png">
            <h1 class="indexH1">BIENVENUE SUR LE POKEDEX DE L'ESGI !</h1>
 
    

 
    
    
</main>
<div class="footerIndex">
<?php include('includes/footer.php')?>
 </div>

</body>
</html>