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
        '/vendor/inline-attachment/inline-attachment.min.js',
        '/vendor/inline-attachment/jquery.inline-attachment.min.js',
    ];

    public function render()
    {
        $this->script = <<<SCRIPT
var simplemde = new SimpleMDE({
    element: $("#{$this->id}")[0],
    autoDownloadFontAwesome: false,
    forceSync: true,
    placeholder: "请输入MarkDown格式文章内容",
    showIcons: ["code", "table"],
});
SCRIPT;
        return parent::render();
    }
}
