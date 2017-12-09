<html>
<?php require_once('head.php');?>

<body>
<div class="container-fluid">
    <?php require_once('headerCo.php');?>
    <div class="row">
        <?php require_once('menu.php');?>
        <section class="col-lg-10">
            <h1>Vos Listes :</h1>
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
                        echo "<td><a href=\"?id_list=".$row->getId()."&list_name=".$row."&action=displayPrivateList\">" . $row . "</a></td>";
                        echo "<td>" . $row->getCreation_Date() . "</td>";
                        echo "<td><a href=\"?id_list=".$row->getId()."&action=deletePrivateList\">supprimer</a></td>";
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