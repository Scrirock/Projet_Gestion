<?php
    include "./View/_partials/menu.view.php";
     if(isset($_GET['error'])){ ?>
         <div class="error">
             <p>Les stock on été décompter mais certain sont passé dans le négatif. Faites attention</p>
         </div>
     <?php }
?>

<div id="shoppingBasket">
    <h2 id="basketTitle"><i class="fas fa-shopping-basket" id="basketHover"></i></h2>
    <form action="" method="POST" id="shoppingForm">
        <input type="submit" value="Décompter" class="formButton" id="basketButton">
    </form>
</div>

<div id="stockContainer">
    <?php
    if(isset($var['stock'], $var['category'])) {
        foreach ($var['category'] as $category) { ?>
            <div class="categoryLine">
                <div class="categoryName"> <?= $category["name"] ?>
                    <div class="icon">
                        <?php
                        if(isset($_SESSION['role']) && $_SESSION['role'] === "admin"){ ?>
                            <a href="/?controller=modifyCategory&id=<?= $category["id"] ?>" class="edit"><i class="far fa-edit"></i></a>
                            <a href="/?controller=deleteCategory&id=<?= $category["id"] ?>" class="delete"><i class="far fa-trash-alt"></i></a>
                        <?php } ?>
                    </div>
                </div>
                <div class="neonCategory"></div>
                <div class="stockLine">
                    <?php
                        foreach ($var['stock'] as $stock){
                            if ($stock['cname'] === $category['name']){ ?>
                                <div class="stockName">
                                    <span class="onlyName"><?= $stock["product_name"] ?></span>
                                    <div class="icon">
                                        <?php
                                        if(isset($_SESSION['role']) && $_SESSION['role'] === "admin"){ ?>
                                            <span class="goToBasket"><i class="fas fa-shopping-basket"></i></span>
                                            <a href="/?controller=modifyProduct&id=<?= $stock["sid"] ?>" class="editStock"><i class="far fa-edit"></i></a>
                                            <a href="/?controller=deleteProduct&id=<?= $stock["sid"] ?>" class="deleteStock"><i class="far fa-trash-alt"></i></a>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="stockDescription" data-name="<?= $stock["product_name"] ?>">
                                    <a href="/?controller=oneProduct&id=<?= $stock["sid"] ?>">
                                    <p class="stock">Stock: <?= $stock['stock'] ?></p>
                                    <p class="stock">Stock Minimum: <?= $stock['stockMin'] ?></p>
                                    <p class="description">Description: <?= $stock['description'] ?></p>
                                    <div class="info">
                                        <p class="condition">État: <?= $stock['condition_name'] ?></p>
                                        <p class="provider">Fournisseur: <?= $stock['provider_name'] ?></p>
                                        <div class="location">
                                            <p class="first">Localisation: <?= $stock['location'] ?></p>
                                            <p class="second">2eme loca: <?= $stock['location2'] ?></p>
                                        </div>
                                    </div>
                                    </a>
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