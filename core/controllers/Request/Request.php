<?php
/**
 * Created by PhpStorm.
 * User: iter
 * Date: 2015-06-21
 * Time: 04:33
 */
/**
 *
 * Develope better controle Include_Controller()
 *
 */
class Request {


    public $controller = null;
    public $method = null;
    public $arguments = array();


    public function __construct()
    {

        /**
         *
         * Handle the url from user request
         *
         */
        $url_index = $_SERVER['SCRIPT_NAME'];
        $folder = str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']);
        $url_full = $_SERVER['REQUEST_URI'];
        $queryString = '?'.$_SERVER['QUERY_STRING'];
        /**
         *
         * Strip the new url into pieces so we get the project, controller, method and arguments
         *
         */
        $new_url = str_replace($url_index, '', $url_full);
        $new_url = str_replace($folder . '/', '', $new_url);
        $new_url = str_replace($queryString,'',$new_url);
        $new_url = explode('/', $new_url);



        /**
         *
         * Set the project root
         *
         */

        $this->project = $this->GetProject($new_url[0]);
        /**
         * Set a constant PROJECT for project if not exists to be used further on
         */
        if (!defined('PROJECT')) {
            define('PROJECT', $this->project) or die("Could not get the current project");
        }


        /**
         *
         * Define the controller and method based on if another project than base is used
         *
         */
                //setting to not-selected so that we can get the routing and change if needed after
                // the config files has been added
        if ($this->project == 'base') {
            if ($new_url[0] == $this->project) {
                $controller     = isset($new_url[1]) && !empty($new_url[1]) ? trim($new_url[1]) : 'not-selected';
                $method         = isset($new_url[2]) && !empty($new_url[2]) ? trim($new_url[2]) : 'not-selected';
                $args           = isset($new_url[3]) && !empty($new_url[3]) ? array_slice($new_url, 3) : array();
            } else {
                $controller     = isset($new_url[0]) && !empty($new_url[0]) ? trim($new_url[0]) : 'not-selected';
                $method         = isset($new_url[1]) && !empty($new_url[1]) ? trim($new_url[1]) : 'not-selected';
                $args           = isset($new_url[2]) && !empty($new_url[2]) ? array_slice($new_url, 2) : array();
            }

        } else {
            $controller         = isset($new_url[1]) && !empty($new_url[1]) ? trim($new_url[1]) : 'not-selected';
            $method             = isset($new_url[2]) && !empty($new_url[2]) ? trim($new_url[2]) : 'not-selected';
            $args               = isset($new_url[3]) && !empty($new_url[3]) ? array_slice($new_url, 3) : array();
        }

        $this->controller       = $controller;
        $this->method           = $method;
        $this->arguments        = $args;

    }
/**
 *
 * Set the project
 *
 */
    private function GetProject($project)
    {
        if(is_dir(ROOT.'project/'.$project) && !is_null($project) && !empty($project))
        {
            return $project;
        } else {
            return ROOTPROJECT;
        }
    }


    /**
     *
     * public functions that will be used from elsewhere to get certain values
     *
     * like for example the project root
     *
     */

    public function Project()
    {
        return $this->project;
    }

    public function Controller()
    {
        return $this->controller;
    }

    public function Method()
    {
        return $this->method;
    }

    public function Arguments()
    {
        return $this->arguments;
    }

    public function base_url()
    {
        $url = 'http';
        $url .= (@$_SERVER["HTTPS"] == "on") ? 's' : '';
        $url .= "://";
        $url .= $_SERVER["SERVER_NAME"];
        $url .= '/';
        $url .= iteraxcontroller::Instance()->it->data['config']['base_url'];
        return $url;

    }
    /**
     * Get the url to the current page.
     */
    public function GetCurrentUrl() {
        $url = "http";
        $url .= (@$_SERVER["HTTPS"] == "on") ? 's' : '';
        $url .= "://";
        $serverPort = ($_SERVER["SERVER_PORT"] == "80") ? '' :
            (($_SERVER["SERVER_PORT"] == 443 && @$_SERVER["HTTPS"] == "on") ? '' : ":{$_SERVER['SERVER_PORT']}");
        $url .= $_SERVER["SERVER_NAME"] . $serverPort . htmlspecialchars($_SERVER["REQUEST_URI"]);
        return $url;
    }
}