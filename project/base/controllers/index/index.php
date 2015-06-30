<?php
/**
 * Created by PhpStorm.
 * User: iter
 * Date: 2015-06-21
 * Time: 21:06
 */

class index {

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



    public function all_regions()
    {
        //$this->set->it->data['theme']['javascript']['inline']['bottom'][] = 'alert();';
        $this->set->addData('Testing all regions',null,null,null);
        foreach($this->set->it->data['theme']['data']['regions'] as $key => $regions)
        {
            if(!is_null($key) && $key != 'navbar' && empty($this->set->it->data['theme']['data']['regions'][$key][1]))
            {
                $this->set->addData(null,'Testing '.$key,$key,null);
            }

        }
        //testing error message
        //$this->set->addData(null,null,'regiontest',null);
    }



    public function index()
    {
        //either just adddata to the region or use a view file
        //set file to null if not use view file
        //using array as first arg will need a view file

        $var1  = 'sample data1';
        $var2 = 'sample data2';


        //ex 1
        $this->set->addData(
            'TITLE OF PAGE'/*OR NULL*/,
            array(
                        'data' => array('First element of array','second','last'),
                        'var1' => $var1,
                        'var2' => $var2
                    ),
                    'primary',    /*REGION TO ADD DATA TO*/
                     __DIR__.'/views/dynamic.php'          /*file*/
        );

        //ex 2
        $this->set->addData(null, 'Data in sidebar section', 'sidebar',null);


    }

}