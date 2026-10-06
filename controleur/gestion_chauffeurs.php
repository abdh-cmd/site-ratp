<h2> Gestion des chauffeurs </h2>

<?php
	if(isset($_SESSION['role']) && $_SESSION['role']=="admin"){
	$leChauffeur = null; 
	if (isset($_GET['action']) && isset($_GET['idchauffeur']))
	{
		$action = $_GET['action']; 
		$idchauffeur = $_GET['idchauffeur']; 
		switch ($action){
			case "sup" : $unControleur->deleteChauffeur($idchauffeur) ; break; 
			case "edit" : 
			$leChauffeur = $unControleur->selectWhereChauffeur($idchauffeur); 
			
			break;
		}
	}

	require_once ("vue/vue_insert_chauffeur.php");
	if (isset($_POST['Valider'])){
		//insertion du Chauffeur  dans la table Chauffeur 
		$unControleur->insertChauffeur($_POST);
		echo "<br> Insertion réussie du Chauffeur.";
	}

	if (isset($_POST['Modifier']))
	{
		$unControleur->updateChauffeur ($_POST);
		//recharger la page 
		header(("Location: index.php?page=4"));
	}
	
} //fin de la session admin 




	//extraction des lignes 
	if(isset($_POST['Filtrer'])){
		$filtre = $_POST['filtre']; 
		$lesChauffeurs = $unControleur->selectLikeChauffeurs($filtre);
	} else {
		$lesChauffeurs = $unControleur->selectAllChauffeurs (); 
	}
	require_once ("vue/vue_select_chauffeurs.php");
?>