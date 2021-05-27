<?php
    include "./View/_partials/menu.view.php";
    if(isset($_SESSION['role']) && $_SESSION['role'] === "admin"){
?>

<h1 class="littleTitle">Modifier la catégorie</h1>

<?php if(isset($var['value'])){
    foreach ($var['value'] as $value){ ?>
        <form action="" method="POST" class="stockForm">
            <div class="flex">
                <label for="name">Nom: </label>
                <input class="hasFocus" type="text" id="name" name="name" value="<?= $value['name'] ?>">
            </div>
            <div>
                <input type="submit" value="Modifier" class="formButton">
            </div>
        </form>
<?php
    }
}
}
else{
    echo "<div id='error'>vous n'avez pas la permission d'être ici</div>";
}