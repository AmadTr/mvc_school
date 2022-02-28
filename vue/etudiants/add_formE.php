<?php
    ob_start();
?>

<form action='index.php?action=aEtudiants' method="post">

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
    <input type="text" class="form-control" id="nom" name="nom" placeholder="Votre nom">
    </div>

    <div class="form-group mb-20">
    <label for="nom">Prenom</label>
    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Votre prénom">
    </div>

    <div class="form-group mb-20">
    <label for="age">Age</label>
    <input type="text" class="form-control" id="age" name="age" placeholder="Votre age">
    </div>

    <div class="form-group mb-20">
    <label for="email">Adresse de messagerie</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Votre email">
    </div>

    <div class="form-group mb-20">
    <label for="passwd">mot de passe</label>
    <input type="password" class="form-control" id="passwd" name="passwd" placeholder="Votre mot de passe">
    </div>
    
    <div class="form-group mb-20">
    <label for="ville">Ville</label>
    <input type="text" class="form-control" id="ville" name="ville" placeholder="Votre mot de passe">
    </div>

    <button type="submit" class="btn btn-primary">Créer le compte</button>
</form>


<?php
$content = ob_get_clean();
require "vue/template.php"
?>