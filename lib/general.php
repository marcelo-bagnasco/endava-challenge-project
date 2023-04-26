<?php

namespace Lib\General;

class General
{
    static function dd($var, $text = '')
    {
        if ($text) echo $text . ':';
        print_r($var);
        echo "\n";
        exit();
    }
}


