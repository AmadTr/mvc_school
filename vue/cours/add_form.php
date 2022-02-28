<?php
    ob_start();
?>

<form action='index.php?action=aCours' method="post">

   <div class="form-group mb-20"> 
        <label for="nom">Entrez le nouveau cours</label>
        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom du Cours">
        <button type="submit" class="btn btn-primary">Ajoutez le Cours</button>
    </div>
</form>

<?php
$content = ob_get_clean();
require "vue/template.php"
?>