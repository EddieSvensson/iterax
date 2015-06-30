<?php
/**
 * Created by PhpStorm.
 * User: iter
 * Date: 2015-06-25
 * Time: 16:41
 */

//Can be used by all classes loaded by the iteraxcontroller
function sayhello(){
    exit('found');
}

function printarray($array)
{
    return '<pre>'.print_r($array,1).'</pre>';
}

/* USER-AGENTS
================================================== */
function check_user_agent ( $type = NULL ) {
    $user_agent = strtolower ( $_SERVER['HTTP_USER_AGENT'] );
    if ( $type == 'bot' ) {
        // matches popular bots
        if ( preg_match ( "/googlebot|adsbot|yahooseeker|yahoobot|msnbot|watchmouse|pingdom\.com|feedfetcher-google/", $user_agent ) ) {
            return true;
            // watchmouse|pingdom\.com are "uptime services"
        }
    } else if ( $type == 'browser' ) {
        // matches core browser types
        if ( preg_match ( "/mozilla\/|opera\//", $user_agent ) ) {
            return true;
        }
    } else if ( $type == 'mobile' ) {
        // matches popular mobile devices that have small screens and/or touch inputs
        // mobile devices have regional trends; some of these will have varying popularity in Europe, Asia, and America
        // detailed demographics are unknown, and South America, the Pacific Islands, and Africa trends might not be represented, here
        if ( preg_match ( "/phone|iphone|itouch|ipod|symbian|android|htc_|htc-|palmos|blackberry|opera mini|iemobile|windows ce|nokia|fennec|hiptop|kindle|mot |mot-|webos\/|samsung|sonyericsson|^sie-|nintendo/", $user_agent ) ) {
            // these are the most common
            return true;
        } else if ( preg_match ( "/mobile|pda;|avantgo|eudoraweb|minimo|netfront|brew|teleca|lg;|lge |wap;| wap /", $user_agent ) ) {
            // these are less common, and might not be worth checking
            return true;
        }
    }
    return false;
}

//my own autoloader for classes
function includeClass($class,$path,$args = array())
{
    $file = $path.'/'.$class.'.php';
    $file2 = $path.'/'.$class.'/'.$class.'.php';
    if(file_exists($file))
    {
        include_once($file);
    } elseif(file_exists($file2))
    {
        include_once($file2);
    }
    $reflection = new ReflectionClass( $class );
    return $reflection->newInstanceArgs( $args );

}