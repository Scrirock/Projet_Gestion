<?php
    include "./View/_partials/menu.view.php";
?>

<h1 class="littleTitle">Modifier le produit</h1>

<?php if(isset($var['value'])){
    foreach ($var['value'] as $value){ ?>
        <form action="" method="POST" id="stockModifyForm">
            <div class="flex">
                <label for="stock">Stock: </label>
                <input type="text" id="stock" name="stock" value="<?= $value['stock'] ?>">
            </div>
            <div class="flex">
                <label for="name">Nom: </label>
                <input type="text" id="name" name="name" value="<?= $value['nom'] ?>">
            </div>
            <div class="flex">
                <label for="reference">Reference: </label>
                <input type="text" id="reference" name="reference" value="<?= $value['reference'] ?>">
            </div>
            <div class="flex">
                <label for="category">Catéorie: </label>
                <select name="category" id="category">
                    <option value="1">Fruit</option>
                    <option value="2">Meuble</option>
                    <option value="3">Sanitaire</option>
                </select>
            </div>
            <div class="flex">
                <label for="description">Description: </label>
                <textarea name="description" id="description" cols="30" rows="10"><?= $value['description'] ?></textarea>
            </div>
            <div class="flex">
                <label for="condition">État: </label>
                <input type="text" id="condition" name="condition" value="<?= $value['etat'] ?>">
            </div>
            <div class="flex">
                <label for="provider">Fournisseur: </label>
                <input type="text" id="provider" name="provider" value="<?= $value['fournisseur'] ?>">
            </div>
            <div class="flex">
                <label for="location">Localisation: </label>
                <input type="text" id="location" name="location" value="<?= $value['localisation'] ?>">
            </div>
            <div class="flex">
                <label for="location2">Loca2: </label>
                <input type="text" id="location2" name="location2" value="<?= $value['loca2oO'] ?>">
            </div>
            <div>
                <input type="submit" value="Modifier" class="modifyButtonCard">
            </div>
        </form>
<?php
    }
}