<?php
/**
 * Created by PhpStorm.
 * User: iter
 * Date: 2015-06-23
 * Time: 06:03
 */

class IncludeController {


    public function __construct($controller = null,$method = null, $arguments = array())
    {


        /**
         *
         * Get default routing from project config file
         *
         */

        $routing        = iteraxcontroller::Instance()->it->data['config']['routing'];
        $controller     = isset($routing['controller']) && $controller == 'not-selected'  ? $routing['controller'] :$controller;
        $method         = isset($routing['method'])     && $method     == 'not-selected'  ? $routing['method']     :$method;



        /**
         *
         * Include the controller if exists, else include the index controller of the current project
         *
         */

        $controllerEnabled = isset(iteraxcontroller::Instance()->it->data['config']['controllers'][$controller]['enabled'])? iteraxcontroller::Instance()->it->data['config']['controllers'][$controller]['controller'] : false;
        $controllerDir     = isset(iteraxcontroller::Instance()->it->data['config']['controllers'][$controller]['dir'])? iteraxcontroller::Instance()->it->data['config']['controllers'][$controller]['dir'] : false;
        $path              = $controllerDir.'/'.$controllerEnabled.'/'.$controllerEnabled.'.php';
        if(file_exists($path)) {
            include_once($path);
            $classExists = ($controller != false) ? class_exists($controllerEnabled) : null;

            if ($controllerEnabled != null && $classExists != null) {
                if (!is_null($controllerEnabled)) {
                    $reflect = new ReflectionClass($controllerEnabled);
                    //check if method exists and is callable
                    if ($reflect->hasMethod($method)) {
                        $controllerObj = $reflect->newInstance();
                        $methodObj = $reflect->getMethod($method);
                        if ($methodObj->isPublic()) {

                            $methodObj->invokeArgs($controllerObj, $arguments);

                        } else {
                            //Controller method not public
                        }
                    } else {
                        //method not public

                    }

                } else {
                    //class does not exist or is not enabled

                }


            } else {
                //page not found

            }
        } else {
            //file does not exist and could not be included
        }


    }



    /*
     *
     * public function ShowErrorPage($code, $message=null) {
	  $errors = array(
	    '403' => array('header' => 'HTTP/1.0 403 Restricted Content', 'title' => t('403, restricted content')),
	    '404' => array('header' => 'HTTP/1.0 404 Not Found', 'title' => t('404, page not found')),
	  );
	  if(!array_key_exists($code, $errors)) { throw new Exception(t('Header code is not valid.')); }

    $this->views->SetTitle($errors[$code]['title'])
                ->AddIncludeToRegion('primary', $this->LoadView(null, "{$code}.tpl.php"), array('message'=>$message))
                ->AddIncludeToRegion('sidebar', $this->LoadView(null, "{$code}_sidebar.tpl.php"), array('message'=>$message));
    $this->log->Timestamp(__CLASS__, __METHOD__);
    header($errors[$code]['header']);
    $this->ThemeEngineRender();
    exit();
  }
     */
}