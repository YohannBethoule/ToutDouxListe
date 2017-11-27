<?php
/**
 * Created by PhpStorm.
 * User: arkandros
 * Date: 16/11/17
 * Time: 00:27
 */
?>

<html>

<body>
<?php
//charge la configuration de notre projet
require_once(__DIR__.'/config/config.php');
require_once(__DIR__.'/config/Autoload.php');


//crée une connexion à la base de données et charge nos fichiers
session_start();
Autoload::charger();

//instancie notre FrontController
$cont = new FrontController();
?>

</body>

</html>

