<?php
	class Modele {
		/*
		class PDO : PHP DATA OBJECT, une classe qui dispose de méthodes pour extraire et injecter des données d'une façon sécurisée dans une base de données. 
		*/
		private $unPdo ; //la connexion à la bdd 
		public function __construct (){
			try{
				//instanciation de la connexion PDO
				$url = "mysql:host=localhost:8889;dbname=ratp_284"; 
				$user = "okacha";
				$mdp = "okacha";
				$this->unPdo=new PDO ($url, $user, $mdp); 
			}
			catch(PDOException $exp){
				echo "<br> Erreur de connexion à : ".$url;
				echo $exp->getMessage (); 
			}
		}
		/* section 1 : les requetes de selection sur les tables */
		public function selectAllInfos (){
			//requete sur la vue : view 
			$requete ="select * from liste_bus_lignes ;";
			//preparation de la requete 
			$select = $this->unPdo->prepare ($requete); 
			//execution de la requete 
			$select->execute (); 
			//extraction des données 
			$lesLignes = $select->fetchAll(); 
			return $lesLignes; 
		}
		public function selectAllLignes (){
			$requete ="select * from ligne ;";
			//preparation de la requete 
			$select = $this->unPdo->prepare ($requete); 
			//execution de la requete 
			$select->execute (); 
			//extraction des données 
			$lesLignes = $select->fetchAll(); 
			return $lesLignes; 
		}
		public function selectAllBus (){
			$requete ="select * from bus ;";
			//preparation de la requete 
			$select = $this->unPdo->prepare ($requete); 
			//execution de la requete 
			$select->execute (); 
			//extraction des données 
			$lesBus = $select->fetchAll(); 
			return $lesBus; 
		}
		public function selectAllChauffeurs (){
			$requete ="select * from chauffeur ;";
			//preparation de la requete 
			$select = $this->unPdo->prepare ($requete); 
			//execution de la requete 
			$select->execute (); 
			//extraction des données 
			$lesChauffeurs = $select->fetchAll(); 
			return $lesChauffeurs; 
		}
		public function selectAllAffectations (){
			$requete ="select * from affectation ;";
			//preparation de la requete 
			$select = $this->unPdo->prepare ($requete); 
			//execution de la requete 
			$select->execute (); 
			//extraction des données 
			$lesAffectations = $select->fetchAll(); 
			return $lesAffectations; 
		}
		/* Section 2 : les insertions dans les tables */
		public function insertLigne ($tab){
			$requete = "insert into ligne values (null, '"
					.$tab['description']."','"
					.$tab['statdebut']."','"
					.$tab['statfin']."','"
					.$tab['nbStations']."');";
			//preparation de la requete 
			$select = $this->unPdo->prepare ($requete); 
			//execution de la requete 
			$select->execute (); 
		}
		public function insertBus ($tab){
			$requete = "insert into bus values (null, '"
					.$tab['matricule']."','"
					.$tab['marque']."','"
					.$tab['capacite']."','"
					.$tab['energie']."');";
			//preparation de la requete 
			$select = $this->unPdo->prepare ($requete); 
			//execution de la requete 
			$select->execute (); 
		}
		public function insertChauffeur ($tab){

			//appliquer le hachage pour le mot de passe chauffeur 
			$resultat = $this->getGrainSel(); 
			$mdp = sha1($tab['mdp'].$resultat['nb']); 

			$requete = "insert into chauffeur values (null, '"
					.$tab['nom']."','"
					.$tab['prenom']."','"
					.$tab['email']."','"
					.$mdp."','"
					.$tab['adresse']."','"
					.$tab['role']."');";
			//preparation de la requete 
			$select = $this->unPdo->prepare ($requete); 
			//execution de la requete 
			$select->execute (); 
		}
		public function insertAffectation ($tab){
			$requete = "insert into affectation values (null, '"
					.$tab['dateaffectation']."','"
					.$tab['description']."','"
					.$tab['idligne']."','"
					.$tab['idbus']."','"
					.$tab['idchauffeur']."');";
			//preparation de la requete 
			$select = $this->unPdo->prepare ($requete); 
			//execution de la requete 
			$select->execute (); 
		}
		/* Section 3 : Suppression d'un enregistrement dans les tables */ 
		public function deleteLigne($idligne){
			$requete = "delete from ligne where idligne=".$idligne.";"; 
			//preparation de la requete 
			$select = $this->unPdo->prepare ($requete); 
			//execution de la requete 
			$select->execute (); 
		}
		public function deleteChauffeur($idchauffeur){
			$requete = "delete from chauffeur where idchauffeur=".$idchauffeur.";"; 
			//preparation de la requete 
			$select = $this->unPdo->prepare ($requete); 
			//execution de la requete 
			$select->execute (); 
		}
		public function deleteBus($idbus){
			$requete = "delete from bus where idbus=".$idbus.";"; 
			//preparation de la requete 
			$select = $this->unPdo->prepare ($requete); 
			//execution de la requete 
			$select->execute (); 
		}
		public function deleteAffectation($idaffectation){
			$requete = "delete from affectation where idaffectation=".$idaffectation.";"; 
			//preparation de la requete 
			$select = $this->unPdo->prepare ($requete); 
			//execution de la requete 
			$select->execute (); 
		}
		/* Section 4 : les SelectWhere sur les tables */
		public function selectWhereLigne ($idligne){
			$requete="select * from ligne where idligne=".$idligne.";"; 
			$select = $this->unPdo->prepare ($requete); 
			$select->execute (); 
			$uneLigne = $select->fetch(); 
			return $uneLigne; 
		}
		public function selectWhereBus ($idbus){
			$requete="select * from bus where idbus=".$idbus.";"; 
			$select = $this->unPdo->prepare ($requete); 
			$select->execute (); 
			$unBus = $select->fetch(); 
			return $unBus; 
		}
		public function selectWhereChauffeur ($idchauffeur){
			$requete="select * from chauffeur where idchauffeur=".$idchauffeur.";"; 
			$select = $this->unPdo->prepare ($requete); 
			$select->execute (); 
			$unChauffeur = $select->fetch(); 
			return $unChauffeur; 
		}
		public function selectWhereAffectation ($idaffectation){
			$requete="select * from affectation where idaffectation=".$idaffectation.";"; 
			$select = $this->unPdo->prepare ($requete); 
			$select->execute (); 
			$uneAffectation = $select->fetch(); 
			return $uneAffectation; 
		}
		/* Section 5 : mise à jour des données update */ 
		public function updateLigne ($tab){
			$requete = "update ligne set description='"
					.$tab['description']."', stationDebut='"
					.$tab['stationDebut']."',stationFin='"
					.$tab['stationFin']."', nbStations='"
					.$tab['nbStations']."' "
					. " where idligne=".$tab['idligne'].";";
			//preparation de la requete 
			$select = $this->unPdo->prepare ($requete); 
			//execution de la requete 
			$select->execute (); 
		}
		public function updateBus ($tab){
			$requete = "update bus set matricule='"
					.$tab['matricule']."', marque='"
					.$tab['marque']."',capacite='"
					.$tab['capacite']."', energie='"
					.$tab['energie']."' "
					. " where idbus=".$tab['idbus'].";";
			//preparation de la requete 
			$select = $this->unPdo->prepare ($requete); 
			//execution de la requete 
			$select->execute (); 
		}
		public function updateChauffeur ($tab){
			$requete = "update chauffeur set nom='"
					.$tab['nom']."', prenom='"
					.$tab['prenom']."',email='"
					.$tab['email']."', mdp='"
					.$tab['mdp']."', adresse ='"
					.$tab['adresse']."' "
					. " where idchauffeur=".$tab['idchauffeur'].";";
			//preparation de la requete 
			$select = $this->unPdo->prepare ($requete); 
			//execution de la requete 
			$select->execute (); 
		}
		public function updateAffectation ($tab){
			$requete = "update affectation set dateaffectation='"
					.$tab['dateaffectation']."', description='"
					.$tab['description']."',idligne='"
					.$tab['idligne']."', idbus='"
					.$tab['idbus']."', idchauffeur ='"
					.$tab['idchauffeur']."' " 
					. " where idaffectation=".$tab['idaffectation'].";";
			//preparation de la requete 
			$select = $this->unPdo->prepare ($requete); 
			//execution de la requete 
			$select->execute (); 
		}
		/* Section 6 : LIKE filtre sur les données */
		public function selectLikeLignes ($filtre){
			$requete ="select * from ligne where description like '%".$filtre."%' or stationDebut like '%".$filtre."%' or stationFin like '%".$filtre."%';";
			//preparation de la requete 
			$select = $this->unPdo->prepare ($requete); 
			//execution de la requete 
			$select->execute (); 
			//extraction des données 
			$lesLignes = $select->fetchAll(); 
			return $lesLignes; 
		}
		public function selectLikeBus ($filtre){
			$requete ="select * from bus where matricule like '%".$filtre."%' or marque like '%".$filtre."%' or energie like '%".$filtre."%';";
			//preparation de la requete 
			$select = $this->unPdo->prepare ($requete); 
			//execution de la requete 
			$select->execute (); 
			//extraction des données 
			$lesBus = $select->fetchAll(); 
			return $lesBus; 
		}
		public function selectLikeChauffeurs ($filtre){
			$requete ="select * from chauffeur where nom like '%".$filtre."%' or prenom like '%".$filtre."%' or adresse like '%".$filtre."%' or email like '%".$filtre."%';";
			//preparation de la requete 
			$select = $this->unPdo->prepare ($requete); 
			//execution de la requete 
			$select->execute (); 
			//extraction des données 
			$lesChauffeurs = $select->fetchAll(); 
			return $lesChauffeurs; 
		}
		public function selectLikeAffectations ($filtre){
			$requete ="select * from affectation where dateaffectation like '%".$filtre."%' or description like '%".$filtre."%' ;";
			//preparation de la requete 
			$select = $this->unPdo->prepare ($requete); 
			//execution de la requete 
			$select->execute (); 
			//extraction des données 
			$lesAffectations = $select->fetchAll(); 
			return $lesAffectations; 
		}
		/***** Requete de vérification de connexion ****/
		public function verifConnexion($email, $mdp){
			//$requete="select * from chauffeur where email='".$email."' and mdp='".$mdp."' ;"; 
			$requete="select * from chauffeur where email= :email and mdp = :mdp ;";
			$donnees = array (":email"=>$email, ":mdp"=>$mdp); 

			//preparation de la requete 
			$select = $this->unPdo->prepare ($requete); 
			//execution de la requete 
			$select->execute ($donnees); //envoi du tableau donnees à l'execution de la requete 
			//extraction des données 
			$unChauffeur = $select->fetch(); 
			return $unChauffeur; 
		}
		/******* extraction du grain de sel *********/
		public function getGrainSel (){
			$requete ="select nb from grainsel ; "; 
			$select = $this->unPdo->prepare ($requete); 
			$select->execute (); 
			$resultat = $select->fetch(); 
			return $resultat; 
		}
	}
?>













