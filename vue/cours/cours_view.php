<?php
    ob_start();
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
<?php

foreach ($cours as $c) {
    
  echo "  <tr>  
            <td>".$c->getId()."</td>
            <td>".$c->getNom()."</td>
            <td><a class='btn btn-warning ajtCours' href='index.php?action=mCours&id=".$c->getId()."'>Modifier</a>
            <a class='btn btn-danger ajtCours' href='index.php?action=dCours&id=".$c->getId()."'>Supprimer</a>
            </td>
    </tr>";
}
?>
</tbody>
</table>

<?php
echo"<a class='btn btn-primary ajtCours' href='index.php?action=addCours'>Ajoutez un nouveau cours</a>";

$content = ob_get_clean();
require "vue/template.php"
?>
