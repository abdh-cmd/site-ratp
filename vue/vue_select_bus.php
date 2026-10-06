<h3> Liste des Bus </h3>
<form method="post">
	Filtrer par : <input type="text" name="filtre">
	<input type="submit" name="Filtrer" value="Filtrer">
</form>
<br>

<table border="1">
	<tr>
		<td> ID Bus </td>
		<td> Matricule </td>
		<td> Marque </td>
		<td> Capacité </td>
		<td> Energie </td> 
		<td> Opérations </td>
	</tr>
	<?php
	foreach($lesBus as $unBus){
		echo "<tr>";
		echo "<td>".$unBus['idbus']."</td>";
		echo "<td>".$unBus['matricule']."</td>";
		echo "<td>".$unBus['marque']."</td>";
		echo "<td>".$unBus['capacite']."</td>";
		echo "<td>".$unBus['energie']."</td>";
		if(isset($_SESSION['role']) && $_SESSION['role']=="admin"){
		echo "<td>";
		echo "<a href='index.php?page=3&action=sup&idbus=".$unBus['idbus']."'><img src='images/sup.png' height='50' witdh='50'> </a>";

		echo "<a href='index.php?page=3&action=edit&idbus=".$unBus['idbus']."'><img src='images/edit.jpeg' height='50' witdh='50'> </a>";

		echo "</td>";
	}
		echo "</tr>";
	}
?>
</table>