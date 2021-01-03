<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Controller;

use App\Model\FriendLink;
use App\Model\Message;
use App\Model\Tag;
use Hyperf\View\RenderInterface;

class IndexController extends AbstractController
{
    public function index(RenderInterface $render)
    {
        $tags = Tag::all();
        $messages = Message::latest()->limit(5)->get();

        // $page = $this->request-

        $articles = [];
        $links = FriendLink::valid()->withOrder()->get();

        return $render->render('home/index', compact('tags', 'messages', 'links', 'articles'));
    }
}
