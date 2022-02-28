<?php

class Cours {
    private $id;
    private $nom;

    public function getId() {return $this->id;}
    
    public function getNom() {return $this->nom;}
    public function setNom($nom) {$this->nom = $nom;}
}

/**
 * getAllCourses
 *
 * @return array 
 */
function getAllCours() {
    $sql = "SELECT * FROM cours";
    $rep=[];

    try {
        $bdd = dbConnect();
        $req = $bdd->query($sql);
        $req->setFetchMode(PDO::FETCH_CLASS, 'Cours');
        $rep = $req->fetchAll();
    }
    catch (PDOException $ex) {
        var_dump("Erreur GET COURS: {$ex->getMessage()}");
    }
    finally {
        return $rep;
    }
}

function getNomCoursById($id) {
    $sql = "SELECT * FROM cours ";
    $sql .= "WHERE id= $id;";
    $rep=[];

    try {
        $bdd = dbConnect();
        $req = $bdd->query($sql);
        $req->setFetchMode(PDO::FETCH_CLASS, 'Cours');
        $rep = $req->fetch();
    }
    catch (PDOException $ex) {
        var_dump("Erreur GET COURS: {$ex->getMessage()}");
    }
    finally {
        return $rep;
    }
}

function dCoursById($id) {
    $sql = "DELETE FROM cours ";
    $sql .= "WHERE id= $id;";
    $rep=false;

    try {
        $bdd = dbConnect();
        $req = $bdd->query($sql);
        $rep = $req->fetchAll();
    }
    catch (PDOException $ex) {
        var_dump("Erreur GET COURS: {$ex->getMessage()}");
    }
    finally {
        return $rep;
    }
}

function addCoursbyNom($nom) {
    $sql = "INSERT INTO cours(nom) ";
    $sql .= "VALUES (:nom)";
    $rep=false;

    try {
        $bdd = dbConnect();
        $req = $bdd->prepare($sql);
        $req->bindValue(':nom', $nom, PDO::PARAM_STR);
        $ret = $req->execute();
    }
    catch (PDOException $ex) {
        var_dump("Erreur GET COURS: {$ex->getMessage()}");
    }
    finally {
        return $rep;
    }
}
function updateCours($id,$nom){

    $sql = "UPDATE cours ";
    $sql .= "SET nom=:nom ";
    $sql .= "WHERE id=:id;";
    $rep=false;

    try {
        $rep=true;
        $bdd = dbConnect();
        $req = $bdd->prepare($sql);
        $req->bindValue(':nom', $nom, PDO::PARAM_STR);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $ret = $req->execute();
    }
    catch (PDOException $ex) {
        var_dump("Erreur UPDATE COURS: {$ex->getMessage()}");
    }
    finally {
        return $rep;
    }
}