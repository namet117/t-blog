@extends('layouts.default')

@section('title', $article->title)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <h2>{{ $article->title }}</h2>
            <div class="article-detail">
                {!! $article->content !!}
            </div>
        </div>
        <div class="col-xs-offset-1 col-xs-10">
            
        </div>
    </div>
</div>
@endsection
