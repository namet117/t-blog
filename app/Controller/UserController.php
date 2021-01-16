<?php

declare(strict_types=1);

namespace App\Controller;

use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Hyperf\View\RenderInterface;

class UserController
{
    public function about(RenderInterface $render)
    {
        return $render->render('about.me');
    }
}
