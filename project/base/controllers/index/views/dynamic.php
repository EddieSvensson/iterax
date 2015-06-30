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


echo $var1 .'<br>'.$var2;
