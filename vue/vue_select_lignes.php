<h3> Liste des lignes </h3>

<form method="post">
	Filtrer par : <input type="text" name="filtre">
	<input type="submit" name="Filtrer" value="Filtrer">
</form>
<br>
<table border="1">
	<tr>
		<td> ID ligne </td>
		<td> Description </td>
		<td> Station Début </td>
		<td> Station Fin </td>
		<td> Nb Stations </td> 
<?php 
if(isset($_SESSION['role']) && $_SESSION['role']=="admin"){
		echo "<td> Opérations </td>"; 
	}
?>
	</tr>
<?php
	foreach($lesLignes as $uneLigne){
		echo "<tr>";
		echo "<td>".$uneLigne['idligne']."</td>";
		echo "<td>".$uneLigne['description']."</td>";
		echo "<td>".$uneLigne['stationDebut']."</td>";
		echo "<td>".$uneLigne['stationFin']."</td>";
		echo "<td>".$uneLigne['nbStations']."</td>";
if(isset($_SESSION['role']) && $_SESSION['role']=="admin"){
		echo "<td>";
		echo "<a href='index.php?page=2&action=sup&idligne=".$uneLigne['idligne']."'><img src='images/sup.png' height='50' witdh='50'> </a>";

		echo "<a href='index.php?page=2&action=edit&idligne=".$uneLigne['idligne']."'><img src='images/edit.jpeg' height='50' witdh='50'> </a>";

		echo "</td>";
	}
		echo "</tr>";
	}
?>

</table>









