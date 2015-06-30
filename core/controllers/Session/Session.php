<?php
/**
 * Created by PhpStorm.
 * User: iter
 * Date: 2015-06-29
 * Time: 03:30
 */

class Session {

    public $sessionName;
    public $sessionKey;
    public $data;

    public function __construct($target = null,$sessionName,$sessionKey)
    {
        $this->sessionKey   = $sessionKey;
        $this->sessionName  = $sessionName;
        if($target == 'init')
        {
            $this->init();
        }

    }

    private function init()
    {
        session_name($this->sessionName);
        session_start();
    }
}