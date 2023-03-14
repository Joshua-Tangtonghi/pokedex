<?php 

if(isset($_POST['email']) && !empty($_POST['email'])){
    setcookie('email', $_POST['email'], time() + (24 * 60 * 60));
}
if(!isset($_POST['email']) || empty($_POST['email']) || !isset($_POST['password']) || empty($_POST['password'])){
    header('location:connexion.php?message=Vous devez remplir les 2 champs.');
    exit;
};
if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    header('location:connexion.php?message=Email invalide.');
    exit;
};


include('includes/config.php');


$q ='SELECT id FROM user WHERE email = :email AND password = :password';
$req = $bdd->prepare($q);
$req->execute([
'email' => $_POST['email'],
'password' => hash('sha256',$_POST['password'])
]);

$reponse = $req->fetch();


if ($reponse === false){
    header('location:connexion.php?message=Identifiants incorrects.');
    exit;
}else{
    session_start();
    
 $_SESSION['email'] = $_POST['email'];
    header('location:index.php');
    exit;
}?>