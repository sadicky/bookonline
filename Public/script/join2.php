<?php
require_once '../../Models/Admin/connexion.php';
$db = getConnection();

if (isset($_POST['fac']) && !empty($_POST['fac'])) {
	$query = $db->prepare("SELECT * FROM tbl_departements where fac_id = ?");
	$query->execute(array($_POST['fac']));
	$rc = $query->rowCount();
	if ($rc > 0) {
		echo "<option value=''>Choisie de fac</option>";
		while ($value = $query->fetchObject()) {
			echo "<option value=" . $value->dep_id . ">" . $value->dep . "</option>";
		}
		# code...
	} else {

		echo "<option> non disponible</option>";
	}
}
