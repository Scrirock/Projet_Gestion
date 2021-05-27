<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    include "./View/_partials/menu.view.php";
    if(isset($_SESSION['role']) && $_SESSION['role'] === "admin"){
?>

<h1 class="littleTitle">Admin Zone</h1>
<div id="cardContainer">
<?php if(isset($var['user'])){
    foreach ($var['user'] as $user){ ?>
        <div class="userLine">
            <div>
                <span class="username"><?= $user['username'] ?></span>
                <span class="role"><?= $user['role'] ?></span>
            </div>
            <div>
                <a href="/?controller=modifyUser&id=<?= $user["uid"] ?>" class="editUser"><i class="far fa-edit"></i></a>
                <a href="/?controller=deleteUser&id=<?= $user["uid"] ?>" class="deleteUser"><i class="far fa-trash-alt"></i></a>
            </div>
        </div>
<?php
    }
}
?> </div> <?php
}
else{
    echo "<div id='error'>vous n'avez pas la permission d'être ici</div>";
}