<?php
/**
 * Created by PhpStorm.
 * User: iter
 * Date: 2015-06-21
 * Time: 03:45
 */


/**
 *
 * This is the class that controles everything and will be called from the index file from root folder
 *
 * First we read the request and get which project we are current in
 *
 *
 */

class iteraxcontroller {

    public $request;
    public $it;
    public $themePath;
    public $session;
    private static $instance = null;


    /**
     * Get the instance of the latest created object or create a new one.
     */
    public static function Instance() {

        return is_null(self::$instance) ? self::$instance = new static : self::$instance;
    }

    /**
     * Constructor doing nothing at the moment
     */
    protected function __construct()
    {

    }



/**
 * Include config file from project/ folder and create a reference $it
 *
 * We should also have the Constant PROJECT ready so now we can include
 * the config file for the current project it in the config file asswell
 *
 * in config file we nof use $it-> 'data';
 *
 * and we also make it available by adding $this->it = $it;
 *
 * $this->it->data     will be a big array created mostly from config file in project folder and in the project/selectedproject folder
 *
 * Called from root index.php file
 */
    public function IncludeConfigFiles()
    {

        $it = &$this;
        $it->data = array();
        include_once(PROJECTROOT . 'config.php');
        $this->it = $it;


    }

/**
 *
 * Handles the request by checking the url requested from user
 *
 * Read the request using Request class in core/controllers folder
 *
 * Called from root index.php file
 */
    public function ReadRequest()
    {
        $this->request = includeClass('Request',CONTROLLER);
        //$this->request = new Request();

    }



/**
 * Include the controller method and arguments
 * Called from root index.php file
 *
 */
    public function Include_Request_Controller($target = null)
    {
        $args = array($this->request->Controller(), $this->request->Method(), $this->request->Arguments());
        if(!is_null($target)) {
            includeClass('IncludeController',CONTROLLER,$args);


        }

         //$includecontroller = new IncludeController($this->request->Controller(), $this->request->Method(), $this->request->Arguments());
    }

/**
 *
 * init database
 *
 */
    public function db()
    {

        $args = array(
            $this->it->data['config']['database']['dsn'],
            $this->it->data['config']['database']['user'],
            $this->it->data['config']['database']['pass'],
            $this->it->data['config']['database']['driver-options'],
            $this->it->data['config']['database']['database']);
        $this->db = includeClass('Database',CONTROLLER,$args);
        /*
        new Database(
            $this->it->data['config']['database']['dsn'],
            $this->it->data['config']['database']['user'],
            $this->it->data['config']['database']['pass'],
            $this->it->data['config']['database']['driver-options'],
            $this->it->data['config']['database']['database']
    );*/
        return $this->db;
    }

/**
 *
 * Theme and last rendering phase
 * Called from the root index.php file
 *
 */
    public function RenderTheme($target = null)
    {
        if($target == 'render')
        {
            $theme = includeClass('Theme',CONTROLLER);
            //$theme = new Theme();
            $theme->IncludeThemeFiles();

        }

    }



/**
 *
 * Let the views class handle the data array and put contents to it
 * this function will be called from a page controller
 */
    public function addData($title = null,$data,$region,$file = null)
    {

        $views = includeClass('Views',CONTROLLER);
        //$views = new Views();
        $views->addData($title,$data,$region,$file);
    }


/**
 *
 * Session handling
 *
 */
    public function Session($target = null)
    {
        $args = array($target,$this->it->data['config']['session_name'],$this->it->data['config']['session_key']);
        includeClass('Session',CONTROLLER,$args);


    }

/**
 *
 * Init the DataController so that we can access everything from there
 * starting to get the selected menu
 *
 */
    public function GetData($type,$images = array(),$thumbs = array(),$width)
    {
        //send in the theme array to the DataController
        $html = includeClass('DataController',LIB);
        $html = $html->$type($images,$thumbs,$width);
        return $html;
    }

/**
 * Get all data from the data array as debug purpose
 */
    public function Debug()
    {
        if($this->it->data['debug']['showDebug'] == true)
        {
            return '<pre>'.print_r($this->it->data,1).'</pre>';
        }

    }
}