<?php

declare(strict_types=1);

namespace App\Controller;


use Hyperf\View\RenderInterface;

class UserController
{
    public function about(RenderInterface $render)
    {
        return $render->render('about.me');
    }
}
