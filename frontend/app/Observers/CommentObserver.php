<?php
namespace App\Observers;

use App\Comment;
use App\Lib\ParserLib;

class CommentObserver
{
    public function saving(Comment $comment)
    {
        $max_rank = Comment::where('article_id', '=', $comment->article_id)->max('rank');
        $comment->rank = intval($max_rank) + 1;
        $comment->content = (new ParserLib)->makeHtml($comment->original_md);
        $comment->ip = (new \Illuminate\Http\Request)->getClientIp();
    }

    public function deleted(Comment $comment)
    {
        \DB::table('articles')->where('id', '=', $comment->article_id)->decrement('comment_times', 1);
    }

    //
    public function created(Comment $comment)
    {
        \DB::table('articles')->where('id', '=', $comment->article_id)->increment('comment_times', 1);
    }
}
