<h3> Liste des Affectations </h3>
<form method="post">
	Filtrer par : <input type="text" name="filtre">
	<input type="submit" name="Filtrer" value="Filtrer">
</form>
<br>
<table border="1">
	<tr>
		<td> ID Affectation </td>
		<td> Date Affectation </td>
		<td> Description </td>
		<td> Ligne </td>
		<td> Bus </td> 
		<td> Chauffeur </td>
		<td> OPérations </td>
	</tr>

	<?php
	foreach($lesAffectations as $uneAffectation){
		echo "<tr>";
		echo "<td>".$uneAffectation['idaffectation']."</td>";
		echo "<td>".$uneAffectation['dateaffectation']."</td>";
		echo "<td>".$uneAffectation['description']."</td>";
		echo "<td>".$uneAffectation['idligne']."</td>";
		echo "<td>".$uneAffectation['idbus']."</td>";
		echo "<td>".$uneAffectation['idchauffeur']."</td>";
		if(isset($_SESSION['role']) && $_SESSION['role']=="admin"){
		echo "<td>";
		echo "<a href='index.php?page=5&action=sup&idaffectation=".$uneAffectation['idaffectation']."'><img src='images/sup.png' height='50' witdh='50'> </a>";

		echo "<a href='index.php?page=5&action=edit&idaffectation=".$uneAffectation['idaffectation']."'><img src='images/edit.jpeg' height='50' witdh='50'> </a>";

		echo "</td>";
	}
		echo "</tr>";
	}
?>
</table>

 