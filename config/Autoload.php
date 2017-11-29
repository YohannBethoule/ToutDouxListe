<?php
/**
 * Created by PhpStorm.
 * User: arkandros
 * Date: 27/11/17
 * Time: 19:0
 */


/**
 * This class is a Singleton that charges all the php class and files in the project.
 * Class Autoload
 */
class Autoload
{
    private static $_instance = null;

    /**
     * Call the constructor of the class if it doesn't exist yet.
     */
    public static function load()
    {
        if(null !== self::$_instance) {
            throw new RuntimeException(sprintf('%s is already started', __CLASS__));
        }

        self::$_instance = new self();


        if(!spl_autoload_register(array(self::$_instance, '_autoload'), false)) {
            throw RuntimeException(sprintf('%s : Could not start the autoload', __CLASS__));
        }
    }

    /**
     * Set $this->_instance to null.
     */
    public static function shutDown()
    {
        if(null !== self::$_instance) {

            if(!spl_autoload_unregister(array(self::$_instance, '_autoload'))) {
                throw new RuntimeException('Could not stop the autoload');
            }

            self::$_instance = null;
        }
    }

    /**
     * Loads automatically all the php files and class of the project.
     * @param $class
     */
    private static function _autoload($class)
    {
        global $rep;
        $filename = $class.'.php';
        $dir =array('model/','./','config/','controller/','DAL/');
        foreach ($dir as $d){
            $file=$rep.$d.$filename;
            if (file_exists($file))
            {
                require_once($file);
            }
        }
    }
}