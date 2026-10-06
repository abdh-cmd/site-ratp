<h3> Ajout d'un chauffeur </h3>
<form method="post">
	<table>
		<tr>
			<td> Nom </td>
			<td> <input type="text" name="nom"
				value="<?php if($leChauffeur!=null) echo $leChauffeur['nom'] ?>"></td>
		</tr>
		<tr>
			<td> Prénom </td>
			<td> <input type="text" name="prenom"
				value="<?php if($leChauffeur!=null) echo $leChauffeur['prenom'] ?>"></td>
		</tr>
		<tr>
			<td> Email </td>
			<td> <input type="text" name="email"
				value="<?php if($leChauffeur!=null) echo $leChauffeur['email'] ?>"></td>
		</tr>
		<tr>
			<td> MDP </td>
			<td> <input type="password" name="mdp"
				value="<?php if($leChauffeur!=null) echo $leChauffeur['mdp'] ?>"></td>
		</tr>
		<tr>
			<td> Adresse </td>
			<td> <input type="text" name="adresse"
				value="<?php if($leChauffeur!=null) echo $leChauffeur['adresse'] ?>"></td>
		</tr>
		<tr>
			<td> Rôle </td>
			<td> <select name="role">
				<option value="chauffeur">Chauffeur</option>
				<option value="admin">Admin</option>
			</select>
			</td>
		</tr>
		<tr>
			<td> <input type="reset" name="Annuler" value="Annuler"> </td>
			<td> <input type="submit" 
			<?php if($leChauffeur !=null) {
				echo ' name = "Modifier" value = "Modifier" ';
			}else {
				echo 'name="Valider" value="Valider"';
			}
			?>
			></td>
		</tr>
	</table> 
	<?php 
	if($leChauffeur !=null) {
		echo "<input type ='hidden' name='idchauffeur' value ='".$leChauffeur['idchauffeur']."'>";
	}
	?>
</form>
