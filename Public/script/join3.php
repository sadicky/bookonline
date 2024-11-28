<?php
require_once '../../Models/Admin/connexion.php';
$db = getConnection();

if (isset($_POST['fac']) && !empty($_POST['fac'])) {
	$query = $db->prepare("SELECT * FROM tbl_departements where fac_id = ? ");
	$query->execute(array($_POST['fac']));
	$rc = $query->rowCount();
	if ($rc > 0) {
		echo "<option>Selectionner</option>";
		while ($value = $query->fetchObject()) {
			echo "<option value=" . $value->dep_id . ">" . $value->dep . "</option>";
		}
	} else {
		echo "<option>Non disponible</option>";
	}
}

if (isset($_POST['dep']) && !empty($_POST['dep'])) {
	$query = $db->prepare("SELECT * FROM tbl_classes where dep_id = ? ");
	$query->execute(array($_POST['dep']));
	$rc = $query->rowCount();
	if ($rc > 0) {
		echo "<option>Selectionner</option>";
		while ($value = $query->fetchObject()) {
			echo "<option value=" . $value->classe_id . ">" . $value->classe . "</option>";
		}
	} else {
		echo "<option>Non disponible</option>";
	}
}
//     if (isset($_POST['classe'])&& !empty($_POST['classe'])) {
//     	$query = $db->prepare("SELECT * FROM tbl_cours where classe = ?");
//         $query->execute(array($_POST['classe']));
//     	$rc = $query->rowCount();
//     	if ($rc>0) {
//     		echo "<option>Selectionner</option>";
//     		while ($value=$query->fetchObject()) {
//     			echo "<option value=".$value->cours_id.">".$value->cours."</option>";
//            		}
//     		# code...
//     	}
//     	else{

//     		echo "<option> non disponible</option>";
//     	}
//    }
