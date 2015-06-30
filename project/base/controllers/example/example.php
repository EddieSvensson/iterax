<?php
/**
 * Created by PhpStorm.
 * User: iter
 * Date: 2015-06-30
 * Time: 05:37
 */

class example {

    /**
     *
     * Construct same for all controllers
     *
     */
    public function __construct()
    {

        $set = iteraxcontroller::Instance();
        $this->db = $set->db();
        $this->set = $set;


    }




    public function index()
    {
        //either just adddata to the region or use a view file
        //set file to null if not use view file
        //using array as first arg will need a view file

        $images = array('http://westernchaos.com/site/data/images/uploads/slider/slider/3.jpg',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTicICqbGuTr6-UT7QVUIotlECmO05eJ7yAggTdcowxW_eM9903yw');
        $thumbs = array('http://westernchaos.com/site/data/images/uploads/slider/thumb/3-tn.jpg',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTicICqbGuTr6-UT7QVUIotlECmO05eJ7yAggTdcowxW_eM9903yw');

        $data = iteraxcontroller::Instance()->GetData('slider',$images,$thumbs,940);


        //ex 1
        $this->set->addData(
            'Kött och Fisk'/*OR NULL*/,
            array(
                'data' => $data,

            ),
            'flash',    /*REGION TO ADD DATA TO*/
            __DIR__.'/views/dynamic.php'          /*file*/
        );

        //ex 2
        $this->set->addData(null, 'Data in sidebar section', 'sidebar',null);


    }

}