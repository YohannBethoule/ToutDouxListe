<?php
/**
 * Created by PhpStorm.
 * User: arkandros
 * Date: 29/11/17
 * Time: 14:34
 */

?>
<html>
<?php require_once('head.php');?>

<body>
<script src="javascript/script_validation.js"></script>
<div class="container-fluid">
    <?php require_once('header.php');?>
    <div class="row">
        <?php require_once('menu.php');?>
        <section class="col-lg-10">
            <?php echo "<h1>".$list_name.":</h1>" ?>
            <table id="todolist">
                <thead>
                <tr>
                    <td></td>
                    <td>Nom</td>
                    <td>Date de création</td>
                    <td>Date limite</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                <?php
                if(isset($res)) {
                    foreach ($res as $row) {
                        echo "<tr>";
                        echo "<td></td>";
                        echo "<td id='name'>" . $row['task_name'] . "</td>";
                        echo "<td>" . $row['creation_date'] . "</td>";
                        echo "<td>" . $row['latest_date'] . "</td>";
                        echo "<td><a href='?id_task=".$row['id_task']."&action=deleteTask'>supprimer</a></td>";
                        echo "</tr>";
                    }
                }else{
                    var_dump($res);
                    echo "<h2>Erreur d'appel dans la page</h2>";
                }
                ?>
                </tbody>
            </table>
            <p>
                <?php echo "<a href=\"?id_list=".$id_list."&action=addTask\">Ajouter une tâche</a>" ;?>
            </p>
        </section>
    </div>

    <?php require_once('footer.php');?>

</div>

</body>

</html>