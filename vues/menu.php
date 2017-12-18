<?php
/**
 * Created by PhpStorm.
 * User: arkandros
 * Date: 27/11/17
 * Time: 19:55
 */?>

<nav class="col-lg-2">
    <h1>Menu</h1>
    <ul>
        <li><a href="?action=consultPublicLists">Voir les listes publiques</a></li>
        <?php
        if(isset($_SESSION['user'])){
            echo "<li><a href='?action=consultPrivateLists'>Voir vos listes</a></li>";
        }
        ?>
        <li><a href="?action=createList">Créer une liste</a></li>
    </ul>
</nav>
