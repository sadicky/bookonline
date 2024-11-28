<?php
require_once("connexion.php");

class Subscription
{
    public $statut = 1;
    public $email;
    public $pwd;
    public $name;
    public $type; 


    //ajouter une souscription
    public function setSubscription($id_member,$id_plan,$debut,$fin,$status)
    {
        $db = getConnection();
        $add = $db->prepare("INSERT INTO tbl_subscriptions (id_member,id_plan,debut,fin,status) VALUES (?,?,?,?,?)");
        $addline = $add->execute(array($id_member,$id_plan,$debut,$fin,$status));
        return $addline;
    }
    
    //ajouter un plan
    public function setPlan($name, $feq, $price, $desc)
    {

        $db = getConnection();
        $add = $db->prepare("INSERT INTO tbl_plans (name,frequence,	prix,description) VALUES (?,?,?,?)");
        $addline = $add->execute(array($name, $feq, $price, $desc));
        return $addline;
    }

    //afficher tous les plans
    public function getPlans()
    {
        $db = getConnection();
        $statement = $db->prepare("SELECT * FROM tbl_plans");
        $statement->execute();
        $tbP = array();
        while ($data =  $statement->fetchObject()) {
            $tbP[] = $data;
        }
        return $tbP;
    }

    public function getPlanName($email)
    {
        $db = getConnection();
        $statement = $db->prepare("SELECT name FROM tbl_plans WHERE name = ?");
        $statement->execute([$email]);
        $tbP = $statement->fetchObject();
        return $tbP;
    }
    
    public function getPlan($id)
    {
        $db = getConnection();
        $statement = $db->prepare("SELECT * FROM tbl_plans WHERE id_plan = ?");
        $statement->execute([$id]);
        $tbP = $statement->fetchObject();
        return $tbP;
    }

    //afficher toutes les souscriptions
    public function getSubscriptions()
    {

        $db = getConnection();
        $statement = $db->prepare("SELECT s.id_member,s.id_subscription, m.nom,m.prenom,m.postnom,s.debut,s.fin,m.matricule,m.email,p.name as bouquet 
        FROM tbl_subscriptions as s,tbl_plans as p,tbl_members as m 
        WHERE s.id_plan=p.id_plan and s.id_member= m.id_member");
        $statement->execute();
        $tbP = array();
        while ($data =  $statement->fetchObject()) {
            $tbP[] = $data;
        }
        return $tbP;
    }

    
    //afficher toutes les souscriptions
    public function getSubscription($id)
    {

        $db = getConnection();
        $statement = $db->prepare("SELECT s.id_member,s.id_subscription, m.nom,m.prenom,m.postnom,s.debut,s.fin,m.matricule,m.email,p.name as bouquet 
        FROM tbl_subscriptions as s,tbl_plans as p,tbl_members as m 
        WHERE s.id_plan=p.id_plan and s.id_member= m.id_member and s.id_member=? ");
        $statement->execute(array($id));
        $tbP = $statement->fetchObject();
        return $tbP;
    }
}
