@extends('layouts.default')

@section('title', $article->title)
@section('desc', $article->abstract)
@section('keywords', $article->keywords)

<link href="https://cdn.bootcss.com/github-markdown-css/2.10.0/github-markdown.min.css" rel="stylesheet">

@section('content')
<div class="container">
    <div class="row article-detail">
        <div class="col-xs-12 col-sm-12 col-md-12 markdown-body left card">
            <div class="prev-next">
                @if ($prev)
                <a class="prev" href="{{ route('article.show_detail', [$prev->id, $prev->slug]) }}">
                    <i class="glyphicon glyphicon-chevron-left"></i>
                    {{ $prev->title }}
                </a>
                @else
                <div class="prev-next-null">
                    <i class="glyphicon glyphicon-chevron-left"></i>
                    没有了.
                </div>
                @endif

                @if ($next)
                <a class="pull-right" href="{{ route('article.show_detail', [$next->id, $next->slug]) }}">
                    {{ $next->title }}
                    <i class="glyphicon glyphicon-chevron-right"></i>
                </a>
                @else
                <div class="prev-next-null pull-right" disabled href="javascript:void(0);">
                    没有了.
                    <i class="glyphicon glyphicon-chevron-right"></i>
                </div>
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
                @else
                <div class="prev-next-null">
                    <i class="glyphicon glyphicon-chevron-left"></i>
                    没有了.
                </div>
                @endif

                @if ($next)
                <a class="pull-right" href="{{ route('article.show_detail', [$next->id, $next->slug]) }}">
                    {{ $next->title }}
                    <i class="glyphicon glyphicon-chevron-right"></i>
                </a>
                @else
                <div class="prev-next-null pull-right" disabled href="javascript:void(0);">
                    没有了.
                    <i class="glyphicon glyphicon-chevron-right"></i>
                </div>
                @endif
            </div>
        </div>
        <!-- <div class="col-md-offset-1 hidden-xs hidden-sm col-md-3 card">
            <ul>
                <li>dsa</li>
                <li>dsa</li>
                <li>dsa</li>
                <li>dsa</li>
                <li>dsa</li>
                <li>dsa</li>
                <li>dsa</li>
                <li>dsa</li>
                <li>dsa</li>
                <li>dsa</li>
                <li>dsa</li>
                <li>dsa</li>
                <li>dsa</li>
            </ul>
        </div> -->
    </div>
</div>
@endsection
