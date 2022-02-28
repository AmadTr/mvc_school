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

        if (isset($_GET['id'])) {
           $rep= getStudentById($_GET['id']);
        }

        // Demander l'affichage du formulaire
        require "vue/etudiants/add_formE.php";
    }

    function ajtOuModifEtudiants($nom, $prenom, $titre, $age, $passwd, $email, $ville){
        if (isset($_GET['id'])){
            updateEtudiants($_GET['id'],$nom, $prenom, $titre, $age, $passwd, $email, $ville);
         }
        else {
            addEtudiantsbyNom($nom, $prenom, $titre, $age, $passwd, $email, $ville);
        }
        showAllEtudiants();
    }

