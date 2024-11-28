<?php
require_once("connexion.php");
$db = getConnection();
$msg = "";
$username = isset($_POST['username']) ? $_POST['username'] : "";
$pwd = isset($_POST['pwd']) ? $_POST['pwd'] : "";
if (isset($_POST['login'])) {
  $sql = $db->prepare("SELECT * FROM tbl_users WHERE statut='1' and username= :username");
  $sql->bindValue('username', $username);
  $sql->execute();
  $res = $sql->fetchObject();
  // var_dump($res);die();
  if ($res) {
    $pwdHash = $res->password;
    if (password_verify($pwd, $pwdHash)) {
      $_SESSION['id'] = $res->id_user;
      $_SESSION['username'] = $res->username;
      $_SESSION['noms'] = $res->noms;
      $_SESSION['role'] = $res->role;
      $_SESSION['email'] = $res->email;
      $_SESSION['logged'] = true;
      $isLogged = $_SESSION['logged'];
      // var_dump($_SESSION['role']);die();
      
      $action = $_SESSION['role']." Login";
      $description = $_SESSION['noms']. " est connecté avec succès.";
      setLog($action,$description);

      if ($_SESSION['role'] == "Admin") header("location:" . WEBROOT . "dashboard");
      else if ($_SESSION['role'] == "Librarian") header("location:" . WEBROOT . "dashboard");
      else if ($_SESSION['role'] == "SGAC") header("location:" . WEBROOT . "dashboard");
      else if ($_SESSION['role'] == "Membre") header("location:" . WEBROOT . "dashboard");
      else header("location:" . WEBROOT . "login");
    } else {
      $msg = "<strong style='color:red'>Error</strong>: Mot de passe incorrect ";
    }
  } else {
    $msg = "<strong style='color:red'>Erreur d'Authentification:</strong> Nom d'utilisateur et Mot de passe incorrects ou demander à l'administrateur";
  }
}
