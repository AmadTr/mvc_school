<?php
   require "model/etudiants.php";
   /**
    * showCourses
    * Affiche la liste des cours 
    * @return array
    */
   function showAllEtudiants() {
       // Rechercher la liste des cours
       // Appel du model cours
       $etudiants = getAllEtudiants();

       // Demander l'affichage des cours
       // appel de la vue
       require "vue/etudiants/etudiants_view.php";
   }

    function deleteEtudiants($id){
       $ret = dEtudiantsById($id);
       showAllEtudiants();
    }

    function ajoutEtudiants(){
        // Demander l'affichage du formulaire
        require "vue/etudiants/add_formE.php";
    }

    function ajtEtudiants($nom, $prenom, $titre, $age, $passwd, $email, $ville){
        addEtudiantsbyNom($nom, $prenom, $titre, $age, $passwd, $email, $ville);
        showAllEtudiants();
    }

