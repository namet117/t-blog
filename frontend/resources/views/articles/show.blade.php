@extends('layouts.default')

@section('title', $article->title)
@section('desc', $article->abstract)
@section('keywords', $article->keywords)

<link href="https://cdn.bootcss.com/github-markdown-css/2.10.0/github-markdown.min.css" rel="stylesheet">

@section('content')
<div class="container">
    <div class="row article-detail">
        <div class="col-xs-12 col-sm-12 col-md-8 markdown-body left card">
            <h2>{{ $article->title }}</h2>
            <div>
                {!! $article->content !!}
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
