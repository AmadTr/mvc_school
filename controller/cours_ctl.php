<?php
   require "model/cours.php";
   /**
    * showCourses
    * Affiche la liste des cours 
    * @return array
    */
   function showAllCourses() {
       // Rechercher la liste des cours
       // Appel du model cours
       $cours = getAllCours();

       // Demander l'affichage des cours
       // appel de la vue
       require "vue/cours/cours_view.php";
   }

    function deleteCours($id){
       $ret = dCoursById($id);
       showAllCourses();
    }

    function ajoutCours(){

        if (isset($_GET['id'])) {    

        $rep = getNomCoursById($_GET['id']);
        }
        // Demander l'affichage du formulaire
        require "vue/cours/add_form.php";
    }

    function ajtOuModifCours($nom){
        if (isset($_GET['id'])){
           updateCours($_GET['id'],$nom);
        }
        else{

            addCoursbyNom($nom);
        }
        showAllCourses();
    }

