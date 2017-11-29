<?php
/**
 * Created by PhpStorm.
 * User: arkandros
 * Date: 28/11/17
 * Time: 19:54
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
            <h1>Listes publiques :</h1>
            <table>
                <thead>
                <tr>
                    <td>Nom</td>
                    <td>Date de création</td>
                </tr>
                </thead>
                <tbody>
                <?php
                if(isset($res)) {
                    foreach ($res as $row) {
                        echo "<tr>";
                        echo "<td><a href=\"?id_list=".$row['id_list']."&list_name=".$row['list_name']."&action=displayList\">" . $row['list_name'] . "</a></td>";
                        echo "<td>" . $row['creationDate'] . "</td>";
                        echo "<td><a href=\"?id_list=".$row['id_list']."&action=deleteList\">supprimer</a></td>";
                        echo "</tr>";
                    }
                }else{
                    var_dump($res);
                    echo "<h2>Erreur d'appel dans la page</h2>";
                }
                ?>
                </tbody>
            </table>
        </section>
    </div>

    <?php require_once('footer.php');?>

</div>

</body>

</html>

