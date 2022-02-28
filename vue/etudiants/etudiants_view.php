<?php
    ob_start();
?>
<table class="table">
  <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nom Complet</th>
        <th scope="col">Email</th>
        <th scope="col">Age</th>
        <th scope="col">Titre</th>
        <th scope="col">Ville</th>
        <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
<?php

foreach ($etudiants as $e) {
    
  echo "  <tr>  
            <td>".$e->getId()."</td>
            <td>".$e->getFullname()."</td>
            <td>".$e->getEmail()."</td>
            <td>".$e->getAge()."</td>
            <td>".$e->getTitre()."</td>
            <td>".$e->getVille()."</td>

            <td>
            <a class='btn btn-warning ajtCours' href='index.php?action=mEtudiants&id=".$e->getId()."'>Modifier</a>
            <a class='btn btn-danger ajtCours' href='index.php?action=dEtudiants&id=".$e->getId()."'>Supprimer</a>
            </td>
    </tr>";
}
?>
</tbody>
</table>

<?php
echo"<a class='btn btn-primary ajtCours' href='index.php?action=addEtudiants'>Ajoutez un nouvelle eleve</a>";

$content = ob_get_clean();
require "vue/template.php"
?>