@extends('layouts.default')

@section('title', $article->title)
@section('desc', $article->abstract)
@section('keywords', $article->keywords)

<link href="https://cdn.bootcss.com/github-markdown-css/2.10.0/github-markdown.min.css" rel="stylesheet">
<link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://cdn.bootcss.com/simplemde/1.7.1/simplemde.min.css" rel="stylesheet">
<link href="https://cdn.bootcss.com/highlight.js/9.12.0/styles/default.min.css" rel="stylesheet">
@section('content')
<div class="container">
    <div class="row article-detail">
        <div class="col-xs-12 markdown-body left card">
            <div class="prev-next">
                @if ($prev)
                <a class="prev" title="上一篇" href="{{ route('article.show_detail', [$prev->id, $prev->slug]) }}">
                    <i class="fa fa-angle-double-left"></i>
                    {{ $prev->title }}
                </a>
                @endif

                @if ($next)
                <a class="pull-right" title="下一篇" href="{{ route('article.show_detail', [$next->id, $next->slug]) }}">
                    {{ $next->title }}
                    <i class="fa fa-angle-double-right"></i>
                </a>
                @endif
            </div>
            <h2>{{ $article->title }}</h2>
            <div>
                {!! $article->content !!}
            </div>
            <div class="prev-next">
                @if ($prev)
                <a class="prev" title="上一篇" href="{{ route('article.show_detail', [$prev->id, $prev->slug]) }}">
                    <i class="fa fa-angle-double-left"></i>
                    {{ $prev->title }}
                </a>
                @endif

                @if ($next)
                <a class="pull-right" title="下一篇" href="{{ route('article.show_detail', [$next->id, $next->slug]) }}">
                    {{ $next->title }}
                    <i class="fa fa-angle-double-right"></i>
                </a>
                @endif
            </div>
        </div>
    </div>
    <!-- 文章评论 -->
    <div class="row article-comment card">
        <div class="col-xs-12 list">
            <div class="comments panel panel-default list-panel comments-index" id="comments">
                <div class="panel-heading">
                    <h3><i class="fa fa-comments"></i> 文章评论 ({{ $article->comment_times }})</h3>
                </div>
                <div class="panel-body">
                    @if (count($comments))
                    <ul class="list-group row">
                        @foreach ($comments as $comment)
                        <li class="list-group-item media" style="margin-top:0px;" id="comment-{{ $comment->id }}" data-id="{{ $comment->id }}" data-rank="{{ $comment->rank }}">
                            <div class="avatar center pull-left">
                                <img src="https://file.namet.xyz/users/d_2.jpg?x-oss-process=style/avatar-sm" alt="Avatar">
                            </div>
                            <div class="detail">
                                <div class="profile">
                                    <div class="operate pull-right">
                                        <a class="fa fa-reply add-reply" href="#content-reply-to" title="回复"></a>
                                    </div>
                                    <span class="username">{{ $comment->username }}</span>
                                    <span class="site-link">
                                        @if ($comment->site)
                                        <a href="{{ $comment->site }}" target="_blank"><i class="fa fa-link" aria-hidden="true"></i></a>
                                        @endif
                                    </span>
                                    <div class="row rank-time">
                                        <span class="rank">#{{ $comment->rank }}</span>
                                        <span class="time">{{ $comment->created_at->diffForHumans() }} {{ $comment->reply_to ? ('>> #' . $comment->reply_to) : '' }}
                                        </span>
                                    </div>
                                </div>
                                <div class="content">
                                    @if ($comment->reply_to)
                                    <span class="reply-to">{{ '@' . $reply_names[$comment->reply_to] }}</span>
                                    @endif
                                    <span class="content-detail">{!! $comment->content !!}</span>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    @else
                    <div class="empty">评论一下，沙发🛋️就是你的了～～</div>
                    @endif
                </div>
            </div>
            <div class="add">
                <form class="" action="{{ route('comment.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="alert alert-info" id="content-reply-to">
                        <input type="hidden" name="reply_to" value="{{ old('reply_to') }}" id="reply-to-id">
                        <input type="hidden" name="article_id" value="{{$article->id}}">
                        <i class="fa fa-reply"></i>当前正在回复 <b>#<span id="reply-to-id-show"></span> <span id="reply-to-username"></span></b>
                        <a href="#" id="cancel-reply" class="pull-right">取消回复</a>
                        <div class="well well-sm" id="reply-to-content"></div>
                    </div>
                    <div class="form-group">
                        <label for="username"><span class="red-asterisk">* </span>昵称👨</label>
                        <input type="text" class="form-control" name="username" value="{{ old('username') }}" id="username" placeholder="十个汉字以内" required>
                    </div>
                    <div class="form-group">
                        <label for="site">站点🔗</label>
                        <input type="url" class="form-control" name="site" id="site" value="{{ old('site') }}" placeholder="站点url">
                    </div>
                    <div class="form-group">
                        <label for="email"><span class="red-asterisk">* </span>邮箱📮</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="绝不外泄🙊，仅用作发送评论回复！" required>
                    </div>
                    <div class="alert alert-success" role="alert">
                        😊请文明发言～～
                        <br>
                        支持MarkDown格式，但暂不支持上传图片🤦‍，正在努力中💪💪💪
                    </div>
                    <textarea class="form-control" id="mde-area" name="original_md" rows="5" cols="50">{{ old('original_md') }}</textarea>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="notify"> 不接收新消息通知😭
                        </label>
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-send"></i> 提交</button>
                    <span id="add-comment-error">⚠️必须要填写邮件地址哦～⚠️</span>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer_script')
<script src="https://cdn.bootcss.com/simplemde/1.7.1/simplemde.min.js"></script>
<script src="https://cdn.bootcss.com/highlight.js/9.12.0/highlight.min.js"></script>
<script type="text/javascript">
    $(function(){
        new SimpleMDE({
            element: $('#mde-area')[0],
            autoDownloadFontAwesome: false,
        });
    });
    hljs.initHighlightingOnLoad();
</script>
@endsection
