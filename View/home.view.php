<?php include "./View/_partials/menu.view.php"; ?>

<div id="stockContainer">
    <?php
    if(isset($var['stock'])) {
        foreach ($var['stock'] as $stock) { ?>
            <div class='stockCard'>
                <p class="title"><span class="name"><?= $stock['product_name'] ?></span><span class="ref"><?= $stock['reference'] ?></span></p>
                <p class="stock">Stock: <?= $stock['stock'] ?></p>
                <div class="description">
                    <p class="category">Catégorie: <?= $stock['cname'] ?></p>
                    Description: <?= $stock['description'] ?>
                </div>
                <div class="info">
                    <p class="condition">État: <?= $stock['condition_name'] ?></p>
                    <p class="provider">Fournisseur: <?= $stock['provider_name'] ?></p>
                    <p class="location">
                        <span class="first">Localisation: <?= $stock['location'] ?></span>
                        <span class="second">2eme loca: <?= $stock['location2'] ?></span>
                    </p>
                </div>
                <?php
                if(isset($_SESSION['user']) && $_SESSION['user'] === "admin"){ ?>
                    <a href="?controller=modifyCard&id=<?= $stock['sid'] ?>" class="modifyButtonCard">Modifier</a>
                <?php } ?>
            </div>
            <?php
        }
    } ?>
</div>