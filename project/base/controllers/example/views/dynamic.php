<?php

$d = '';
if(is_array($data))
{
    foreach($data as $da)
    {
        $d .= $da;
    }
    echo $d;
} else {
    echo $data;
}



