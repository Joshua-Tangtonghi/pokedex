<?php
if(!isset($_POST['nom']) || empty($_POST['nom']) || !isset($_POST['pv']) || empty($_POST['pv']) || !isset($_POST['attaque']) || empty($_POST['attaque']) || !isset($_POST['defense']) || empty($_POST['defense']) || !isset($_POST['vitesse']) || empty($_POST['vitesse']) || !isset($_FILES['image']) || empty($_FILES['image'])){
	header('location:add_pokemon.php?message=Vous devez remplir tous les champs.');
	exit;
}




if(isset($_FILES['image']) && !empty($_FILES['image']['name'])){

	$pokemon =[
		'image/jpeg',
		'image/png',
		'image/gif'
	];
}
if(!in_array($_FILES['image']['type'], $pokemon)){
	header('location:add_pokemon.php?message=Le fichier n\'est pas du bon type');
	exit;
}

$path= 'img_pokemon';
if(!file_exists($path)){
	mkdir($path, 0777);
}

$filename = $_FILES['image']['name'];

$array = explode('.', $filename);

$extension = end($array);
$filename = 'pokemon-' . time() . '.' . $extension;

$destination = $path . '/' . $filename;

move_uploaded_file($_FILES['image']['tmp_name'], $destination);




include('includes/config.php');


			$q = 'SELECT nom FROM pokemon WHERE nom =?';
			$req = $bdd->prepare($q);
			$req->execute([$_POST['nom']]);

			$result = $req->fetch();

			if($result !== false){
			header('location:add_pokemon.php?message=Pokemon déjà créé.');
			exit;
			}

session_start();
$q = 'SELECT id FROM user WHERE email = :email';
            $req = $bdd->prepare($q);
            $req->execute([	
                'email' => $_SESSION['email']
            ]);
            $user = $req->fetch(PDO::FETCH_ASSOC);
            $user = $user['id'];

            $q = 'INSERT INTO pokemon(nom, pv, attaque, defense, vitesse, image, id_user)
			VALUES (:nom, :pv, :attaque, :defense, :vitesse, :image, :id_user)';
			$req = $bdd->prepare($q);

			$reponse = $req->execute([
			'nom'=> $_POST['nom'],
			'pv'=> $_POST['pv'],
			'attaque' => $_POST['attaque'],
			'defense' => $_POST['defense'],
			'vitesse'=> $_POST['vitesse']	,
			'image'=> isset($filename)? $filename : '',
			'id_user'=> $user
		]);

if($reponse){
	header('location:index.php?message=Pokemon créé avec succès.');
	exit;
}else{
	header('location:add_pokemon.php?message=Erreur lors de la création du Pokemon.');
}


?>