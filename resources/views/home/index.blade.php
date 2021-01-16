@extends('layouts.default')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="home-page">
          @include('articles._article_list')
        </div>
      </div>

      <div class="col-md-4">
        @include('home._right')
      </div>
    </div>
  </div>
@stop
