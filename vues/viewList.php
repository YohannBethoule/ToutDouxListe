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
                        if(!($row->isValid())){
                            echo "<tr>";
                        }else{
                            echo "<tr class='checked'>";
                        }
                        echo "<td id='name' data-id='".$row->getId()."'>" . $row . "</td>";
                        echo "<td>" . $row->getCreationDate() . "</td>";
                        echo "<td>" . $row->getLatestDate() . "</td>";
                        echo "<td><a href='?id_task=".$row->getId()."&action=validateTask'>valider</a></td>";
                        echo "<td><a href='?id_task=".$row->getId()."&action=deleteTask'>supprimer</a></td>";
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

<script type="text/javascript" src="../lib/jquery-3.2.1.min.js"></script>

</body>

</html>