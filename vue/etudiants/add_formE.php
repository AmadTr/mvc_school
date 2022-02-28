<?php
    ob_start();
    // var_dump($rep);
    // die();

    if (isset($_GET['id'])) {
        $id = $rep->getId();
        $link = "index.php?action=ajtOuMEtudiants&id=$id";
        $btn ='Modifiez le Etudiant';
        $nom = $rep->getNom();
        $prenom = $rep->getPrenom();
        $age = $rep->getAge();
        $email = $rep->getEmail();
        $passwd = $rep->getPasswd();
        $ville = $rep->getVille();

    }
    else{
        $link = "index.php?action=ajtOuMEtudiants";
        $btn ='Ajoutez le Etudiant';
        $nom ='';
        $prenom = '';
        $age = '';
        $email='';
        $passwd='';
        $ville='';
    }

?>

<form action=<?=$link ?> method="post">

    <div class="form-check rd-titre">
    <input class="form-check-input" type="radio" name="titre" id="mrs" value="Mrs" checked>
    <label class="form-check-label" for="mrs">Mrs</label>
    </div>

    <div class="form-check rd-titre" >
    <input class="form-check-input" type="radio" name="titre" id="mme" value="Mme">
    <label class="form-check-label" for="mme">Mme</label>
    </div>
    
    <div class="form-group mb-20">
    <label for="nom">Nom</label>
    <input type="text" class="form-control" id="nom" name="nom" placeholder=<?=$nom?>>
    </div>

    <div class="form-group mb-20">
    <label for="nom">Prenom</label>
    <input type="text" class="form-control" id="prenom" name="prenom" placeholder=<?=$prenom?>>
    </div>

    <div class="form-group mb-20">
    <label for="age">Age</label>
    <input type="text" class="form-control" id="age" name="age" placeholder=<?=$age?>>
    </div>

    <div class="form-group mb-20">
    <label for="email">Adresse de messagerie</label>
    <input type="email" class="form-control" id="email" name="email" placeholder=<?=$email?>>
    </div>

    <div class="form-group mb-20">
    <label for="passwd">mot de passe</label>
    <input type="password" class="form-control" id="passwd" name="passwd" placeholder=<?=$passwd?>>
    </div>
    
    <div class="form-group mb-20">
    <label for="ville">Ville</label>
    <input type="text" class="form-control" id="ville" name="ville" placeholder=<?=$ville?>>
    </div>

    <button type="submit" class="btn btn-primary"><?=$btn?></button>
</form>


<?php
$content = ob_get_clean();
require "vue/template.php"
?>