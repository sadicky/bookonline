<?php
require_once("connexion.php");

class User
{
    public $email;
    public $pwd;
    public $username;
    public $role;
    public $statut;
    public $phone;


    //ajouter un Admin
    public function setUser($username, $pwd, $role, $noms, $email, $tel)
    {
        //   PWD
        $pwd_encrypt = password_hash($pwd, PASSWORD_DEFAULT);

        $pwd = $this->pwd = $pwd_encrypt;
        $this->username = $username;
        $this->role = $role;
        if ($role == 'Membre')
            $statut = $this->statut = 0;
        else
            $statut = $this->statut = 1;

        $db = getConnection();
        $add = $db->prepare("INSERT INTO tbl_users (username,password,statut,role,noms,email,tel) VALUES (?,?,?,?,?,?,?)");
        $addline = $add->execute(array($username, $pwd, $statut, $role, $noms, $email, $tel));
        return $addline;
    }



    public function getUsername($email)
    {
        $db = getConnection();
        $statement = $db->prepare("SELECT username FROM tbl_users WHERE username = ?");
        $statement->execute([$email]);
        $tbP = $statement->fetchObject();
        return $tbP;
    }

    public function getUserByEmail($email)
    {
        $db = getConnection();
        $statement = $db->prepare("SELECT * FROM tbl_users WHERE email = ?");
        $statement->execute([$email]);
        $tbP = $statement->fetchObject();
        return $tbP;
    }

    //afficher utilisateur
    public function getUsers()
    {
        $db = getConnection();
        $statement = $db->prepare("SELECT * FROM tbl_users ");
        $statement->execute();
        $tbP = array();
        while ($data =  $statement->fetchObject()) {
            $tbP[] = $data;
        }
        return $tbP;
    }


    public function deleteUser($id)
    {
        $db = getConnection();
        $sql = $db->prepare("DELETE FROM tbl_users WHERE id_user=?");
        $ok = $sql->execute(array($id));
        return $ok;
    }

    public function activUser($iduser)
    {
        $db = getConnection();
        $req = $db->prepare("UPDATE tbl_users SET statut='1' WHERE id_user=?");
        $d = $req->execute(array($iduser));
        return $d;
    }
    public function desactUser($iduser)
    {
        $db = getConnection();
        $req = $db->prepare("UPDATE tbl_users SET statut='0' WHERE id_user=?");
        $d = $req->execute(array($iduser));
        return $d;
    }
}
