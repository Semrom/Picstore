<?php		include_once "../php/controller/admin_users.php";		$actif = "";?><br /><table class="table table-striped table-hover" id="user-table">  <thead>    <tr>      <th>ID</th>      <th>Pseudo</th>      <th>Email</th>      <th>Date d'inscription</th>      <th>Compte actif</th>      <th>Suppression</th>    </tr>  </thead>  <tbody>  	<?php foreach ($data as $donnee) { ?>  		<tr <?php if ($donnee['actif'] == 0) {echo 'class="warning"'; $actif = "Non";} else {echo 'class="active"'; $actif = "Oui";} ?> >		  <td><?php echo $donnee['id_user']; ?></td>		  <td><?php echo $donnee['pseudo_user']; ?></td>		  <td><?php echo $donnee['email_user']; ?></td>		  <td><?php echo $donnee['date_inscription_user']; ?></td>		  <td><?php echo $actif; ?></td>		  <td><?php echo '<a class="btn btn-danger user" id="' . $donnee['id_user'] . '">Supprimer</a>'; ?></td>		</tr>		    <?php } ?>  </tbody></table> <div id="confirmDel" class="centrer">	<h3>Suppression d'un utilisateur</h3>	<p id="check-text-usr"></p>	<a class="btn btn-danger confirmUsr" id="ouiUsr">Oui</a>	<a class="btn btn-info confirmUsr" id="nonUsr">Non</a></div><br /><br />