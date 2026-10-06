<h2> Gestion des affectations </h2>


<?php
	if(isset($_SESSION['role']) && $_SESSION['role']=="admin"){
	$lAffectation = null; 
	if (isset($_GET['action']) && isset($_GET['idaffectation']))
	{
		$action = $_GET['action']; 
		$idaffectation = $_GET['idaffectation']; 
		switch ($action){
			case "sup" : $unControleur->deleteAffectation($idaffectation) ; break; 
			case "edit" : 
			$lAffectation = $unControleur->selectWhereAffectation($idaffectation); 
			
			break;
		}
	}

	require_once ("vue/vue_insert_affectation.php");
	if (isset($_POST['Valider'])){
		//insertion du Affectation  dans la table Affectation 
		$unControleur->insertAffectation($_POST);
		echo "<br> Insertion réussie de l'Affectation.";
	}

	if (isset($_POST['Modifier']))
	{
		$unControleur->updateAffectation ($_POST);
		//recharger la page 
		header(("Location: index.php?page=5"));
	}
	
} //fin de la session admin 


//extraction des Affectations 
	if(isset($_POST['Filtrer'])){
		$filtre = $_POST['filtre']; 
		$lesAffectations = $unControleur->selectLikeAffectations($filtre);
	} else {
		$lesAffectations = $unControleur->selectAllAffectations (); 
	}

	require_once ("vue/vue_select_affectations.php");
?>