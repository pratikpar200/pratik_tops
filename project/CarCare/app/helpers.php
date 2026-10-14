<?php

if (!function_exists('custome_date')) {
    function custome_date($date, $format)
    {
        return date($format, strtotime($date));
    }
}