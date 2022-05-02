<?php 
session_start(); 
if(isset($_SESSION['table'])) $table = $_SESSION['table'];
?>


<!DOCTYPE html>
<html lang="fr">

    <?php include("./includes/head.inc.html"); ?> 

<body>

    <?php include("./includes/header.inc.html"); ?> 

    <div class="container">
        <div class="row">
            
            <nav class="col-md-3 mt-3">
                <!-- bouton "HOME" -->
                <a role="button" class="btn btn-outline-secondary w-100" href="index.php">Home</a> 
                <!-- Inclu la liste de navigation si le formulaire est rempli -->
                <?php if (isset($table)) include_once './includes/ul.inc.php'; ?>    
            </nav>
            

            <section class="col-md-9 mt-3">         
                    <!-- Include pour le formulaire si on bascule sur ?add -->
                    <?php if(isset($_GET['add'])) {
                        include './includes/form.inc.html';
                    } 
                    elseif(isset($_GET['addmore'])) {
                        include './includes/form2.inc.php';
                    } 

                    elseif(isset($_POST['enregistrer'])) {
                        $prenom = $_POST['user-prenom'];
                        $nom = $_POST['user-nom'];
                        $age = $_POST['user-age'];
                        $taille = $_POST['user-taille'];
                        $sex = $_POST['user-sex'];
                        $table = array(          
                            "first_name" => $prenom,
                            "last_name"  =>  $nom,
                            "age" => $age,
                            "size" => $taille,
                            "civility" => $sex,
                        );

                        $_SESSION["table"] = $table; 
                        echo '<p class="alert-success text-center py-3"> Données sauvegardées</p>';
                        
                       
                    } 
                    else {
                        if (isset($table)) {

                            if(isset($_GET["debugging"])) {
                                echo '<h2 class="text-center">Débogage</h2>';
                                echo "<p>===> Lecture du tableau à l'aide de la fonction print_r()</p>";
                                print "<pre>";
                                print_r($table);
                                print "</pre>";
                            
                            } elseif (isset($_GET['concatenation'])) {

                                echo '<h2 class="text-center">Concaténation</h2><br>';
                
                                echo "<h3 class='fs-5'>===> Construction d'une phrase avec le contenu du tableau :</h3>";
                                $civ = ($table['civility'] == "woman") ? "Mme " :  "Mr ";                               
                                echo "<p> ". $civ . $table["first_name"] . " " . $table["last_name"] . " <br>J'ai " . $table["age"] . " ans et je mesure " . $table['size'] . "m.</p><br><br>";

                                echo "<h3 class='fs-5'>===> Construction d'une phrase après MAJ du tableau :</h3>";
                                $table['first_name'] = ucfirst ($table['first_name']);
                                $table['last_name'] = strtoupper($table['last_name']);                               
                                echo "<p> ". $civ . $table["first_name"] . " " . $table["last_name"] . " <br>J'ai " . $table["age"] . " ans et je mesure " . $table['size'] . "m.</p><br><br>";

                                echo "<h3 class='fs-5'>===> Affichage d'une virgule à la place du point pour la taille :</h3>";                           
                                echo "<p> ". $civ . $table["first_name"] . " " . $table["last_name"] . " <br>J'ai " . $table["age"] . " ans et je mesure " . str_replace('.' , ',', $table['size']) . "m.</p><br><br>";
                
                            
                            } else if (isset($_GET['loop'])) {

                                echo "<h2 class='text-center'>Boucle</h2><br>";
                                echo "<p>===> Lecture du tableau à l'aide d'une boucle foreach</p><br>";
                                $table = $_SESSION['table'];
                                $i = 0;
                                foreach ($table as $x => $value) {
                                    echo '<div>à la ligne n°' . $i . ' correspond la clé "' . $x . '" et contient "' . $value . '"</div>';
                                    $i++;
                                }
                            
                            } else if (isset($_GET['function'])){     

                                echo "<h2 class='text-center'>Fonction</h2><br>";
                                echo "<p>===> J'utilise ma fonction readTable()</p><br>";
                                function readTable(){
                                    $table = $_SESSION['table'];
                                    $i = 0;
                                    foreach ($table as $x => $value) {
                                        echo '<div>à la ligne n°' . $i . ' correspond la clé "' . $x . '" et contient "' . $value . '"</div>';
                                        $i++;
                                    }
                                }  
                                readTable();   
                            
                            } elseif (isset($_GET['del'])) {
                                unset ($_SESSION['table']);
                                if (empty($_SESSION['table'])) {
                                    echo '<p class="alert-success text-center py-3"> Données suprimées</p>';
                                }
                            
                            }else { 
                                echo '<a role="button" class=" btn btn-primary" href="index.php?add">Ajouter des données</a>'; 
                            }  
                        }
                        else { 
                            echo '<a role="button" class=" btn btn-primary" href="index.php?add">Ajouter des données</a> ';
                            echo '<a role="button" class=" btn btn-secondary" href="index.php?addmore">Ajouter plus de données</a>'; 
                        } 
                    }   
                    ?>
            
            </section>
        </div>   
    </div>
    <br>
    <?php include("./includes/footer.inc.html"); ?> 
</body>
</html>