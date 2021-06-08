<?php
    include "./View/_partials/menu.view.php";
    if(isset($_SESSION['role']) && $_SESSION['role'] === "admin"){
?>

<h1 class="littleTitle">Ajouter une Liste</h1>

<form action="" method="POST" class="stockForm">
    <div class="flex">
        <label for="title">Titre: </label>
        <input class="hasFocus" type="text" id="title" name="title">
    </div>
    <div class="flex">
        <label for="content">Chose a faire: </label>
        <textarea class="hasFocus" name="content" id="content" cols="30" rows="10"></textarea>
    </div>
    <div>
        <input type="submit" value="Ajouter" class="formButton">
    </div>
</form>


<?php
    }
    else{
            echo "<div id='error'>vous n'avez pas la permission d'être ici</div>";
        }
    include "./View/_partials/footer.view.php";