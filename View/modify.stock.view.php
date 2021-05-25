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
                <label for="stockMin">Stock Minimum: </label>
                <input class="hasFocus" type="text" id="stockMin" name="stockMin" value="<?= $value['stockMin'] ?>">
            </div>
            <div class="flex">
                <label for="name">Nom: </label>
                <input class="hasFocus" type="text" id="name" name="name" value="<?= $value['product_name'] ?>">
            </div>
            <div class="flex">
                <label for="reference">Reference: </label>
                <input class="hasFocus" type="text" id="reference" name="reference" value="<?= $value['reference'] ?>">
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
                <textarea class="hasFocus" name="description" id="description" cols="30" rows="10"><?= $value['description'] ?></textarea>
            </div>
            <div class="flex">
                <label for="condition">État: </label>
                <select class="hasFocus" type="text" id="condition" name="condition">
                    <option value="1">neuf</option>
                    <option value="2">occasion</option>
                </select>
            </div>
            <div class="flex">
                <label for="provider">Fournisseur: </label>
                <select class="hasFocus" type="text" id="provider" name="provider">
                    <option value="1">Aldi</option>
                    <option value="2">Hubo</option>
                    <option value="3">NettoieTruc</option>
                </select>
            </div>
            <div class="flex">
                <label for="location">Localisation: </label>
                <input class="hasFocus" type="text" id="location" name="location" value="<?= $value['location'] ?>">
            </div>
            <div class="flex">
                <label for="location2">Loca2: </label>
                <input class="hasFocus" type="text" id="location2" name="location2" value="<?= $value['location2'] ?>">
            </div>
            <div>
                <input type="submit" value="Modifier" class="formButton">
            </div>
        </form>
<?php
    }
}