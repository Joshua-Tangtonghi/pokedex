 <!DOCTYPE html>
<html>
<head>
    <title>Profil</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>
<body>
    <?php include('includes/header.php');?>

    <main>
        <div class="collec">
        <?php
                if(isset($_GET['message']) && !empty($_GET['message'])){
                    echo '<p>' . htmlspecialchars($_GET['message']) . '</p>';
                }
                ?>
            <h1>Mes infos :</h1>
        <?php
                    if(isset($_SESSION['email'])){
                        include('includes/config.php');
            $q = 'SELECT email, image, pseudo FROM user WHERE email = :email';
            $req = $bdd->prepare($q);
            $req->execute([
                'email' => $_SESSION['email']
            ]);
            $user = $req->fetch(PDO::FETCH_ASSOC);
            echo '<p>Email : ' . $user['email'] . '</p>';
            echo '<p>Pseudo : ' . $user['pseudo'] . '</p>';
            echo '<img src="uploads/'. $user['image'] . '" alt="Image de Profil" ';
            ?>
        </div>
            <div class="collec">
            <?php
            $q = 'SELECT * FROM pokemon WHERE id_user = (SELECT id FROM user WHERE email = :email)';
            $req = $bdd->prepare($q);
            $req->execute([
                'email' => $_SESSION['email']
            ]);
            

            $pokemon = $req->fetchAll(PDO::FETCH_ASSOC);
                
            foreach ($pokemon as $row) {
                echo '<p style="font-weight:bold;">Nom : ' . $row['nom'] . '</p>';
                echo '<p>PV : ' . $row['pv'] . '</p>';
                echo '<p>Attaque : ' . $row['attaque'] . '</p>';
                echo '<p>Defense : ' . $row['defense'] . '</p>';
                echo '<p>Vitesse : ' . $row['vitesse'] . '</p>';    
                echo '<img src="img_pokemon/'. $row['image'] . '" alt="Image du Pokemon" ';
                }
                
                
            }else{
                 echo '<p>Utilisateur introuvable</p>';
            }
            ?>
            </div>
    </main>


    <div class="footerProfile">
<?php include('includes/footer.php') ?>
    </div>


</body>

</html>