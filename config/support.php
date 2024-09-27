<?php

if (!function_exists('debug')) {
    function debug($data)
    {
        print_r($data);
        exit();
    }
}
