<h3> Tableau de Bord  </h3>
<br>
<table border="1">
	<tr>
		<td> Matricule BUS  </td>
		<td> La ligne </td>
		<td> Station Début  </td>
		<td> Station Fin  </td>
		<td> Date affectation </td>  
	</tr>
	<?php
	foreach($lesLignes as $uneLigne){
		echo "<tr>";
		echo "<td>".$uneLigne['matricule']."</td>";
		echo "<td>".$uneLigne['description']."</td>";
		echo "<td>".$uneLigne['stationDebut']."</td>";
		echo "<td>".$uneLigne['stationFin']."</td>";
		echo "<td>".$uneLigne['dateAffectation']."</td>";
		echo "</tr>";
	}
?>
</table>

 