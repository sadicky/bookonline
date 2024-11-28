<?php
require_once("connexion.php");

class Member
{
    public $statut = 1;
    public $email;
    public $pwd;
    public $name;
    public $type;
 
    public function setMember($nom, $postnom, $prenom, $sexe, $card_number, $type, $provenance, $contact_autorite, $matricule, $email, $adresse, $tel, $code, $statut,$fx,$promo,$ville, $classe_id)
    {

        $db = getConnection();
        $add = $db->prepare("INSERT INTO tbl_members (nom,postnom,prenom,sexe,card_number,type,provenance,contact_autorite,matricule,email,adresse,tel,code,statut,fonction,promotion,ville,classe_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $addline = $add->execute(array($nom, $postnom, $prenom, $sexe, $card_number, $type, $provenance, $contact_autorite, $matricule, $email, $adresse, $tel, $code, $statut,$fx,$promo,$ville, $classe_id));
        return $addline;
    }


    public function setMailVerification($email, $code)
    {
        $db = getConnection();
        $add = $db->query("UPDATE tbl_members SET verified_at = NOW(), statut='1' WHERE email = '$email' AND code = $code");
        $addline = $add->rowCount();
        if ($addline) {
            echo 'Success: At least 1 row was affected.';
        } else {
            echo 'Failure: 0 rows were affected.';
        }
        return $addline;
    }

    public function getMembers()
    {
        $db = getConnection();
        $add = $db->prepare("SELECT * FROM tbl_members");
        $add->execute();
        $tbP = array();
        while ($data =  $add->fetchObject()) {
            $tbP[] = $data;
        }
        return $tbP;
    }

    public function getMembersType($type)
    {
        $db = getConnection();
        $add = $db->prepare("SELECT * FROM tbl_members where type=?");
        $add->execute([$type]);
        $tbP = array();
        while ($data =  $add->fetchObject()) {
            $tbP[] = $data;
        }
        return $tbP;
    }

    
    public function getEtudiants()
    {
        $db = getConnection();
        $add = $db->prepare("SELECT id_member, nom, postnom, prenom, sexe, card_number, type, provenance, contact_autorite, matricule, email, adresse, tel, code, verified_at, photo, statut, fac, dep, classe 
        FROM tbl_members as m, tbl_faculties as f, tbl_departements as d, tbl_classes as c 
        WHERE m.classe_id = c.classe_id and c.dep_id = d.dep_id and d.fac_id=f.fac_id and type='I'");
        $add->execute();
        $tbP = array();
        while ($data =  $add->fetchObject()) {
            $tbP[] = $data;
        }
        return $tbP;
    }

    public function getMemberEmail($email)
    {
        $db = getConnection();
        $statement = $db->prepare("SELECT * FROM tbl_members WHERE email = ?");
        $statement->execute([$email]);
        $tbP = $statement->fetchObject();
        return $tbP;
    }
    
    public function getMemberId($id)
    {
        $db = getConnection();
        $statement = $db->prepare("SELECT * FROM tbl_members WHERE id_member = ?");
        $statement->execute([$id]);
        $tbP = $statement->fetchObject();
        return $tbP;
    }

    public function setFaculty($fac)
    {
        $db = getConnection();
        $add = $db->prepare("INSERT INTO tbl_faculties (fac) VALUES (?)");
        $addline = $add->execute(array($fac));
        return $addline;
    }

    public function getFaculties()
    {
        $db = getConnection();
        $add = $db->prepare("SELECT * FROM tbl_faculties");
        $add->execute();
        $tbP = array();
        while ($data =  $add->fetchObject()) {
            $tbP[] = $data;
        }
        return $tbP;
    }
    public function getFaculty($id)
    {
        $db = getConnection();
        $add = $db->prepare("SELECT * FROM tbl_faculties where fac_id=?");
        $add->execute([$id]);
        $tbP =  $add->fetchObject();
        return $tbP;
    }
    public function deleteFac($id)
    {
        $db = getConnection();
        $sql = $db->prepare("DELETE FROM tbl_faculties WHERE fac_id=?");
        $ok = $sql->execute(array($id));
        return $ok;
    }


    public function setDepartement($dep, $fac)
    {

        $db = getConnection();
        $add = $db->prepare("INSERT INTO tbl_departements (dep,fac_id) VALUES (?,?)");
        $addline = $add->execute(array($dep, $fac));
        return $addline;
    }

    public function getDepartements()
    {
        $db = getConnection();
        $add = $db->prepare("SELECT * FROM tbl_departements as d,tbl_faculties as f 
                              WHERE f.fac_id=d.fac_id");
        $add->execute();
        $tbP = array();
        while ($data =  $add->fetchObject()) {
            $tbP[] = $data;
        }
        return $tbP;
    }

    
    public function getDepartement($id)
    {
        $db = getConnection();
        $add = $db->prepare("SELECT * FROM tbl_departements as d,tbl_faculties as f 
                              WHERE f.fac_id=d.fac_id and d.dep_id=?");
        $add->execute([$id]);
        $tbP =  $add->fetchObject();
        return $tbP;
    }


    public function deleteDep($id)
    {
        $db = getConnection();
        $sql = $db->prepare("DELETE FROM tbl_departements WHERE dep_id=?");
        $ok = $sql->execute(array($id));
        return $ok;
    }
    public function setClasse($niveau, $dep)
    {
        $db = getConnection();
        $add = $db->prepare("INSERT INTO tbl_classes (classe,dep_id) VALUES (?,?)");
        $addline = $add->execute(array($niveau, $dep));
        return $addline;
    }
    public function getClasses()
    {

        $db = getConnection();
        $add = $db->prepare(" SELECT * FROM tbl_departements as d,tbl_faculties as f, tbl_classes as c
                              WHERE f.fac_id=d.fac_id and c.dep_id=d.dep_id");
        $add->execute();
        $tbP = array();
        while ($data =  $add->fetchObject()) {
            $tbP[] = $data;
        }
        return $tbP;
    }

    
    public function getClasse($id)
    {

        $db = getConnection();
        $add = $db->prepare(" SELECT * FROM tbl_departements as d,tbl_faculties as f, tbl_classes as c
                              WHERE f.fac_id=d.fac_id and c.dep_id=d.dep_id and c.classe_id=?");
        $add->execute([$id]);
        $tbP =  $add->fetchObject();
        return $tbP;
    }

    public function deleteClasse($id)
    {
        $db = getConnection();
        $sql = $db->prepare("DELETE FROM tbl_classes WHERE classe_id=?");
        $ok = $sql->execute(array($id));
        return $ok;
    }
    
    public function activMember($id)
    {
        $db = getConnection();
        $req = $db->prepare("UPDATE tbl_members  SET statut='1' WHERE id_member=?");
        $d = $req->execute(array($id));
        return $d;
    }
    
    public function activUser($id)
    {
        $db = getConnection();
        $req = $db->prepare("UPDATE tbl_users  SET statut='1' WHERE id_user=?");
        $d = $req->execute(array($id));
        return $d;
    }
    
    public function desactMember($id)
    {
        $db = getConnection();
        $req = $db->prepare("UPDATE tbl_members SET statut='0' WHERE id_member=?");
        $d = $req->execute(array($id));
        return $d;
    }
    
    public function desactUser($id)
    {
        $db = getConnection();
        $req = $db->prepare("UPDATE tbl_users  SET statut='0' WHERE id_user=?");
        $d = $req->execute(array($id));
        return $d;
    }
}
