<h1 class="text-center">Ajouter plus de données</h1>
<form action="index.php" method="POST" enctype="multipart/form-data">
<div class="container">
        <div class="row">
           
    <div class="card col-md-7 mx-auto my-1">
        <div class="form-floating mx-2 my-1">
            <input type="text" class="form-control" id="prenom" name="user-prenom" placeholder="Prénom" required>
            <label for="floatingInput">Prénom</label>
        </div>
        <br>
        <div class="form-floating mx-2 my-1">
            <input type="text" class="form-control" id="nom" name="user-nom" placeholder="Nom" required> 
            <label for="floatingInput">Nom</label>
        </div>
        <br>
        <div class="form-group mx-2 my-1">
            <label for="age">Age(18 à 70 ans)</label>
            <input type="number" min="18" max="70" class="form-control" id="age" name="user-age" placeholder="Renseignez votre âge" required>
        </div>
        <br> 
        <div class="input-group">
            <div class="input-group-prepend ms-2">
                <div class="input-group-text">Taille (1,26 à 3m)</div>
            </div>   
                <input type="number" min="1.26" max="3" step="0.01" class="form-control" id="taille" name="user-taille" placeholder="1,7" required>
            <div class="input-group-prepend me-2">
                <div class="input-group-text">m</div>
            </div>
        </div>
            <br>
            <div class="w-100">
            <div class="form-check form-check-inline mx-2">
                <input class="form-check-input" type="radio" id="sexf" name="user-sex" value="woman" required>
                <label class="form-check-label" for="inlineRadios1">
                Femme
                </label>
            </div>
            <div class="form-check form-check-inline mx-2">
                <input class="form-check-input" type="radio" id="sexh" name="user-sex" value="man" required>
                <label class="form-check-label" for="inlineRadios2">
                Homme
                </label>
            </div>
            </div>
            <br>
    </div>

    <div class="card col-md-4 mx-auto my-1">
    <p class="mb-0">Connaissances</p>
    <div class="form-check">
    <input class="form-check-input" type="checkbox" name="html" value="html5" id="flexCheckDefault">
    <label class="form-check-label" for="flexCheckDefault">
        HTML
    </label>
    </div>
    <div class="form-check">
    <input class="form-check-input" type="checkbox" name="css" value="css3" id="flexCheck" >
    <label class="form-check-label" for="flexCheck">
        CSS
    </label>
    </div>
    <div class="form-check">
    <input class="form-check-input" type="checkbox" name="javascript" value="javascript" id="flexCheckDefault">
    <label class="form-check-label" for="flexCheckDefault">
        JavaScript
    </label>
    </div>
    <div class="form-check">
    <input class="form-check-input" type="checkbox" name="php" value="php" id="flexCheck" >
    <label class="form-check-label" for="flexCheck">
        PHP
    </label>
    </div>
    <div class="form-check">
    <input class="form-check-input" type="checkbox" name="mysql" value="mysql" id="flexCheckDefault">
    <label class="form-check-label" for="flexCheckDefault">
        MySQL
    </label>
    </div>
    <div class="form-check">
    <input class="form-check-input" type="checkbox" name="bootstrap" value="bootstrap" id="flexCheck" >
    <label class="form-check-label" for="flexCheck">
        Bootstrap
    </label>
    </div>
    <div class="form-check">
    <input class="form-check-input" type="checkbox" name="symfony" value="symfony" id="flexCheckDefault">
    <label class="form-check-label" for="flexCheckDefault">
        Symfony
    </label>
    </div>
    <div class="form-check">
    <input class="form-check-input" type="checkbox" name="react" value="react" id="flexCheck" >
    <label class="form-check-label" for="flexCheck">
        React
    </label>
    </div>

    <div>
    <p class="mt-3 mb-0">Couleur préférée</p>
        <input type="color" id="color" name="color" value="#000">
        <label for="color"></label>
    </div>

    <div>
    <p class="mt-3 mb-0">Date de naissance</p>
    <input type="date" name="dob" id="dob" placeholder="dd-mm-yyyy" value="">
    <label for="date"></label>
    </div>
</div>

<div class="card col-11 mx-auto my-1">
    <div>
        <p class="mt-3 mb-0">Joindre une image (jpg ou png)</p>
        <input type="file" id="img" name="img" accept="image/png, image/jpeg">
        
    </div>
    
</div>
<button name="enregistrer" type="submit" class="btn btn-primary float-end">Enregistrer les données</button>
    
    </div>
</div>
</form>


