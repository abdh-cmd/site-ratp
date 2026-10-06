<h2> Gestion des bus </h2>


<?php
if(isset($_SESSION['role']) && $_SESSION['role']=="admin"){
	$leBus = null; 
	if (isset($_GET['action']) && isset($_GET['idbus']))
	{
		$action = $_GET['action']; 
		$idbus = $_GET['idbus']; 
		switch ($action){
			case "sup" : $unControleur->deleteBus($idbus) ; break; 
			case "edit" : 
			$leBus = $unControleur->selectWhereBus($idbus); 
			
			break;
		}
	}

	require_once ("vue/vue_insert_bus.php");
	if (isset($_POST['Valider'])){
		//insertion du bus  dans la table Bus 
		$unControleur->insertBus($_POST);
		echo "<br> Insertion réussie du Bus.";
	}

	if (isset($_POST['Modifier']))
	{
		$unControleur->updateBus ($_POST);
		//recharger la page 
		header(("Location: index.php?page=3"));
	}
	
} //fin de la session admin 




	if(isset($_POST['Filtrer'])){
		$filtre = $_POST['filtre']; 
		$lesBus = $unControleur->selectLikeBus($filtre);
	}else{
		$lesBus = $unControleur->selectAllBus (); 
	}
	
	require_once ("vue/vue_select_bus.php");
?>