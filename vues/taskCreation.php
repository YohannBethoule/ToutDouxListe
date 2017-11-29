<?php
/**
 * Created by PhpStorm.
 * User: arkandros
 * Date: 29/11/17
 * Time: 15:49
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
            <h1>Ajout d'une tâche</h1>
            <form action="http://localhost/ToutDouxListe/?action=insertTask&id_list=<?php echo $id_list?>" method="post">
                <label content="Nom de la tâche"/>
                <input type="text" name="task_name"/><br><br>

                <input type="date" name="latest_date"/><br><br>

                <input type="submit" value="Ajouter la tâche">
            </form>
        </section>
    </div>

    <?php require_once('footer.php');?>

</div>

</body>

</html>
