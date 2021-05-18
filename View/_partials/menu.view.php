<nav>
    <div id="categoryMenu">
        <a href="/">
            <div class="menu"><div class="border">Acceuil</div></div>
        </a>
        <a href="?controller=category">
            <div class="menu"><div class="border">Catégorie</div></div>
        </a>
        <a href="?controller=theme">
            <div class="menu"><div class="border">Thèmes</div></div>
        </a>
        <?php
            if(isset($_SESSION['user']) && $_SESSION['user'] === "admin"){ ?>
                <a href="?controller=addStock">
                    <div class="menu"><div class="border">Ajouter</div></div>
                </a>
            <?php }
        ?>
        <a href="?controller=achievement">
            <div class="menu" id="achievementPage"><div class="border">Achievement</div></div>
        </a>
    </div>
    <div id="other">
        <a href="?controller=connexion" class="buttonNeon menu" id="connexionButton">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Connexion
        </a>
        <div id="searchBar">
            <input type="text" placeholder="Rechercher" id="searchInput">
        </div>
    </div>
</nav>