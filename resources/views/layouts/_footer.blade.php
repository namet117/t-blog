<footer class="footer">
    <div class="container">
        @if (config('tblog.author'))
        <p class="pull-left">
            Auth: <a href="@if (config('tblog.email'))mailto:{{ config('tblog.email') }} @else javascript:void(0); @endif">{{ config('tblog.author') }}</a>
        </p>
        @endif
        @if (config('tblog.record_no'))
        <p class="pull-right">
            <a href="http://www.miitbeian.gov.cn" target="_blank">{{ config('tblog.record_no') }}</a>
        </p>
        @endif
    </div>
</footer>
<div id="back-to-top">
    <i class="glyphicon glyphicon-triangle-top"></i>
</div>

@if (config('tblog.bdtj_appid'))
<script>
var _hmt = _hmt || [];
(function() {
    var hm = document.createElement("script");
    hm.src = "https://hm.baidu.com/hm.js?{{ config('tblog.bdtj_appid') }}";
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(hm, s);
})();
</script>
@endif

@if (config('tblog.cnzz_appid'))
<script type="text/javascript" src="https://s22.cnzz.com/z_stat.php?id={{ config('tblog.cnzz_appid') }}&web_id={{ config('tblog.cnzz_appid') }}"></script>
@endif

