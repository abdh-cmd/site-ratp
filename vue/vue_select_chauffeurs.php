<h3> Liste des Chauffeurs </h3>
<form method="post">
	Filtrer par : <input type="text" name="filtre">
	<input type="submit" name="Filtrer" value="Filtrer">
</form>
<br>

<table border="1">
	<tr>
		<td> ID Chauffeur </td>
		<td> Nom </td>
		<td> Prénom </td>
		<td> Email </td>
		<td> Adresse </td> 
		<td> Rôle </td> 
		<td> Opérations </td>
	</tr>
	<?php
	foreach($lesChauffeurs as $unChauffeur){
		echo "<tr>";
		echo "<td>".$unChauffeur['idchauffeur']."</td>";
		echo "<td>".$unChauffeur['nom']."</td>";
		echo "<td>".$unChauffeur['prenom']."</td>";
		echo "<td>".$unChauffeur['email']."</td>";
		echo "<td>".$unChauffeur['adresse']."</td>";
		echo "<td>".$unChauffeur['role']."</td>";
		if(isset($_SESSION['role']) && $_SESSION['role']=="admin"){
		echo "<td>";
		echo "<a href='index.php?page=4&action=sup&idchauffeur=".$unChauffeur['idchauffeur']."'><img src='images/sup.png' height='50' witdh='50'> </a>";

		echo "<a href='index.php?page=4&action=edit&idchauffeur=".$unChauffeur['idchauffeur']."'><img src='images/edit.jpeg' height='50' witdh='50'> </a>";

		echo "</td>";
	}
		echo "</tr>";
	}
?>
</table>

 