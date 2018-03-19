try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap-sass');
} catch (e) {}

$('.tag_name').click(function () {
    let tag = $.trim($(this).text());

    location.href = `/tag/${tag}`;
});

// 滚动监听
var $backTop = $('#back-to-top');
$(window).scroll(function () {
    if ($(window).scrollTop() >= 50) {
        $backTop.fadeIn();
    }
    else {
        $backTop.fadeOut();
    }
});
// 回到顶部
$backTop.click(function(){
    $("html,body").animate({scrollTop:0}, 500);
});
