<h1 class="text-center">Ajouter plus de données</h1>
<div class="container">
        <div class="row">
    <form class="card col-md-7 mx-auto my-1" action="index.php" method="POST">
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
    </form>

    <form class="card col-md-4 mx-auto my-1" action="index.php" method="POST">
    <p class="mb-0">Connaissances</p>
    <div class="form-check">
    <input class="form-check-input" type="checkbox" value="html" id="flexCheckDefault">
    <label class="form-check-label" for="flexCheckDefault">
        HTML
    </label>
    </div>
    <div class="form-check">
    <input class="form-check-input" type="checkbox" value="css" id="flexCheck" >
    <label class="form-check-label" for="flexCheck">
        CSS
    </label>
    </div>
    <div class="form-check">
    <input class="form-check-input" type="checkbox" value="js" id="flexCheckDefault">
    <label class="form-check-label" for="flexCheckDefault">
        JavaScript
    </label>
    </div>
    <div class="form-check">
    <input class="form-check-input" type="checkbox" value="php" id="flexCheck" >
    <label class="form-check-label" for="flexCheck">
        PHP
    </label>
    </div>
    <div class="form-check">
    <input class="form-check-input" type="checkbox" value="sql" id="flexCheckDefault">
    <label class="form-check-label" for="flexCheckDefault">
        MySQL
    </label>
    </div>
    <div class="form-check">
    <input class="form-check-input" type="checkbox" value="boot" id="flexCheck" >
    <label class="form-check-label" for="flexCheck">
        Bootstrap
    </label>
    </div>
    <div class="form-check">
    <input class="form-check-input" type="checkbox" value="react" id="flexCheckDefault">
    <label class="form-check-label" for="flexCheckDefault">
        React
    </label>
    </div>
    <div class="form-check">
    <input class="form-check-input" type="checkbox" value="sym" id="flexCheck" >
    <label class="form-check-label" for="flexCheck">
        Symfony
    </label>
    </div>

    <div>
    <p class="mt-3 mb-0">Couleur préférée</p>
        <input type="color" id="color" name="color" value="#000">
        <label for="color"></label>
    </div>

    <div>
    <p class="mt-3 mb-0">Date de naissance</p>
    <input type="date" name="born" id="date" placeholder="dd-mm-yyyy" value="">
    <label for="date"></label>
    </div>
</form>

<form class="card col-11 mx-auto my-1" action="index.php" method="POST">
    <div>
        <p class="mt-3 mb-0">Joindre une image (jpg ou png)</p>
        <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg">
        <label for="avatar"></label>
    </div>
</form>
    </div>
</div>

<button name="enregistrer" type="submit" class="btn btn-primary float-end">Enregistrer les données</button>