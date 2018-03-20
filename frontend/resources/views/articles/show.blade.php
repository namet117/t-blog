@extends('layouts.default')

@section('title', $article->title)
@section('desc', $article->abstract)
@section('keywords', $article->keywords)

<link href="https://cdn.bootcss.com/github-markdown-css/2.10.0/github-markdown.min.css" rel="stylesheet">

@section('content')
<div class="container">
    <div class="row article-detail">
        <div class="col-xs-12 markdown-body left card">
            <div class="prev-next">
                @if ($prev)
                <a class="prev" href="{{ route('article.show_detail', [$prev->id, $prev->slug]) }}">
                    <i class="glyphicon glyphicon-chevron-left"></i>
                    {{ $prev->title }}
                </a>
                @endif

                @if ($next)
                <a class="pull-right" href="{{ route('article.show_detail', [$next->id, $next->slug]) }}">
                    {{ $next->title }}
                    <i class="glyphicon glyphicon-chevron-right"></i>
                </a>
                @endif
            </div>
            <h2>{{ $article->title }}</h2>
            <div>
                {!! $article->content !!}
            </div>
            <div class="prev-next">
                @if ($prev)
                <a class="prev" href="{{ route('article.show_detail', [$prev->id, $prev->slug]) }}">
                    <i class="glyphicon glyphicon-chevron-left"></i>
                    {{ $prev->title }}
                </a>
                @endif

                @if ($next)
                <a class="pull-right" href="{{ route('article.show_detail', [$next->id, $next->slug]) }}">
                    {{ $next->title }}
                    <i class="glyphicon glyphicon-chevron-right"></i>
                </a>
                @endif
            </div>
        </div>
    </div>
    <!-- 文章评论 -->
    <div class="row article-comment">
        <div class="col-xs-12 card">
            <h3>文章评论({{ $article->comment_times }})</h3>
        </div>
    </div>
</div>
@endsection
