<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8">
      <title></title>
      <link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>
<body>

      <?php include('includes/header.php');?>

            <main>
                  <h1 style="text-align: center;padding-top: 2%">TOUS LES POKEMONS</h1>    
                  
                  <div class="collec">
                  <?php
                  include('includes/config.php');


                  $q = 'SELECT id,nom,pv,attaque,defense,vitesse,image FROM pokemon';
                              $req = $bdd->prepare($q);
                              $req->execute([
                              ]);
                              $pokemon = $req->fetchAll(PDO::FETCH_ASSOC);
                              foreach ($pokemon as $row) {
                              echo '<p style="font-weight:bold;">Nom : ' . $row['nom'] . '</p>';
                              echo '<p>PV : ' . $row['pv'] . '</p>';
                              echo '<p>Attaque : ' . $row['attaque'] . '</p>';
                              echo '<p>Defense : ' . $row['defense'] . '</p>';
                              echo '<p>Vitesse : ' . $row['vitesse'] . '</p>';
                              echo '<img src="img_pokemon/'. $row['image'] . '" alt="Image du Pokemon" <br> ';
                              }
                  ?>
                 </div>
            </main>
       <div class="footerColl">
            <?php include('includes/footer.php');?>
      </div>
      </body>
</html>
