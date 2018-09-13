<div class="panel panel-default card">
    <div class="panel-heading">
        标签
    </div>
    <div class="panel-body tags">

        @php
            $color = ['default', 'primary', 'success', 'info', 'danger', 'warning'];
        @endphp

        @foreach ($tags as $tag)
            <span class="label label-{{ array_random($color) }} tag_names">
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

<div class="panel panel-default card">
    <div class="panel-heading">
        友情链接
    </div>
    <div class="panel-body friend-links">
        <a href="https://laravel-china.org/topics" target="_blank">Laravel China</a>
        <a href="http://oschina.net" target="_blank">OSChina开源中国</a>
        <a href="https://www.litblc.com/" target="_blank">怀修博客</a>
    </div>
</div>
