<?php

if (!function_exists('createImgUrl')) {
    function createImgUrl($url)
    {
        return env('CDN_PREFIX') . $url;
    }
}
