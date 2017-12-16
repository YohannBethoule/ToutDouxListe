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
        <li><a href="?action=createList">Créer une liste</a></li>
        <?php
            if(isset($_SESSION['username'])){
               echo "<li><a href='?action=consultPrivateLists'>Voir vos listes</a></li>";
               echo "<li><a href='?action=createList'>Créer une liste privée</a></li>";
            }
            ?>
    </ul>
</nav>
