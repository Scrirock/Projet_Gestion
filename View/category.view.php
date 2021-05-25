<?php
    include "./View/_partials/menu.view.php";
     if(isset($_GET['error'])){ ?>
         <div class="error">
             <p>Vous ne pouvez pas enlever plus de produit qu'il n'y en a en stock</p>
         </div>
     <?php }
?>

<div id="shoppingBasket">
    <h2 id="basketTitle"><i class="fas fa-shopping-basket" id="basketHover"></i></h2>
    <form action="" method="POST" id="shoppingForm">
        <input type="submit" value="Décompter" class="formButton">
    </form>
</div>

<div id="stockContainer">
    <?php
    if(isset($var['stock'], $var['category'])) {
        foreach ($var['category'] as $category) { ?>
            <div class="categoryLine">
                <div class="categoryName"> <?= $category["name"] ?>
                    <div class="icon">
                        <span class="edit"><i class="far fa-edit"></i></span>
                        <span class="delete"><i class="far fa-trash-alt"></i></span>
                    </div>
                </div>
                <div class="stockLine">
                    <?php
                        foreach ($var['stock'] as $stock){
                            if ($stock['cname'] === $category['name']){ ?>
                                <div class="stockName">
                                    <span class="onlyName"><?= $stock["product_name"] ?></span>
                                    <div class="icon">
                                        <span class="goToBasket"><i class="fas fa-shopping-basket"></i></span>
                                        <span class="editStock"><i class="far fa-edit"></i></span>
                                        <span class="deleteStock"><i class="far fa-trash-alt"></i></span>
                                    </div>
                                </div>
                                <div class="stockDescription" data-name="<?= $stock["product_name"] ?>">
                                    <p class="stock">Stock: <?= $stock['stock'] ?></p>
                                    <p class="description">Description: <?= $stock['description'] ?></p>
                                    <div class="info">
                                        <p class="condition">État: <?= $stock['condition_name'] ?></p>
                                        <p class="provider">Fournisseur: <?= $stock['provider_name'] ?></p>
                                        <div class="location">
                                            <p class="first">Localisation: <?= $stock['location'] ?></p>
                                            <p class="second">2eme loca: <?= $stock['location2'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        }
                    ?>
                </div>
            </div>
            <?php
        }
    } ?>
</div>
<script src="/Asset/js/category.js"></script>