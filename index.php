<?php
session_start();
    require "model/dbaccess.php";
    require "controller/cours_ctl.php";
    require "controller/etudiants_ctl.php";
    
    function home() {
        $titre = "First MVC: Accueil";
        ob_start();
?>
       <h1>Bienvenue sur My First MVC</h1>

<?php
$content = ob_get_clean();
require "vue/template.php";
}
?>

<?php
    // ROUTER
    // ******
    if(isset($_GET['action'])){
        $action = $_GET['action'];

        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }

        switch ($action) {

            case 'home':
                home();
                break;

            // Affichage Cours et Etudiants
            case 'showCours':
                showAllCourses();
                break;

            case 'showEtudiants':
                showAllEtudiants();
                break;

            // Efface Cours et Etudiants
            case 'dCours':
                deleteCours($id);
            break;
            
            case 'dEtudiants':
                deleteEtudiants($id);
            break;

            // Prepare l'ajout Cours et Etudiants
            case 'addCours':
                ajoutCours();
            break;

            case 'addEtudiants':
                ajoutEtudiants();
            break;

            // Ajoute les Cours et Etudiants
            case 'aCours':
                if(isset($_POST['nom'])){
                    $nom = htmlspecialchars($_POST['nom']);   
                }
                ajtCours($nom);
            break;
            
            case 'aEtudiants':
                if(isset($_POST['nom'])){
                    $nom = htmlspecialchars($_POST['nom']);  
                    $prenom = htmlspecialchars($_POST['prenom']);  
                    $titre = htmlspecialchars($_POST['titre']);  
                    $age = htmlspecialchars($_POST['age']);  
                    $passwd = htmlspecialchars($_POST['passwd']);  
                    $email = htmlspecialchars($_POST['email']);  
                    $ville = htmlspecialchars($_POST['ville']);  
                }
                ajtEtudiants($nom, $prenom, $titre, $age, $passwd, $email, $ville);
            break;
            
            default:
                header("location: index.php?action=home");
        }
    }
    else {
        header("location: index.php?action=home");
    }
?>
