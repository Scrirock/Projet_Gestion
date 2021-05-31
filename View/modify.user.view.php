<?php
    include "./View/_partials/menu.view.php";
    if(isset($_SESSION['role']) && $_SESSION['role'] === "admin"){
?>
    <?php if(isset($var['value'])){ ?>
        <h1 class="littleTitle">Modifier <?= $var['value']->getName() ?></h1>
    <?php }
?>
    <form action="" method="POST" class="stockForm">
        <div class="flex">
            <label for="name">Nom: </label>
            <input type="text" name="name" id="name" value="<?= $var['value']->getName() ?>">
        </div>
        <div class="flex">
            <label for="role">Role: </label>
            <select name="role" id="role">
                <option value="1">Admin</option>
                <option value="2">Directrice</option>
                <option value="3">Ouvrier</option>
                <option value="4">Cuisinier</option>
                <option value="5">Entretient</option>
                <option value="6">Invité</option>
            </select>
        </div>
        <div>
            <input type="submit" value="Modifier" class="formButton">
        </div>
    </form>
<?php
}
else{
    echo "<div id='error'>vous n'avez pas la permission d'être ici</div>";
}

include "./View/_partials/footer.view.php";