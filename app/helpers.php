<?php

use Illuminate\Http\Request;

if (!function_exists('getLocationCode')) {
    function getLocationCode(Request $request)
    {
        return $request->header('LocationCode');
    }
}
