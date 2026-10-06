<h3> Ajout d'une affectation </h3>
<form method="post">
	<table>
		<tr>
			<td> Description </td>
			<td> <input type="text" name="description"
				value="<?php if($lAffectation!=null) echo $lAffectation['description'] ?>"></td>
		</tr>
		<tr>
			<td> Date Affectation </td>
			<td> <input type="text" name="dateaffectation"
				value="<?php if($lAffectation!=null) echo $lAffectation['dateaffectation'] ?>"></td>
		</tr>
		<tr>
			<td> Ligne </td>
			<td> <input type="text" name="idligne"
				value="<?php if($lAffectation!=null) echo $lAffectation['idligne'] ?>"></td>
		</tr>
		<tr>
			<td> Bus </td>
			<td> <input type="text" name="idbus"
				value="<?php if($lAffectation!=null) echo $lAffectation['idbus'] ?>"></td>
		</tr>
		<tr>
			<td> Chauffeur </td>
			<td> <input type="text" name="idchauffeur"
				value="<?php if($lAffectation!=null) echo $lAffectation['idchauffeur'] ?>"></td>
		</tr>
		<tr>
			<td> <input type="reset" name="Annuler" value="Annuler"> </td>
			<td> <input type="submit" 
			<?php if($lAffectation !=null) {
				echo ' name = "Modifier" value = "Modifier" ';
			}else {
				echo 'name="Valider" value="Valider"';
			}
			?>
			></td>
		</tr>
	</table> 
	<?php 
	if($lAffectation !=null) {
		echo "<input type ='hidden' name='idaffectation' value ='".$lAffectation['idaffectation']."'>";
	}
	?>
</form>
