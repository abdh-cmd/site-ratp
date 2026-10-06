<h3> Ajout d'un Bus </h3>
<form method="post">
	<table>
		<tr>
			<td> Matricule </td>
			<td> <input type="text" name="matricule" 
				value="<?php if($leBus!=null) echo $leBus['matricule'] ?>"></td>
		</tr>
		<tr>
			<td> Marque </td>
			<td> <input type="text" name="marque"
				value="<?php if($leBus!=null) echo $leBus['marque'] ?>"></td>
		</tr>
		<tr>
			<td> Capacité </td>
			<td> <input type="text" name="capacite"
				value="<?php if($leBus!=null) echo $leBus['capacite'] ?>"></td>
		</tr>
		<tr>
			<td> Energie </td>
			<td> <input type="text" name="energie"
				value="<?php if($leBus!=null) echo $leBus['energie'] ?>"></td>
		</tr>
		<tr>
			<td> <input type="reset" name="Annuler" value="Annuler"> </td>
			<td> <input type="submit" 
			<?php if($leBus !=null) {
				echo ' name = "Modifier" value = "Modifier" ';
			}else {
				echo 'name="Valider" value="Valider"';
			}
			?>
			></td>
		</tr>
	</table> 
	<?php 
	if($leBus !=null) {
		echo "<input type ='hidden' name='idbus' value ='".$leBus['idbus']."'>";
	}
	?>
</form>
