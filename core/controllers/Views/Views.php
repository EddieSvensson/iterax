<?php
/**
 * Created by PhpStorm.
 * User: iter
 * Date: 2015-06-25
 * Time: 20:17
 */

class Views {




    public function __construct()
    {

    }

    private function IncludeFileAndGetContentAsString($file,$dataArray)
    {

        //extract the array sent from controller so we can access them in the view file
        extract($dataArray);

        //ob start lets us run the view php file and have the result back as a string which will in this case be $contents
        //which we then add in the correct region
        ob_start();
        include $file;
        $contents = ob_get_clean();

        return $contents;

    }


//add values to the big fata data array
    public function addData($title,$data,$region,$file)
    {
        $setValue = iteraxcontroller::Instance();



        //if file is null then we just add the value sent to the correct region
        if(is_null($file))
        {
            $contents = $data;
        } else {
            //if file exist then we include it and get the content after the file has been executed
            if(file_exists($file))
            {

                $contents = $this->IncludeFileAndGetContentAsString($file,$data);

            } else {
                $setValue->it->data['theme']['data']['primary'][]  = 'The view file doesnt exist :'.$file;
            }


        }
        //add contents to the big data array
        //set title if its not null
        if(!is_null($title))
        {
            $setValue->it->data['theme']['data']['data']['browser-title'][]  = $title;
        }

        if(isset($setValue->it->data['theme']['data']['regions'][$region]))
        {
            $setValue->it->data['theme']['data']['regions'][$region][] = $contents;
        } elseif(!is_null($region)) {
            $errorRegion = $setValue->it->data['theme']['data']['data']['error-region'];
            $setValue->it->data['theme']['data']['regions'][$errorRegion][] = '<p class="error">region : '.$region . ' does not exist</p>';
            $setValue->it->data['theme']['data']['data']['error'][] = 'Region : '.$region . ' does not exist';
        }



        //debug purpose only
        $setValue->it->data['debug']['including-contents'][$region][]  = $contents;

    }
}