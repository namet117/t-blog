<?php
// 获取Service实例
if (!function_exists('service')) {
    function service($name)
    {
        static $_services = [];

        $name = strtolower($name);
        if (!isset($_services[ $name ])) {
            $class = '\\App\\Services\\' . ucfirst($name) . 'Service';
            $_services[ $name ] = app($class);
        }

        return $_services[ $name ];
    }
}

if (!function_exists('random_color')) {
    /**
     * 获取随机颜色
     *
     * @return string
     */
    function random_color()
    {
        $colors = [];
        for ($i = 0; $i < 6; $i ++) {
            $colors[] = dechex(rand(0, 15));
        }

        return '#' . implode('', $colors);
    }
}

if (!function_exists('create_url')) {
    function create_url($url)
    {
        if (is_url($url)) {
            return $url;
        }

        return rtrim(config('app.url'), '/') . '/' . ltrim($url, '/');
    }
}

if (!function_exists('is_url')) {
    function is_url($url)
    {
        return preg_match('/^https?:\//', $url);
    }
}

function f_log($data, $append = false)
{
    return file_put_contents('l1.log', print_r($data, true), $append ? FILE_APPEND : 0);
}
