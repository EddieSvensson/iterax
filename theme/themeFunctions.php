<?php
/**
 * Created by PhpStorm.
 * User: iter
 * Date: 2015-06-25
 * Time: 17:16
 */

function GetTheDataArray($keys = array())
{
    $ReturnData = '';
    $key1 = isset($keys[0]) && !empty($keys[0]) ? $keys[0] :null;
    $key2 = isset($keys[1]) && !empty($keys[1]) ? $keys[1] :null;
    $key3 = isset($keys[2]) && !empty($keys[2]) ? $keys[2] :null;
    $key4 = isset($keys[3]) && !empty($keys[3]) ? $keys[3] :null;

    if(!is_null($key1) && is_null($key2))
    {
        $ReturnData = iteraxcontroller::Instance()->it->data[$key1];
    } elseif(!is_null($key1) && !is_null($key2) && is_null($key3)){
        $ReturnData = iteraxcontroller::Instance()->it->data[$key1][$key2];
    } elseif(!is_null($key1) && !is_null($key2) && !is_null($key3) && is_null($key4)){
        $ReturnData = iteraxcontroller::Instance()->it->data[$key1][$key2][$key3];

    } elseif(!is_null($key1) && !is_null($key2) && !is_null($key3) && !is_null($key4)){
        $ReturnData = iteraxcontroller::Instance()->it->data[$key1][$key2][$key3][$key4];
    } else {
        $ReturnData = '';
    }


    return $ReturnData;


}


function base_url($project = null)
{

    $url = iteraxcontroller::Instance()->request->base_url();
    $url .= $project != 'base' ? $project : null;
    return $url;
}


function RegionHaveContent($key,$region)
{
    if(isset(GetTheDataArray(array('theme','data',$key))[$region][0]))
    {
        if(!is_null(GetTheDataArray(array('theme','data',$key))[$region][0])) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
//Get the data from the region requested by the argument and return it
function PrintData($key,$region)
{

    $data = GetTheDataArray(array('theme','data',$key,$region));
    $returnData = '';
    if(is_array($data))
    {
        foreach($data as $key => $d)
        {
            if(!isset($data[0]) && !isset($data[1]))
            {
                $returnData .= '';
            } else {
                $returnData .= $d;
            }

        }
    } else {

        $returnData = $data;
    }

    return $returnData;


}
function GetJavascriptInlineBottom($target)
{
    $returnData = '';
    foreach(iteraxcontroller::Instance()->it->data['theme']['javascript']['inline'][$target] as $script)
    {
        $returnData .= '
        <script>
            '.$script.'
        </script>';
    }
    return $returnData;
}

function GetJavascriptFiles($url = null,$target = null)
{
    $javascriptFiles = GetTheDataArray(array('theme','javascript'));
    $returnData = '';
    //load javscript files that are included by libs
    if(!is_null($url) && !is_null($target))
    {
        foreach($javascriptFiles['url'][$target] as $js)
        {
            $returnData .= '<script src="'.$js.'"></script>';
        }
    } else {
        //loading javascript files from project folder
        foreach($javascriptFiles['files'] as $js)
        {
            $httpFile = base_url().'project/'.PROJECT.'/data/js/'.$js;
            $file     = PROJECTROOT.PROJECT.'/data/js/'.$js;

            if(file_exists($file))
            {
                $returnData .= '<script src="'.$httpFile.'"></script>';
            }
        }
    }

    return $returnData;

}
function GetStylesheetes()
{
    //getting the array from the iterax data array for stylesheets and creating a path to them
    $isMobile = check_user_agent('mobile') === false && @$_GET['screen'] != 'mobile' ? false :true;
    $append   = $isMobile ? '.mobile.css':'.css';
    $stylesheets = GetTheDataArray(array('theme','stylesheet'));
    $returnData = '';
    foreach($stylesheets as $key => $style)
    {
        $file = '';
        if($key == 'core') {
            //include core stylesheet and decide if mobile stylesheet should be used
            if(check_user_agent('mobile') === false && @$_GET['screen'] != 'mobile')
            {
                $style = $style['primary'];

            } else {
                $style = $style['mobile'];

            }

            $httpFile = base_url().'theme/'.THEMESELECTED.'/css/'.$style;
            $file     = THEMEPATH.THEMESELECTED.'/css/'.$style;
            //including files from project data css folder configured in projectconfig.php
        } elseif($key == 'include'){
            foreach($style as $st)
            {
                $httpFile = base_url().'project/'.PROJECT.'/data/css/'.$st.$append;
                $file     = PROJECTROOT.PROJECT.'/data/css/'.$st.$append;
            }

        }

        if(file_exists($file))
        {
            $returnData .= '<link rel="stylesheet" href="'.$httpFile.'"/>';
        }

    }
    //adding include files depending on what device is being used
    foreach($stylesheets['core']['includes'] as $includes)
    {
        $returnData .= '<link rel="stylesheet" href="'.base_url().'theme/'.THEMESELECTED.'/css/includes/'.$includes.$append.'"/>';
    }
    //adding animation files
    if(iteraxcontroller::Instance()->it->data['theme']['animations'] === true)
    {
        foreach($stylesheets['animations'] as $includes)
        {
            $returnData .= '<link rel="stylesheet" href="'.base_url().'theme/'.THEMESELECTED.'/css/animation/'.$includes.'"/>';
        }
    }


    return $returnData;
}

function GetMenu()
{
    $data = GetTheDataArray(array('config','controllers'));
    $returnData = '<ul class="navbar">';

    /**
     * Menu
     */
    foreach($data as $key => $val)
    {
        /**
         * submenu
         */
        $methodAppend = '';
        $methods = $data[$key]['methods'];
        if(!empty($methods)) {
            $methodAppend = '<ul>';
            foreach ($methods as $k => $v) {
                $title = $v;
                $method = $k;
                $methodAppend .= '<li><a href="' . base_url() . $key . '/' . $method . '">' . $title . '</a></li>';
            }
            $methodAppend .= '</ul>';
        }
        if($data[$key]['enabled'] == true)
        {
            $returnData .= '<li>
                                <a href="'.base_url().$key.'">
                                    '.$data[$key]['title'].'
                                </a>
                                '.$methodAppend.'
                            </li>';
        }
    }
    $returnData .= '</ul>';
    return $returnData;
}


function PrintDebug()
{

    return iteraxcontroller::Instance()->Debug();
}