<?php include "./View/_partials/menu.view.php";

if(isset($_SESSION['user'])) echo "<div class='error'>".$_SESSION['user']."</div>";
if(isset($_SESSION['name'])) echo "<div class='error'>".$_SESSION['name']."</div>";
