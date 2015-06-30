<?php
/**
 * Created by PhpStorm.
 * User: iter
 * Date: 2015-06-21
 * Time: 03:34
 */

/**
 * Set level of error reporting
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);


/**
 *
 * Including the project config file to extend this one
 *
 */
if(defined('PROJECT') && file_exists(PROJECTROOT.PROJECT.'/ProjectConfig.php'))
{
    include(PROJECTROOT.PROJECT.'/ProjectConfig.php');
} else {
    $it->data['error'][] = 'couldnt load the project configuration file';
}

$it->data['config']['base_url'] = 'iterax/'; //if project not in root folder





/**
 *
 * Data for the theme phase when rendering all data in template file
 *
 */
/*
$it->data['theme']['data']['site-menu'][]           = null;
$it->data['theme']['data']['slogan'][]              = null;
$it->data['theme']['data']['breadcrumb'][]          = null;
$it->data['theme']['data']['primary'][]             = null;
$it->data['theme']['data']['sidebar'][]             = null;
$it->data['theme']['data']['navbar'][]              = null;
$it->data['theme']['data']['flash'][]               = null;
$it->data['theme']['data']['flash2'][]              = null;
$it->data['theme']['data']['featured-first'][]      = null;
$it->data['theme']['data']['featured-middle'][]     = null;
$it->data['theme']['data']['featured-last'][]       = null;
$it->data['theme']['data']['primary-center'][]      = null;
$it->data['theme']['data']['triptych-first'][]      = null;
$it->data['theme']['data']['triptych-middle'][]     = null;
$it->data['theme']['data']['triptych-last'][]       = null;
$it->data['theme']['data']['full-bar-down'][]       = null;
$it->data['theme']['data']['footer-column-one'][]   = null;
$it->data['theme']['data']['footer-column-two'][]   = null;
$it->data['theme']['data']['footer-column-three'][] = null;
$it->data['theme']['data']['footer-column-four'][]  = null;
$it->data['theme']['data']['footer-column-five'][]  = null;
$it->data['theme']['data']['footer'][]              = null;
*/
$it->data['theme']['data']['data']['error'] = array();
$it->data['theme']['data']['regions']       = array(


    'site-menu' => array(),
    'slogan'=> array(),
    'breadcrumb'=> array(),
    'navbar'=> array(),
    'flash'=> array(),
    'featured-first'=> array(),
    'featured-middle'=> array(),
    'featured-last'=> array(),
    'primary'=> array(),
    'sidebar'=> array(),
    'primary-center'=> array(),
    'triptych-first'=> array(),
    'triptych-middle'=> array(),
    'triptych-last'=> array(),
    'full-bar-down'=> array(),
    'footer-column-one'=> array(),
    'footer-column-two'=> array(),
    'footer-column-three'=> array(),
    'footer-column-four'=> array(),
    'footer-column-five'=> array(),
    'footer'=> array(),
    'error'=>array()

);
/**
 * Debug
 */
$it->data['debug']['session']               = @$_SESSION;
$it->data['debug']['project']               = $this->request->Project();
$it->data['debug']['controller']            = $this->request->Controller();
$it->data['debug']['method']                = $this->request->Method();
$it->data['debug']['arguments']             = $this->request->Arguments();
$it->data['debug']['constants']             = get_defined_constants(true)['user'];
$it->data['debug']['memory-usage']          = memory_get_usage(true);




