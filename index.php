<?php
/**
 * Created by PhpStorm.
 * User: iter
 * Date: 2015-06-21
 * Time: 03:12
 */

define('START',(float) array_sum(explode(' ',microtime())));
/**
 *
 * Creating constants to folders to keep track
 *
 * */
define('ROOT', __DIR__.'/');
define('CORE', ROOT.'core/');
define('CONTROLLER', ROOT.'core/controllers');
define('LIB', ROOT.'core/lib');
define('ROOTPROJECT','base');
define('PROJECTROOT',ROOT.'project/');
define('THEMEPATH',ROOT.'theme/');
/**
 * Constant PROJECT will be created later on and will be available
 */




/**
 *
 * Include boot.php and functions.php in core folder to initiate some functions
 *
 */
require_once(CORE . 'boot/boot.php');
require_once(CORE . 'boot/functions.php');
require_once(CORE . 'iteraxcontroller.php');


/**
 *
 * Start the iterax core controller
 *
 * Set the project,controller,method and args
 *
 * Include the config file from project folder
 *
 * everything will be handled through iteraxcontroller from this point
 *
 */

$iterax = iteraxcontroller::Instance();

$iterax->ReadRequest();

$iterax->IncludeConfigFiles();

$iterax->Session('init');

$iterax->Include_Request_Controller('init');

$iterax->RenderTheme('render');







