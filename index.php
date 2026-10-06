<?php
	session_start(); 
	require_once("controleur/controleur.class.php");
	//instanciation de la classe Controleur 
	$unControleur = new Controleur (); 
?>

<!DOCTYPE html>
<html>
<head>
	<title> Site RATP </title>
</head>
<body>
<center>
	<?php
	if( ! isset($_SESSION['email'])){
		require_once("vue/vue_connexion.php");
	}

	if(isset($_POST['SeConnecter'])){
		$email = $_POST['email']; 
		$mdp = $_POST['mdp'] ; 
		//on récupère le chauffeur dans la base 
		$unChauffeur = $unControleur->verifConnexion($email,$mdp); 
		//var_dump($unChauffeur);
		if($unChauffeur!= null){
			//creation d'une session
			$_SESSION['email'] = $unChauffeur['email']; 
			$_SESSION['nom'] = $unChauffeur['nom']; 
			$_SESSION['prenom'] = $unChauffeur['prenom'];
			$_SESSION['role'] = $unChauffeur['role'];
			header("Location: index.php?page=1");  
		}else {
			echo "<br> Veuillez vérifier vos identifiants.";
		}
	}
	if (isset($_SESSION['email'])){
	echo '
	<h1> Gestion des affectations de Bus à la RATP </h1>
	<a href="index.php?page=1">
		<img src="images/logo.jpeg" height="100" width="100"> </a>
	<a href="index.php?page=2">
		<img src="images/ligne.png" height="100" width="100"> </a>
	<a href="index.php?page=3">
		<img src="images/bus.png" height="100" width="100"> </a>
	<a href="index.php?page=4">
		<img src="images/chauffeur.png" height="100" width="100"> </a>
	<a href="index.php?page=5">
		<img src="images/affectation.png" height="100" width="100"> </a>
	<a href="index.php?page=6">
		<img src="images/deconnexion.png" height="100" width="100"> </a> ';
	
	if (isset($_GET['page'])){
		$page = $_GET['page'];
	}else {
		$page = 1; 
	}
	switch ($page){
		case 1 : require_once ("controleur/home.php"); break;
		case 2 : require_once ("controleur/gestion_lignes.php"); break;
		case 3 : require_once ("controleur/gestion_bus.php"); break;
		case 4 : require_once ("controleur/gestion_chauffeurs.php"); break;
		case 5 : require_once ("controleur/gestion_affectations.php"); break;
		case 6 : session_destroy(); 
				 unset($_SESSION['email']); 
				 header("Location: index.php");  
				 break;
	}
	} //fin du if verifier session
	?>
</center>
</body>
</html>















