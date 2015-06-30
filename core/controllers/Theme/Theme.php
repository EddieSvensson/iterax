<?php
/**
 * Created by PhpStorm.
 * User: iter
 * Date: 2015-06-25
 * Time: 16:51
 */

class Theme {

    public $themePath;
    public $themeFile;
    public $themeFunctionsFile;
    public $it; // the whole data array

    public function __construct()
    {
        //Get the data array from iteraxcontroller
        $this->it = iteraxcontroller::Instance()->it->data;
        //check what theme should be used
        $themeSelected = isset($this->it['theme']['selectedTheme']) ? $this->it['theme']['selectedTheme']:'base';
        //Does the template file exist?
        $pathexists    = isset($themeSelected) && file_exists(THEMEPATH.$themeSelected.'/index.tpl.php') ? true :false;

        if($pathexists === true)
        {
            $this->themePath = THEMEPATH.$themeSelected.'/';

            //creating constants to keep track of which theme is chosen
            define('THEMEPATHSELECTED',THEMEPATH.$themeSelected.'/');
            define('THEMESELECTED',$themeSelected);

            //adding the constants to the debug contants array
            iteraxcontroller::Instance()->it->data['debug']['constants']['THEMEPATHSELECTED'] = THEMEPATHSELECTED;
            iteraxcontroller::Instance()->it->data['debug']['constants']['THEMESELECTED'] = THEMESELECTED;


            $this->themeFunctionsFile = THEMEPATH.'themeFunctions.php';
            $this->themeFile = THEMEPATH.$themeSelected.'/index.tpl.php';

        } else {
            //cannot find theme file
            exit('cannot find theme file');
        }

    }

    public function IncludeThemeFiles()
    {
        //creating a reference to be used in the theme functions file when getting all the data to the index.tpl.php file
        $it = &$this->it;
        //functions file
        require_once($this->themeFunctionsFile);
        //template file
        require_once($this->themeFile);

    }
}