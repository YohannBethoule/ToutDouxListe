<?php
/**
 * Created by PhpStorm.
 * User: arkandros
 * Date: 30/11/17
 * Time: 21:07
 */
?>

<html>
<?php require_once('head.php');?>

<body>
<div class="container-fluid">
    <?php require_once('header.php');?>
    <div class="row">
        <?php require_once('menu.php');?>
        <section class="col-lg-10">
            <h1>Bienvenue sur Tout Doux Listes</h1>
            <p>
                Pour créer des listes privées que seul vous pourrez voir et modifier, il vous suffit de créer un compte.
                Indiquez simplement un nom d'utilisateur et un mot de passe:
            </p>
            <form action="http://localhost/ToutDouxListe/" method="post">
                <label id="labelLogin">Login :</label> <br>
                <input type="text" name="username"> <br><br>
                <label id="labelMdp">Mot de passe :</label> <br>
                <input type="password" name="password"> <br> <br>
                <input type="submit" value="Je m'inscris">
                <input type="hidden" name="action" value="insertUser">
            </form>
        </section>
    </div>

    <?php require_once('footer.php');?>

</div>

</body>

</html>

