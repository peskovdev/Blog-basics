<?php
namespace Components;
    class AutoLoader
    {
        public static function spl_autoload_register($class)
        {
            $filename = str_replace('\\', '/', $class) . '.php';
            require(ROOT.$filename);
        }

    }
	
?>