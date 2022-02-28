<?php
    ob_start();



if (isset($_GET['id'])) {
    $id = $rep ->getId();
    $link = "index.php?action=ajtOuMCours&id=$id";
    $btn ='Modifiez le Cours';
    $nom = $rep->getNom();
}
else{
    $link = 'index.php?action=ajtOuMCours';
    $btn ='Ajoutez le Cours';
    $nom ='';
}

?>

<form action=<?= $link ?> method="post">

   <div class="form-group mb-20"> 
        <label for="nom">Nom du cours</label>
        <input type="text" class="form-control" id="nom" name="nom" placeholder=<?= $nom ?>>
        <button type="submit" class="btn btn-primary"><?= $btn ?></button>
    </div>
</form>

<?php
$content = ob_get_clean();
require "vue/template.php";
?>