<?php
/**
 * Created by PhpStorm.
 * User: arkandros
 * Date: 27/11/17
 * Time: 19:51
 */
?>
<html>
<?php require_once ('vues/head.php');?>

<body>
<div class="container-fluid">
    <?php require_once ('vues/header.php');?>
    <div class="row">
        <?php require_once ('vues/menu.php');?>
        <section class="col-lg-10">
            <?php
            if(isset($dVueErreur)) {
                if(is_array($dVueErreur)) {
                    foreach ($dVueErreur as $erreur) {
                        echo($erreur);
                    }
                }
                else {
                    echo $dVueErreur;
                }
            }
            ?>
        </section>
    </div>

    <?php require_once ('vues/footer.php');?>

</div>

</body>

</html>

