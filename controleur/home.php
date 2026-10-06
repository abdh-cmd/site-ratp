<h2> Bienvenue à la RATP <br> 
<?php
echo "Nom : ".$_SESSION['nom']. "  " ." Prénom :".$_SESSION['prenom'];
echo "<br> Vous avez le role : ".$_SESSION['role']; 
?>

</h2>

<br>
<img src="images/ratp.png" height="400" width="700">
<br>

<?php
	$lesLignes = $unControleur->selectAllInfos(); 
	require_once ("vue/vue_liste_bus_lignes.php");
?>
<br> <br> 
<a href="https://www.ratp.fr"> Visiter le site de la RATP </a>
<br>
<br>
