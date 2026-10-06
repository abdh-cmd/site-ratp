<h3> Ajout d'une ligne </h3>
<form method="post">
	<table>
		<tr>
			<td> Description </td>
			<td> <input type="text" name="description" 
				value="<?php if($laLigne!=null) echo $laLigne['description'] ?>"></td>
		</tr>
		<tr>
			<td> Station Début </td>
			<td> <input type="text" name="statdebut"
				value="<?php if($laLigne!=null) echo $laLigne['stationDebut'] ?>"></td>
		</tr>
		<tr>
			<td> Station Fin </td>
			<td> <input type="text" name="statfin"
				value="<?php if($laLigne!=null) echo $laLigne['stationFin'] ?>"></td>
		</tr>
		<tr>
			<td> Nb Stations </td>
			<td> <input type="text" name="nbStations"
				value="<?php if($laLigne!=null) echo $laLigne['nbStations'] ?>"></td>
		</tr>
		<tr>
			<td> <input type="reset" name="Annuler" value="Annuler"> </td>
			<td> <input type="submit" 
			<?php if($laLigne !=null) {
				echo ' name = "Modifier" value = "Modifier" ';
			}else {
				echo 'name="Valider" value="Valider"';
			}
			?>
			></td>
		</tr>
	</table> 
	<?php 
	if($laLigne !=null) {
		echo "<input type ='hidden' name='idligne' value ='".$laLigne['idligne']."'>";
	}
	?>
</form>




















