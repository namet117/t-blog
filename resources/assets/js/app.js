try {
  window.$ = window.jQuery = require('jquery');

  require('bootstrap');
} catch (e) {}

//$('.tag_name').click(function () {
//  let tag = $.trim($(this).text());
//
//  location.href = `/tag/${tag}`;
//});
//
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
//// 回到顶部
$backTop.click(function(){
  $("html,body").animate({scrollTop:0}, 500);
});
//// 评论回复
//if ($('.add-reply').length) {
//  $('.add-reply').on('click', function (event) {
//    event.preventDefault();
//    let reply_to_rank = $(this).closest('li').data('rank');
//    let reply_to_id= $(this).closest('li').data('id');
//    $('#reply-to-id').val(reply_to_id);
//    $('#reply-to-id-show').html(reply_to_rank);
//    let $closest_detail = $(this).closest('.detail');
//    $('#reply-to-username').html($closest_detail.find('.username').eq(0).text());
//    $('#reply-to-content').html($closest_detail.find('.content-detail').eq(0).html());
//
//    $('#content-reply-to').show(2);
//    $('#username').focus();
//  });
//  $('#cancel-reply').on('click', function (event) {
//    event.preventDefault();
//    $('#content-reply-to').hide(2);
//    $('#reply-to-id').val(0);
//  });
//}
