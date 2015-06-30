<?php
/**
 * Created by PhpStorm.
 * User: iter
 * Date: 2015-06-29
 * Time: 03:20
 */

class cms {


    public function __construct()
    {
        $set = iteraxcontroller::Instance();
        $this->db = $set->db();
        $this->set = $set;
    }

    public function index()
    {
        $this->set->addData('Testing all regions',null,null,null);
        foreach($this->set->it->data['theme']['data']['regions'] as $key => $regions)
        {
            if(!is_null($key))
            {
                $this->set->addData(null,'Testing '.$key,$key,null);
            }

        }
    }
}