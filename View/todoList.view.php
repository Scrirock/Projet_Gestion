<?php include "View/_partials/menu.view.php" ?>

<div id="todoListContainer">
    <?php
        if (isset($var['list'])){
            foreach ($var['list'] as $list){ ?>
                <div class="littleContainer">
                    <div>
                        <span class="titleList"><?= $list->getTitle() ?></span>
                        <?php
                        if(isset($_SESSION['role']) && $_SESSION['role'] === "admin"){ ?>
                            <a href="/?controller=modifyList&id=<?= $list->getId() ?>" class="editStock"><i class="far fa-edit"></i></a>
                            <a href="/?controller=deleteList&id=<?= $list->getId() ?>" class="deleteStock"><i class="far fa-trash-alt"></i></a>
                        <?php } ?>
                    </div>
                    <div class="contentList"><?= $list->getContent() ?></div>
                </div>
            <?php }
        }
    ?>
</div>

<?php include "./View/_partials/footer.view.php"; ?>
