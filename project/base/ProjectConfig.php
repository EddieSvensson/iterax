<?php
/**
 * Created by PhpStorm.
 * User: iter
 * Date: 2015-06-23
 * Time: 03:29
 */
$host                                               = 'localhost';
$user                                               = 'root';
$pass                                               = '';
$database                                           = 'iterax';







$it->data['config']['database']['dsn']              = 'mysql:host='.$host.'';
$it->data['config']['database']['user']             = $user;
$it->data['config']['database']['pass']             = $pass;
$it->data['config']['database']['driver-options']   = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'");
$it->data['config']['database']['database']         = $database;



/**
 *
 * Set which controller/method will be called by default
 *
 */
$it->data['config']['routing'] = array(
    //the name of the class
    'controller' => 'home',
    'method'     => 'index'
);
/**
 *
 * controllers
 * Key of array in the url
 */

$it->data['config']['controllers']                            = array(

    'home' => array(
        'title'=>'Home',
        'enabled'=>true,
        'dir' => PROJECTROOT.PROJECT.'/controllers/','controller' => 'index',
        'methods' => array(
            'index'         => 'Index',
            'all_regions'   => 'Visa alla regioner')
    ),
    'example' => array(
        'title'=>'Ett exempel',
        'enabled'=>true,
        'dir' => PROJECTROOT.PROJECT.'/controllers/','controller' => 'example',
        'methods' => array(
            'index' => 'index',
        )
    ),
    'cms' => array(
        'title'=>'Cms',
        'enabled'=>true,
        'dir' => PROJECTROOT.PROJECT.'/controllers/','controller' => 'cms',
        'methods' => array()
    ),
);
$it->data['theme']['menu']['base-menu-select'] = 'base';

/**
 * Define session name
 */
$it->data['config']['session_name']                 = preg_replace('/[:\.\/-_]/', '', __DIR__);
$it->data['config']['session_key']                  = 'iterax';

/**
 * Define default server timezone when displaying date and times to the user. All internals are still UTC.
 */
$it->data['config']['timezone']                     = 'Europe/Stockholm';
$it->data['config']['character_encoding']           = 'UTF-8';



/**
 * THEME
 */
$it->data['theme']['selectedTheme']                 = isset($_GET['theme'])? $_GET['theme'] :'base';
$it->data['theme']['animations']                    = true;
$it->data['theme']['stylesheet']                    = array(
    'core' => array(
        'primary' => 'style.css',
        'mobile'  => 'style.mobile.css',
        'includes'=> array(
            'navbar'
        ),
        'animation'=> array(
            'animate.min.css'
        )
    ),
    'animations' => array(
        'animate.min.css',

    ),
    'include' => array(
        'style',

    ),
);
$it->data['theme']['javascript']['files']                   = array(
    'js.js'
);
$it->data['theme']['javascript']['url']['top']              = array();
$it->data['theme']['javascript']['url']['bottom']           = array();

$it->data['theme']['javascript']['inline']['head'][]        = '';
$it->data['theme']['javascript']['inline']['bottom'][]      = '';
$it->data['theme']['data']['data']['error-region']          = 'error';
$it->data['theme']['data']['data']['site-title'][]          = '<span class="animated bounceInDown">Iterax</span>';
$it->data['theme']['data']['data']['browser-title'][]       = '';
$it->data['theme']['data']['data']['slogan'][]              = '
                                                            <span class="animated fadeIn">-</span>
                                                                &nbsp;&nbsp;&nbsp;
                                                            <span class="animated bounceInRight">
                                                                Proffessionella hemsidor
                                                            </span>';
$it->data['theme']['data']['data']['owner']                 = 'Copyright&copy; Eddie Svensson';
$it->data['theme']['data']['data']['google-analytics']      = false;
$it->data['theme']['data']['data']['jquery']                = true;
$it->data['theme']['data']['data']['session'][]             = null;
$it->data['theme']['data']['data']['language']              = 'en';
$it->data['theme']['data']['data']['meta_description']      = 'Meta description';
$it->data['theme']['data']['data']['favicon']               = 'logo.png';
$it->data['theme']['data']['data']['site-logo']             = 'logo.png';
$it->data['theme']['data']['data']['logo-width']            = 80;
$it->data['theme']['data']['data']['logo-height']           = 80;

/**
 *
 * Show debug
 *
 */
$it->data['debug']['showDebug']                     = true;