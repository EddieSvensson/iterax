<?php
/**
 * Created by PhpStorm.
 * User: iter
 * Date: 2015-06-21
 * Time: 03:40
 */
/*
 *
 * Include paths to controllers
 *
 */
require_once(CORE . 'boot/class_paths.php');

/*
 *
 * The autoloader function that will load in the classes requested
 *
 */
function StartClass($class)
{
    /*
     * Make the array global that holds all classpaths
     */


    $project = defined('PROJECT') ? PROJECT.'/controllers/' :null;

    global $classes;


    foreach($classes as $key => $c)
    {
        foreach($c as $k)
        {

            $file  = $k.$project.$class.'.php';
            $file2 = $k.$project.$class.'/'.$class.'.php';
            $file3 = $k.$class.'/'.$class.'.php';
            $file4 = $k.$class.'.php';
            if(file_exists($file))
            {

                include_once($file);
                break;
            } elseif(file_exists($file2)){

                include_once($file2);
                break;
            } elseif(file_exists($file3)){

                include_once($file3);
                break;
            } elseif(file_exists($file4)){

                include_once($file4);
                break;
            }
        }
    }
}

spl_autoload_register('StartClass');