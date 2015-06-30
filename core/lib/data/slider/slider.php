<?php
/**
 * Created by PhpStorm.
 * User: iter
 * Date: 2015-06-30
 * Time: 05:46
 */

class slider {


    public function __construct()
    {
        $this->base_url = iteraxcontroller::Instance()->request->base_url();

    }

    public function GetSlider($images = array(),$thumbs = array(),$width)
    {
        $it = iteraxcontroller::Instance()->it;
        $it->data['theme']['javascript']['url']['bottom'][] = $it->request->base_url().'core/lib/data/slider/includes/amazingslider.js';
        $it->data['theme']['javascript']['url']['bottom'][] = $it->request->base_url().'core/lib/data/slider/includes/initslider-1.js';
        $it->data['theme']['javascript']['url']['bottom'][] = $it->request->base_url().'core/lib/data/slider/includes/modernizr.js';
        $it->data['theme']['javascript']['inline']['bottom'][] = '
        var left = ((document.getElementById("amazingslider-1").parentNode.parentNode.offsetWidth)-'.$width.')/2;
        document.getElementById("amazingslider-1").parentNode.setAttribute("style","width:'.$width.'px; margin-left:"+left+"px;");
        ';
        $data = '';
        $data .= '<div id="amazingslider-1" style="display:block;position:relative;margin:16px auto 56px;">
                    <ul class="amazingslider-slides" style="display:none;">';

            foreach($images as $image)
            {
                $data .= '<li><img src="'.$image.'" alt="" /></li>';
            }

            $data .= '</ul>';
            $data .= '<ul class="amazingslider-thumbnails" style="display:none;">';

            foreach($thumbs as $thumb)
            {
                $data .= '<li><img src="'.$thumb.'" alt="" /></li>';
            }

        $data .= '</ul></div>';

        return $data;
    }
}