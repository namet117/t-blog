<?php

declare(strict_types=1);


if (! function_exists('mix')) {
    function mix(string $path): string
    {
        $json_file = BASE_PATH . '/public/mix-manifest.json';
        if (! file_exists($json_file) || ! is_readable($json_file)) {
            return $path;
        }
        $json = json_decode(file_get_contents($json_file), true) ?: [];

        return $json[$path] ?? $path;
    }
}
