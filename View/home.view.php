<?php
    include "./View/_partials/menu.view.php";

    if(isset($_SESSION['user'])) echo "<div class='error'>".$_SESSION['user']."</div>";
    if(isset($_SESSION['name'])) echo "<div class='error'>".$_SESSION['name']."</div>";
?>

<div id="stockContainer">
    <?php
    if(isset($var['stock'])) {
        foreach ($var['stock'] as $stock) { ?>
            <div class='stockCard'>
                <p class="title"><span class="name"><?= $stock['nom'] ?></span><span class="ref"><?= $stock['reference'] ?></span></p>
                <p class="stock">Stock: <?= $stock['stock'] ?></p>
                <div class="description">
                    <p class="category">Catégorie: <?= $stock['name'] ?></p>
                    Description: <?= $stock['description'] ?>
                </div>
                <div class="info">
                    <p class="condition">État: <?= $stock['etat'] ?></p>
                    <p class="provider">Fournisseur: <?= $stock['fournisseur'] ?></p>
                    <p class="location">
                        <span class="first">Localisation: <?= $stock['localisation'] ?></span>
                        <span class="second">2eme loca: <?= $stock['loca2oO'] ?></span>
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