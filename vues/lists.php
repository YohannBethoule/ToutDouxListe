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
            <?php
                if(isset($username)){
                    echo "<h1>Vos listes privées :</h1>";
                }else{
                    echo "<h1>Listes publiques :</h1>";
                }
            ?>

            <table>
                <thead>
                <tr>
                    <td>Nom</td>
                    <td>Date de création</td>
                </tr>
                </thead>
                <tbody>
                <?php
                if(isset($lists)) {
                    foreach ($lists as $l) {
                        echo "<tr>";
                        echo "<td><a href=\"?id_list=".$l->getId()."&list_name=".$l."&action=displayList\">" . $l . "</a></td>";
                        echo "<td>" . $l->getCreation_Date() . "</td>";
                        echo "<td><a href=\"?id_list=".$l->getId()."&action=deleteList\">supprimer</a></td>";
                        echo "</tr>";
                    }
                }else{
                    echo "<h2>Erreur d'appel dans la page</h2>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </section>


    <?php require_once('footer.php');?>

</div>

</body>

</html>

