<div class="t-card tags">
  <div class="t-card-title">
    标签
  </div>
  <div class="t-card-body">
    @php
      $color = ['secondary', 'primary', 'success', 'info', 'danger', 'warning', 'dark'];
    @endphp

    @foreach ($tags as $tag)
      <a class="badge badge-{{ $color[mt_rand(0, 6)] }}" href="?keyword={{ $tag->tag_name }}">
                <span class="tag-name">{{ $tag->tag_name }}</span>({{ $tag->article_num }})
            </a>
    @endforeach
  </div>
</div>

<div class="t-card messages">
  <div class="t-card-title">
    留言区
  </div>
  <div class="t-card-body">

  </div>
   <div class="panel panel-default card">
      <div class="panel-heading">

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
  </div>
</div>

<div class="t-card friend-links">
  <div class="t-card-title">
    友情链接
  </div>
  <div class="t-card-body clearfix">
    @foreach($links as $link)
      <a href="{{ $link->link }}" target="_blank">{{ $link->name }}</a>
    @endforeach
  </div>
</div>
