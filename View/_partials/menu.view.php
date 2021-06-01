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
        <a href="?controller=toDoList">
            <div class="menu"><div class="border twoWord">ToDo List</div></div>
        </a>
        <?php
            if(isset($_SESSION['role']) && $_SESSION['role'] === "admin"){ ?>
                <div class="dropDown menu"><div class="border">Ajouter</div>
                    <div class="under">
                        <a href="?controller=addStock">Un produit</a>
                        <a href="?controller=addCategory">Une catégorie</a>
                        <a href="?controller=addList">Une TODO liste</a>
                    </div>
                </div>
                <a href="/?controller=adminPanel">
                    <div class="adminPanel menu"><div class="border twoWord">Admin Zone</div></div>
                </a>
            <?php }
        ?>
        <a href="?controller=achievement">
            <div class="menu" id="achievementPage"><div class="border">Achievement</div></div>
        </a>
    </div>
    <div id="other">
        <div id="divConnexion">
            <a href="?controller=connexion" class="buttonNeon menu" id="connexionButton">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Connexion
            </a>
            <?php if (isset($_SESSION['name'])) echo "<p>Vous êtes connecté en tant que ".$_SESSION['name']."</p>" ?>
        </div>
        <div id="searchBar">
            <input type="text" placeholder="Rechercher" id="searchInput">
        </div>
    </div>
</nav>