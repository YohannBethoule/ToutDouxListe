<?php
/**
 * Created by PhpStorm.
 * User: arkandros
 * Date: 27/11/17
 * Time: 19:04
 */

class Autoload
{
    private static $_instance = null;

    //constructeur de type Singleton
    public static function charger()
    {
        if(null !== self::$_instance) {
            throw new RuntimeException(sprintf('%s is already started', __CLASS__));
        }

        self::$_instance = new self();


        if(!spl_autoload_register(array(self::$_instance, '_autoload'), false)) {
            throw RuntimeException(sprintf('%s : Could not start the autoload', __CLASS__));
        }
    }

    //methode de fermeture de l'Autoload
    public static function shutDown()
    {
        if(null !== self::$_instance) {

            if(!spl_autoload_unregister(array(self::$_instance, '_autoload'))) {
                throw new RuntimeException('Could not stop the autoload');
            }

            self::$_instance = null;
        }
    }

    //methode d'auto-chargement des fichiers
    private static function _autoload($class)
    {
        global $rep;
        $filename = $class.'.php';
        $dir =array('model/','./','config/','controller/','DAL/');
        foreach ($dir as $d){
            $file=$rep.$d.$filename;
            //echo $file."<br/>";
            if (file_exists($file))
            {
                require_once($file);
            }
        }
    }
}