<html>
<?php require_once('head.php');?>

<body>
<div class="container-fluid">
    <?php require_once('headerCo.php');?>
    <div class="row">
        <?php require_once('menu.php');?>
        <section class="col-lg-10">
            <h1>Création d'une liste personnelle</h1>
            <form action="http://localhost/ToutDouxListe/?action=insertPrivateList" method="post">
                <label content="Nom de la liste"/>
                <input type="text" name="list_name"/><br><br>
                <input type="submit" value="Créer la liste">
            </form>
        </section>
    </div>

    <?php require_once('footer.php');?>

</div>

</body>

</html>