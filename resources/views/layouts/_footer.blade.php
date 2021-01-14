<footer class="t-footer w-100 bg-dark">
    <div class="container d-flex justify-content-between">
        @if (config('tblog.author'))
        <p>
            Auth: <a href="@if (config('tblog.email'))mailto:{{ config('tblog.email') }} @else javascript:void(0); @endif">{{ config('tblog.author') }}</a>
        </p>
        @endif
        @if (config('tblog.record_no'))
        <p>
            <a href="https://beian.miit.gov.cn" target="_blank">{{ config('tblog.record_no') }}</a>
        </p>
        @endif
    </div>
</footer>

<i id="back-to-top" class="bi bi-arrow-up-circle-fill position-fixed"></i>

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
<!-- <script type="text/javascript" src="https://s22.cnzz.com/z_stat.php?id={{ config('tblog.cnzz_appid') }}&web_id={{ config('tblog.cnzz_appid') }}"></script> -->
<script type="text/javascript">var cnzz_protocol = (("https:" === document.location.protocol) ? "https://" : "http://");document.write(unescape("%3Cspan style=\"display:none;\" id='cnzz_stat_icon_{{ config('tblog.cnzz_appid') }}'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s22.cnzz.com/z_stat.php%3Fid%3D{{ config('tblog.cnzz_appid') }}' type='text/javascript'%3E%3C/script%3E"));</script>
@endif

