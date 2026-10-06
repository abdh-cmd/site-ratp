<?php
	require_once ("modele/modele.class.php"); 
	class Controleur {
		//instanciation de la classe Modele 
		private $unModele ; 

		public function __construct (){
			$this->unModele= new Modele(); 
		}
		/* Section 1 : select ALL sur les tables */ 

		public function selectAllInfos (){
			$lesLignes = $this->unModele->selectAllInfos(); 
			 
			return $lesLignes; 
		}
		public function selectAllLignes (){
			$lesLignes = $this->unModele->selectAllLignes(); 
			//on peut faire des traitements ou controles sur les données 
			return $lesLignes; 
		}
		public function selectAllBus (){
			$lesBus = $this->unModele->selectAllBus();  
			return $lesBus; 
		}
		public function selectAllChauffeurs (){
			$lesChauffeurs = $this->unModele->selectAllChauffeurs();  
			return $lesChauffeurs; 
		}
		public function selectAllAffectations (){
			$lesAffectations = $this->unModele->selectAllAffectations();  
			return $lesAffectations; 
		}
		/* Section 2 : les insertions dans les tables */
		public function insertLigne ($tab){
			//on controle les données avant insertion 
			$this->unModele->insertLigne($tab); 
		}
		public function insertBus ($tab){
			//on controle les données avant insertion 
			$this->unModele->insertBus($tab); 
		}
		public function insertChauffeur ($tab){
			//on controle les données avant insertion 
			$this->unModele->insertChauffeur($tab); 
		}
		public function insertAffectation ($tab){
			//on controle les données avant insertion 
			$this->unModele->insertAffectation($tab); 
		}
		/* Section 3 : les suppressions de données */
		public function deleteLigne ($idligne){
			//on controle la presence de l'enregistrement 
			$this->unModele->deleteLigne($idligne); 
		}
		public function deleteBus ($idbus){
			//on controle la presence de l'enregistrement 
			$this->unModele->deleteBus($idbus); 
		}
		public function deleteChauffeur ($idchauffeur){
			//on controle la presence de l'enregistrement 
			$this->unModele->deleteChauffeur($idchauffeur); 
		}
		public function deleteAffectation ($idaffectation){
			//on controle la presence de l'enregistrement 
			$this->unModele->deleteAffectation($idaffectation); 
		}
		/* Section 4 : select where sur les tables */
		public function selectWhereLigne ($idligne){
			$uneLigne = $this->unModele->selectWhereLigne($idligne); 
			return $uneLigne; 
		}
		public function selectWhereBus ($idbus){
			$unBus = $this->unModele->selectWhereBus($idbus); 
			return $unBus; 
		}
		public function selectWhereChauffeur ($idchauffeur){
			$unChauffeur = $this->unModele->selectWhereChauffeur($idchauffeur); 
			return $unChauffeur; 
		}
		public function selectWhereAffectation ($idaffectation){
			$uneAffectation = $this->unModele->selectWhereAffectation($idaffectation); 
			return $uneAffectation; 
		}
		/* Section 5 : update sur les tables */
		public function updateLigne($tab){
			$this->unModele->updateLigne($tab);
		}
		public function updateBus($tab){
			$this->unModele->updateBus($tab);
		}
		public function updateChauffeur($tab){
			$this->unModele->updateChauffeur($tab);
		}
		public function updateAffectation($tab){
			$this->unModele->updateAffectation($tab);
		}
		/* Section 6 : Like filtre sur les données */
		public function selectLikeLignes ($filtre){
			$lesLignes = $this->unModele->selectLikeLignes($filtre); 
			return $lesLignes; 
		}
		public function selectLikeBus ($filtre){
			$lesBus = $this->unModele->selectLikeBus($filtre); 
			return $lesBus; 
		}
		public function selectLikeChauffeurs ($filtre){
			$lesChauffeurs = $this->unModele->selectLikeChauffeurs($filtre); 
			return $lesChauffeurs; 
		}
		public function selectLikeAffectations ($filtre){
			$lesAffectations = $this->unModele->selectLikeAffectations($filtre); 
			return $lesAffectations; 
		}

		/***** Requete de vérification de connexion ****/
		public function verifConnexion ($email, $mdp){

			//hachage du mot de passe avec la fonction md5 
			//$mdp = md5($mdp) ; 

			//hachage du mot de passe avec la fonction sha1 
			//$mdp = sha1($mdp); 

			//hachage sha1 avec salage 
			$resultat = $this->unModele->getGrainSel (); 
			$mdp = sha1($mdp . $resultat['nb']);

			$unChauffeur = $this->unModele->verifConnexion($email, $mdp); 
			return $unChauffeur; 
		}
	}
?>

















