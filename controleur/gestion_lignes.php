<h2> Gestion des lignes </h2>

<?php
if(isset($_SESSION['role']) && $_SESSION['role']=="admin"){
	$laLigne = null; 
	if (isset($_GET['action']) && isset($_GET['idligne']))
	{
		$action = $_GET['action']; 
		$idligne = $_GET['idligne']; 
		switch ($action){
			case "sup" : $unControleur->deleteLigne ($idligne) ; break; 
			case "edit" : 
			$laLigne = $unControleur->selectWhereLigne($idligne); 
			
			break;
		}
	}

	require_once ("vue/vue_insert_ligne.php");
	if (isset($_POST['Valider'])){
		//insertion de la ligne dans la table ligne 
		$unControleur->insertLigne ($_POST);
		echo "<br> Insertion réussie de la ligne.";
	}

	if (isset($_POST['Modifier']))
	{
		$unControleur->updateLigne ($_POST);
		//recharger la page 
		header(("Location: index.php?page=2"));
	}
	
} //fin de la session admin 

	//extraction des lignes 
	if(isset($_POST['Filtrer'])){
		$filtre = $_POST['filtre']; 
		$lesLignes = $unControleur->selectLikeLignes($filtre);
	} else {
		$lesLignes = $unControleur->selectAllLignes (); 
	}
	require_once ("vue/vue_select_lignes.php");

?>










