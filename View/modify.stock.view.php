<?php
    include "./View/_partials/menu.view.php";
?>

<h1 class="littleTitle">Modifier le produit</h1>

<?php if(isset($var['value'])){
    foreach ($var['value'] as $value){ ?>
        <form action="" method="POST" class="stockForm">
            <div class="flex">
                <label for="stock">Stock: </label>
                <input class="hasFocus" type="text" id="stock" name="stock" value="<?= $value['stock'] ?>">
            </div>
            <div class="flex">
                <label for="name">Nom: </label>
                <input class="hasFocus" type="text" id="name" name="name" value="<?= $value['nom'] ?>">
            </div>
            <div class="flex">
                <label for="reference">Reference: </label>
                <input class="hasFocus" type="text" id="reference" name="reference" value="<?= $value['reference'] ?>">
            </div>
            <div class="flex">
                <label for="category">Catégorie: </label>
                <select class="hasFocus" name="category" id="category">
                    <option value="1">Fruit</option>
                    <option value="2">Meuble</option>
                    <option value="3">Sanitaire</option>
                </select>
            </div>
            <div class="flex">
                <label for="description">Description: </label>
                <textarea class="hasFocus" name="description" id="description" cols="30" rows="10"><?= $value['description'] ?></textarea>
            </div>
            <div class="flex">
                <label for="condition">État: </label>
                <input class="hasFocus" type="text" id="condition" name="condition" value="<?= $value['etat'] ?>">
            </div>
            <div class="flex">
                <label for="provider">Fournisseur: </label>
                <input class="hasFocus" type="text" id="provider" name="provider" value="<?= $value['fournisseur'] ?>">
            </div>
            <div class="flex">
                <label for="location">Localisation: </label>
                <input class="hasFocus" type="text" id="location" name="location" value="<?= $value['localisation'] ?>">
            </div>
            <div class="flex">
                <label for="location2">Loca2: </label>
                <input class="hasFocus" type="text" id="location2" name="location2" value="<?= $value['loca2oO'] ?>">
            </div>
            <div>
                <input type="submit" value="Modifier" class="formButton">
            </div>
        </form>
<?php
    }
}