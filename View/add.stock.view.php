<?php
    include "./View/_partials/menu.view.php";
    if(isset($_SESSION['role']) && $_SESSION['role'] === "admin"){
?>
<h1 class="littleTitle">Ajouter le produit</h1>

<form action="" method="POST" class="stockForm">
    <div class="flex">
        <label for="stock">Stock: </label>
        <input class="hasFocus" type="text" id="stock" name="stock">
    </div>
    <div class="flex">
        <label for="stockMin">Stock Minimum: </label>
        <input class="hasFocus" type="text" id="stockMin" name="stockMin">
    </div>
    <div class="flex">
        <label for="name">Nom: </label>
        <input class="hasFocus" type="text" id="name" name="name">
    </div>
    <div class="flex">
        <label for="reference">Reference: </label>
        <input class="hasFocus" type="text" id="reference" name="reference">
    </div>
    <div class="flex">
        <label for="category">Catégorie: </label>
        <select class="hasFocus" name="category" id="category">
            <option value="1">Lange</option>
            <option value="2">Complément alimentaire</option>
            <option value="3">Médical</option>
            <option value="4">EPI</option>
            <option value="5">Gant</option>
            <option value="6">Alphéios</option>
            <option value="7">Savon</option>
            <option value="8">Sac poubelle</option>
            <option value="9">Autre</option>
        </select>
    </div>
    <div class="flex">
        <label for="description">Description: </label>
        <textarea class="hasFocus" name="description" id="description" cols="30" rows="10"></textarea>
    </div>
    <div class="flex">
        <label for="condition">État: </label>
        <select class="hasFocus" id="condition" name="condition">
            <option value="1">neuf</option>
            <option value="2">occasion</option>
        </select>
    </div>
    <div class="flex">
        <label for="provider">Fournisseur: </label>
        <select class="hasFocus" id="provider" name="provider">
            <option value="1">Aldi</option>
            <option value="2">Hubo</option>
            <option value="3">NettoieTruc</option>
        </select>
    </div>
    <div class="flex">
        <label for="location">Localisation: </label>
        <input class="hasFocus" type="text" id="location" name="location">
    </div>
    <div class="flex">
        <label for="location2">Loca2: </label>
        <input class="hasFocus" type="text" id="location2" name="location2">
    </div>
    <div>
        <input type="submit" value="Ajouter" class="formButton">
    </div>
</form>

<?php
}
else{
    echo "<div id='error'>vous n'avez pas la permission d'être ici</div>";
}

include "./View/_partials/footer.view.php";