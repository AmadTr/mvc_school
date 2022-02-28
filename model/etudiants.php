<?php

class Etudiant {
    private $id;
    private $nom;
    private $prenom;
    private $titre;
    private $age;
    private $passwd;
    private $email;
    private $statut;
    private $ville;

    public function getId() {return $this->id;}
    
    public function getNom() {return $this->nom;}
    public function setNom($nom) {$this->nom = $nom;}

    public function getPrenom() {return $this->prenom;}
    public function setPrenom($prenom) {$this->prenom = $prenom;}

    public function getTitre() {return $this->titre;}
    public function setTitre($titre) {$this->titre = $titre;}

    public function getAge() {return $this->age;}
    public function setAge($age) {$this->age = $age;}

    public function getPasswd() {return $this->passwd;}
    public function setPasswd($passwd) {$this->passwd = $passwd;}

    public function getEmail() {return $this->email;}
    public function setEmail($email) {$this->email = $email;}

    public function getStatut() {return $this->statut;}
    public function setStatut($statut) {$this->statut = $statut;}

    public function getVille() {return $this->ville;}
    public function setVille($ville) {$this->ville = $ville;}

     // Retourne le nom complet de la personne
        // "Nom Prenom"
        // **************************************
        public function getFullname() {
            return ($this->prenom." ".$this->nom);
        }

}

/**
 * getAllCourses
 *
 * @return array 
 */
function getAllEtudiants() {
    $sql = "SELECT * FROM etudiants";
    $rep=[];

    try {
        $bdd = dbConnect();
        $req = $bdd->query($sql);
        $req->setFetchMode(PDO::FETCH_CLASS, 'Etudiant');
        $rep = $req->fetchAll();
    }
    catch (PDOException $ex) {
        var_dump("Erreur GET COURS: {$ex->getMessage()}");
    }
    finally {
        return $rep;
    }
}

function dEtudiantsById($id) {
    $sql = "DELETE FROM etudiants ";
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

function addEtudiantsbyNom($nom, $prenom, $titre, $age, $passwd, $email, $ville) {
    $sql = "INSERT INTO etudiants (nom, prenom, titre, age, passwd, email, statut, ville) ";
    $sql .= "VALUES (:nom, :prenom, :titre, :age, :passwd, :email, 0, :ville)";
    $rep=false;

    
    try {
        $bdd = dbConnect();
        $req = $bdd->prepare($sql);
        
        $req->bindValue(':nom', $nom, PDO::PARAM_STR);
        $req->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $req->bindValue(':titre', $titre, PDO::PARAM_STR);
        $req->bindValue(':age', $age, PDO::PARAM_INT);
        $req->bindValue(':passwd', $passwd, PDO::PARAM_STR);
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->bindValue(':ville', $ville, PDO::PARAM_STR);
        $req->bindValue(':nom', $nom, PDO::PARAM_STR);
        $rep = $req->execute();
    }
    catch (PDOException $ex) {
        var_dump("Erreur GET COURS: {$ex->getMessage()}");
    }
    finally {
        return $rep;
    }
}
function getStudentById($id) {
    $sql = "SELECT * FROM etudiants ";
    $sql .= "WHERE id= $id;";
    $rep=[];

    try {
        $bdd = dbConnect();
        $req = $bdd->query($sql);
        $req->setFetchMode(PDO::FETCH_CLASS, 'Etudiant');
        $rep = $req->fetch();
    }
    catch (PDOException $ex) {
        var_dump("Erreur GET COURS: {$ex->getMessage()}");
    }
    finally {
        return $rep;
    }
}
function updateEtudiants($id, $nom, $prenom, $titre, $age, $passwd, $email, $ville){

    $sql = "UPDATE etudiants ";
    $sql .= "SET nom= :nom, prenom= :prenom, titre= :titre, age= :age, passwd= :passwd, email= :email, statut=0, ville= :ville ";
    // $sql.="SET nom= $nom, prenom= $prenom,"
    $sql .= "WHERE id= $id;";
    $rep=false;

    try {
        $rep=true;
        $bdd = dbConnect();
        $req = $bdd->prepare($sql);
        $req->bindValue(':nom', $nom, PDO::PARAM_STR);
        $req->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $req->bindValue(':titre', $titre, PDO::PARAM_STR);
        $req->bindValue(':age', $age, PDO::PARAM_INT);
        $req->bindValue(':passwd', $passwd, PDO::PARAM_STR);
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->bindValue(':ville', $ville, PDO::PARAM_STR);
        $ret = $req->execute();
    }
    catch (PDOException $ex) {
        var_dump("Erreur UPDATE Etudiants: {$ex->getMessage()}");
    }
    finally {
        return $rep;
    }
}