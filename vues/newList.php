<?php
/**
 * Created by PhpStorm.
 * User: arkandros
 * Date: 28/11/17
 * Time: 21:28
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
            <h1>Création d'une liste</h1>
            <form action="http://localhost/ToutDouxListe/?action=insertList" method="post">
                <label content="Nom de la liste"/>
                <input type="text" name="list_name"/><br><br>
                <?php
                    if(isset($_SESSION['user'])){
                        echo "<label content='Rendre publique'/>";
                        echo "<input type='checkbox' name='checkPublic'/>";
                    }
                ?>
                <input type="submit" value="Créer la liste">
            </form>
        </section>
    </div>

    <?php require_once('footer.php');?>

</div>

</body>

</html>


