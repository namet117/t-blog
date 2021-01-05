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


        <div class="panel panel-default card">
          <div class="panel panel-default card">
            <div class="panel-heading">
              标签
            </div>
            <div class="panel-body tags">

              @php
                $color = ['default', 'primary', 'success', 'info', 'danger', 'warning'];
              @endphp

              @foreach ($tags as $tag)
                <span class="label label-{{ $color[mt_rand(0, 5)] }} tag_names">
                <span class="tag_name">
                    {{ $tag->tag_name }}
                </span>
                ({{ $tag->article_num }})
            </span>
              @endforeach
            </div>
          </div>

          {{-- <div class="panel panel-default card">
              <div class="panel-heading">
                  留言区
              </div>
              <div class="panel-body message">
                  <dl>
                      @foreach($messages as $message)
                      <span class="one-row">
                          <dt>{{ $message->nickname }}({{ $message->ip_location }}) : <span class="pull-right time">{{ $message->created_at }}</span></dt>
                          <dd>{{ $message->content }}</dd>
                      </span>
                      @endforeach
                  </dl>
              </div>
              <div class="panel-footer">
                  <a href="javascript:void(0);">查看更多</a>
              </div>
          </div> --}}
          <div class="panel-heading">
            友情链接
          </div>
          <div class="panel-body friend-links">
            @foreach($links as $link)
              <a href="{{ $link->link }}" target="_blank">{{ $link->name }}</a>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
@stop
