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
        // Demander l'affichage du formulaire
        require "vue/cours/add_form.php";
    }

    function ajtCours($nom){
        addCoursbyNom($nom);
        showAllCourses();
    }

