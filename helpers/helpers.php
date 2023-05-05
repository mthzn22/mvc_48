<?php

//die and debug
function dd($parametro = [])
{
    echo "<pre>";
    print_r($parametro);
    echo "</pre>";
    exit;
}

