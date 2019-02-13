@extends('layouts.default')

@section('title', $article->title)
@section('desc', $article->abstract)
@section('keywords', $article->keywords)

<link href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/styles/default.min.css" rel="stylesheet">
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
            <div id="article-detail-content">
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
                                <img style="width: 50px;height: 50px;border-radius: 50%;" src="{{$comment->user_info->avatar ?: 'https://file.namet.xyz/users/d_2.jpg?x-oss-process=style/avatar-sm'}}" alt="Avatar">
                            </div>
                            <div class="detail">
                                <div class="profile">
                                    <div class="operate pull-right">
                                        <a class="fa fa-reply add-reply" href="#content-reply-to" title="回复"></a>
                                    </div>
                                    <span class="username">{{ $comment->user_info->username }}</span>
                                    <span class="site-link">
                                        @if ($comment->user_info->site)
                                        <a href="{{ $comment->user_info->site }}" target="_blank"><i class="fa fa-link" aria-hidden="true"></i></a>
                                        @endif
                                    </span>
                                    <div class="row rank-time">
                                        <span class="rank">{{ $comment->rank }}楼</span>
                                        <span class="time">{{ $comment->created_at->diffForHumans() }} {{ $comment->reply_to ? ('>> ' . $replies[$comment->reply_to]->rank) . '楼' : '' }}
                                        </span>
                                    </div>
                                </div>
                                <div class="content">
                                    @if ($comment->reply_to)
                                    <span class="reply-to">{{ '@' . $replies[$comment->reply_to]->username }}</span>
                                    @endif
                                    <span class="content-detail markdown-body">{!! $comment->content !!}</span>
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
                    <div class="alert alert-success" role="alert">
                        <ul>
                            <li>支持Markdown语法</li>
                            <li>支持拖拽和粘贴上传图片</li>
                            <li>😊请文明发言～.～</li>
                        </ul>
                    </div>

                    @guest
                        <div class="alert alert-info needlogin-div" role="alert">
                            <a href="{{ route('login') }}">请<span>登陆</span>后再进行评论！</a>
                        </div>
                    @else
                        <textarea class="form-control" id="md-textarea" name="original_md" rows="5" cols="50">{{ old('original_md') }}</textarea>
                    @endguest

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="notify"> 不接收新消息通知😭
                        </label>
                    </div>
                    <button type="submit" class="btn btn-success comment-send">
                        <i class="fa fa-send"></i> 提交
                    </button>
                    <hr>
                    <div class="comment-preview">
                        <div class="title">
                            Preview
                        </div>
                        <div id="comment-preview-content" class="markdown-body"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer_script')
  <script src="{{ mix('js/detail.js') }}" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/highlight.min.js"></script>
  <script>
    hljs.initHighlightingOnLoad();
  </script>
@endsection
