<?php
// 创建img-url
if (!function_exists('createImgUrl')) {
    function createImgUrl($url)
    {
        return env('CDN_PREFIX') . $url;
    }
}
// 获取Service实例
if (!function_exists('service')) {
    function service($name)
    {
        static $_services = [];

        $name = strtolower($name);
        if (!isset($_services[ $name ])) {
            $class = '\\App\\Services\\' . ucfirst($name) . 'Service';
            $_services[ $name ] = new $class();
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
