<header class="row">
    <div class="col-lg-8">
        <h1><a href="index.php">Tout Doux Liste</a><h1>
    </div>
    <div class="col-lg-4" style="text-align: right">
        <?php
        if(!isset($_SESSION['user'])){
            echo "<a href='?action=signIn'>Connexion</a> <br>";
            echo "<a href='?action=signUp'>Inscription</a>";
        }else{
            echo Validation::nettoyer_string($_SESSION['user']). "<br/>";
            echo "<a href='?action=disconnect'>Deconnexion</a> <br>";
        }

        ?>
    </div>
</header>