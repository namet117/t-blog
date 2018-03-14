<div class="panel panel-default">
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

<div class="panel panel-default">
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
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        友情链接
    </div>
    <div class="panel-body friend-links">
        <a href="https://laravel-china.org" target="_blank">Laravel China</a>
        <a href="http://baidu.com" target="_blank">百度一下</a>
        <a href="http://baidu.com" target="_blank">百</a>
        <a href="http://baidu.com" target="_blank">百度</a>
        <a href="http://baidu.com" target="_blank">百度一下下</a>
        <a href="http://baidu.com" target="_blank">百度一下</a>
        <a href="http://baidu.com" target="_blank">百度</a>
        <a href="http://baidu.com" target="_blank">百度一下</a>
        <a href="http://baidu.com" target="_blank">百度一下</a>
    </div>
</div>
