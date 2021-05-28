<?php
    include "./View/_partials/menu.view.php";
    if(isset($var['value'])){ ?>
        <div id="searchContainer">
        <?php foreach ($var['value'] as $stock){
            $name = str_replace($var['search'] ,"<span class='bold'>".$var['search']."</span>", $stock["product_name"])
           ?><div class="oneProduct" data-name="<?= $stock["product_name"] ?>">
                <p class="">Catégorie: <?= $stock["cname"] ?></p>
                <p class="">Nom: <?= $name ?></p>
                <p class="">Stock: <?= $stock['stock'] ?></p>
                <p class="">Stock Minimum: <?= $stock['stockMin'] ?></p>
                <p class="">Description: <?= $stock['description'] ?></p>
                <div class="">
                    <p class="">État: <?= $stock['condition_name'] ?></p>
                    <p class="">Fournisseur: <?= $stock['provider_name'] ?></p>
                    <div class="">
                        <p class="">Localisation: <?= $stock['location'] ?></p>
                        <p class="">2eme loca: <?= $stock['location2'] ?></p>
                    </div>
                </div>
            </div>
        <?php }
        echo "</div>";
    }