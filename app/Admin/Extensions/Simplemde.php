<?php
/**
 * Created by PhpStorm.
 * User: namet117<namet117@163.com>
 * DateTime: 2018/9/2 22:59
 */

namespace App\Admin\Extensions;


use Encore\Admin\Form\Field;

class Simplemde extends Field
{
    protected $view = 'admin.simplemde';

    protected static $css = [
        'https://cdn.bootcss.com/simplemde/1.11.2/simplemde.min.css'
    ];

    protected static $js = [
        'https://cdn.bootcss.com/simplemde/1.11.2/simplemde.min.js',
    ];
}
