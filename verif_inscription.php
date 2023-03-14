<?php
if(isset($_POST['email']) && !empty($_POST['email'])){
	setcookie('email', $_POST['email'], time() + (24 * 60 * 60));
}
if(!isset($_POST['email']) || empty($_POST['email']) || !isset($_POST['password']) || empty($_POST['password'])){
	header('location:connexion.php?message=Vous devez remplir les 2 champs.');
	exit;
}

if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	header('location:connexion.php?message=Email invalide.');
	exit;
}

include('includes/config.php');

$q = 'SELECT email FROM user WHERE email =?';
$req = $bdd->prepare($q);
$req->execute([$_POST['email']]);

$result = $req->fetch();

if($result !== false){
	header('location:connexion.php?message=Email déjà utilisé.');
	exit;
}

$q = 'SELECT pseudo FROM user WHERE pseudo =?';
$req = $bdd->prepare($q);
$req->execute([$_POST['pseudo']]);

$result = $req->fetch();

if($result !== false){
	header('location:connexion.php?message=Pseudo déjà utilisé.');
	exit;
}


$pass_hache = $_POST['password'];

if(strlen($_POST['password']) < 8 || preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', ($pass_hache))){
	header('location:connexion.php?message=Mot de passe contient plus 8 caractères,une majuscule,une minuscule,un chiffre.');
	exit;
}

/*if(strlen($_POST['password']) < 8 || (strlen($_POST['password']) >12)){}*/

if(isset($_FILES['image']) && !empty($_FILES['image']['name'])){

	$acceptable =[
		'image/jpeg',
		'image/png',
		'image/gif'
	];
}


if(!in_array($_FILES['image']['type'], $acceptable)){
	header('location:connexion.php?message=LE fichier n\'est pas du bon type');
	exit;
}

$path= 'uploads';
if(!file_exists($path)){
	mkdir($path, 0777);
}

$filename = $_FILES['image']['name'];

$array = explode('.', $filename);

$extension = end($array);
$filename = 'image-' . time() . '.' . $extension;

$destination = $path . '/' . $filename;

move_uploaded_file($_FILES['image']['tmp_name'], $destination);


$q = 'INSERT INTO user(email, pseudo, password, image) VALUES (:email, :pseudo, :password, :image)';
$req = $bdd->prepare($q);

$reponse = $req->execute([
	'email' => $_POST['email'],
	'pseudo' =>$_POST['pseudo'],
	'password' => hash('sha256', $_POST['password']),
	'image' => isset($filename)? $filename : ''
]); 

if($reponse){
	session_start();
	$_SESSION['email'] = $_POST['email'];
	header('location:index.php?message=Compte créé avec succès.');
	exit;
}else{
	header('location:connexion.php?message=Erreur lors de la création du compte.');
}

?>