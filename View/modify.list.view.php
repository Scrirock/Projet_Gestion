<?php
    include "./View/_partials/menu.view.php";
?>

<h1 class="littleTitle">Modifier la Liste</h1>

<?php if(isset($var['value'])){ ?>
        <form action="" method="POST" class="stockForm">
            <div class="flex">
                <label for="title">Titre: </label>
                <input class="hasFocus" type="text" id="title" name="title" value="<?= $var['value']['title'] ?>">
            </div>
            <div class="flex">
                <label for="content">Chose a faire: </label>
                <textarea class="hasFocus" name="content" id="content" cols="30" rows="10"><?= $var['value']['content'] ?></textarea>
            </div>
            <div>
                <input type="submit" value="Modifier" class="formButton">
            </div>
        </form>
<?php
}

include "./View/_partials/footer.view.php";