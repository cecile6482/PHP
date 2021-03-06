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
                    <?php 
                    if(isset($_GET['add'])) {
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
                        $html = $_POST['html'];
                        $css = $_POST['css'];
                        $javascript = $_POST['javascript'];
                        $php = $_POST['php'];
                        $mysql = $_POST['mysql'];
                        $bootstrap = $_POST['bootstrap'];
                        $symfony = $_POST['symfony'];
                        $react = $_POST['react'];
                        $color = $_POST['color'];
                        $dob = $_POST['dob'];
                        $img=$_FILES['img'];
                        $file_name = $_FILES['img']['name'];
                        $file_type = $_FILES['img']['type'];
                        $file_tmp = $_FILES['img']['tmp_name'];
                        $file_error = $_FILES['img']['error'];
                        $file_size = $_FILES['img']['size'];
                        $file_ext=strtolower(end(explode('.',$_FILES['img']['name'])));
                        $extensions= array("jpg","png");
                        $table_all = array(          
                            "first_name" => $prenom,
                            "last_name"  =>  $nom,
                            "age" => $age,
                            "size" => $taille,
                            "civility" => $sex,
                            "html" => $html,
                            "css" => $css,
                            "javascript" => $javascript,
                            "php" => $php,
                            "mysql" => $mysql,
                            "bootstrap" => $bootstrap,
                            "symfony" => $symfony,
                            "react" => $react,
                            "color" => $color,
                            "dob" => $dob,
                            "img" => array(
                                "name" => $file_name,
                                "type" => $file_type,
                                "tmp_name" => $file_tmp,
                                "error" => $file_error,
                                "size" => $file_size,
                            )
                            
                        );
                        $errors= array();


                        if(isset($img) && isset($file_error)) {
                            if ($file_error == 4) {
                                echo "<p class='alert-danger text-center py-3'>Aucun fichier n'a ??t?? t??l??charg??</p>";
                                exit;
                            }

                            if($file_error == 1) {
                                echo "<p class='alert-danger text-center py-3'>La taille de l'image doit ??tre inf??rieur ?? 2Mo</p>";
                            }

                            if($file_error == 2 || $file_error == 3 || $file_error == 6 || $file_error == 7) {
                                echo "<p class='alert-danger text-center py-3'>erreur: '.$file_error.' </p>";
                            }

                            if((in_array($file_ext,$extensions) == false)){
                                echo "<p class='alert-danger text-center py-3'>Extension $file_type non prise en charge</p>";
                            }

                        }

                        elseif(isset($img) && $file_error == 0) {
                            move_uploaded_file($file_tmp,"./uploaded/".$file_name);
                            $table = array_filter($table_all);
                            $_SESSION['table'] = $table;
                            echo '<p class="alert-success text-center py-3"> Donn??es sauvegard??es</p>';
                        }

                        

                        
                    } 

                    else {
                        if (isset($table)) {

                            if(isset($_GET["debugging"])) {
                                echo '<h2 class="text-center">D??bogage</h2>';
                                echo "<p>===> Lecture du tableau ?? l'aide de la fonction print_r()</p>";
                                print "<pre>";
                                print_r($table);
                                print "</pre>";
                            
                            } elseif (isset($_GET['concatenation'])) {

                                echo '<h2 class="text-center">Concat??nation</h2><br>';
                
                                echo "<h3 class='fs-5'>===> Construction d'une phrase avec le contenu du tableau :</h3>";
                                $civ = ($table['civility'] == "woman") ? "Mme " :  "Mr ";                               
                                echo "<p> ". $civ . $table["first_name"] . " " . $table["last_name"] . " <br>J'ai " . $table["age"] . " ans et je mesure " . $table['size'] . "m.</p><br><br>";

                                echo "<h3 class='fs-5'>===> Construction d'une phrase apr??s MAJ du tableau :</h3>";
                                $table['first_name'] = ucfirst ($table['first_name']);
                                $table['last_name'] = strtoupper($table['last_name']);                               
                                echo "<p> ". $civ . $table["first_name"] . " " . $table["last_name"] . " <br>J'ai " . $table["age"] . " ans et je mesure " . $table['size'] . "m.</p><br><br>";

                                echo "<h3 class='fs-5'>===> Affichage d'une virgule ?? la place du point pour la taille :</h3>";                           
                                echo "<p> ". $civ . $table["first_name"] . " " . $table["last_name"] . " <br>J'ai " . $table["age"] . " ans et je mesure " . str_replace('.' , ',', $table['size']) . "m.</p><br><br>";
                
                            
                            } else if (isset($_GET['loop'])) {

                                echo "<h2 class='text-center'>Boucle</h2><br>";
                                echo "<p>===> Lecture du tableau ?? l'aide d'une boucle foreach</p><br>";
                                $table = $_SESSION['table'];
                                $i = 0;
                                foreach ($table as $x => $value) {
                                    if ($x == 'img') {
                                    unset($value);
                                    echo '<div>?? la ligne n??' . $i . ' correspond la cl?? "' . $x . '" et contient</div>';
                                    echo "<img class='w-100' src='./uploaded/".$table['img']['name']."'>"; 
                                    } else {
                                    echo '<div>?? la ligne n??' . $i . ' correspond la cl?? "' . $x . '" et contient "' . $value . '"</div>';
                                    $i++;
                                    }
                                }
                            
                            } else if (isset($_GET['function'])){     

                                echo "<h2 class='text-center'>Fonction</h2><br>";
                                echo "<p>===> J'utilise ma fonction readTable()</p><br>";
                                function readTable(){
                                    $table = $_SESSION['table'];
                                    $i = 0;
                                    
                                    foreach ($table as $x => $value) {
                                        if ($x == 'img') {
                                        unset($value);
                                        echo '<div>?? la ligne n??' . $i . ' correspond la cl?? "' . $x . '" et contient</div>';
                                        echo "<img class='w-100' src='./uploaded/".$table['img']['name']."'>"; 
                                        } else {
                                        echo '<div>?? la ligne n??' . $i . ' correspond la cl?? "' . $x . '" et contient "' . $value . '"</div>';
                                        $i++;
                                        }
                                    }
                                    
                                }  
                                readTable();   
                                
                                    

                                
                            } elseif (isset($_GET['del'])) {
                                unset ($_SESSION['table']);
                                $pic = "./uploaded/".$table['img']['name'];
                                unlink($pic);
                                if (empty($_SESSION['table'])) {
                                    echo '<p class="alert-success text-center py-3"> Donn??es suprim??es</p>';
                                }
                            
                            }else { 
                                echo '<a role="button" class=" btn btn-primary" href="index.php?add">Ajouter des donn??es</a>'; 
                                echo '<a role="button" class=" btn btn-secondary ms-2" href="index.php?addmore">Ajouter plus de donn??es</a>'; 
                            }  
                        }
                        else { 
                            echo '<a role="button" class=" btn btn-primary" href="index.php?add">Ajouter des donn??es</a> ';
                            echo '<a role="button" class=" btn btn-secondary ms-2" href="index.php?addmore">Ajouter plus de donn??es</a>'; 
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