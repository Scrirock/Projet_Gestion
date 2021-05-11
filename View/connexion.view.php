<?php
    include "View/_partials/menu.view.php";

    if(isset($_SESSION['error'])){
        echo "<div class='error'>".$_SESSION['error']."</div>";
        session_destroy();
        session_start();
    }
    else{
        session_destroy();
        session_start();
    }
?>

<div id="divClick"></div>

<div id="formContainer">
    <form action="" method="POST" id="connexionForm">
        <div class="spaceBetweenFlex underlinedFocus">
            <label for="name">Nom: </label>
            <input type="text" id="name" name="name" class="hasFocus">
        </div>
        <div class="spaceBetweenFlex underlinedFocus">
            <label for="password">Mot de passe: </label>
            <input type="password" id="password" name="password" class="hasFocus">
        </div>
        <div id="inputSubmit"><input type="submit" value="Se connecter" id="validate" class="menu"></div>
    </form>
</div>
<script src="/Asset/js/clickButtonConnexion.js" type="module"></script>