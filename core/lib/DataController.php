<?php
/**
 * Created by PhpStorm.
 * User: iter
 * Date: 2015-06-29
 * Time: 06:49
 */

class DataController {


    public function __construct()
    {

    }



    /**
     * SLIDER
     */
    public function slider($images = array(),$thumbs = array(),$width)
    {
        $data = includeClass('slider',__DIR__.'/data');
        return $data->GetSlider($images,$thumbs,$width);

    }
}