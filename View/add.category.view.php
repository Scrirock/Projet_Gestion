<?php
    include "./View/_partials/menu.view.php";
    if(isset($_SESSION['role']) && $_SESSION['role'] === "admin"){
?>
<h1 class="littleTitle">Ajouter une catégorie</h1>

<form action="" method="POST" class="stockForm">
    <div class="flex">
        <label for="name">Nom: </label>
        <input class="hasFocus" type="text" id="name" name="name">
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