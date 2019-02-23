window.marked = require('marked');
import 'github-markdown-css/github-markdown.css';
import 'font-awesome/css/font-awesome.min.css';
import 'inline-attachment/src/inline-attachment';
import 'inline-attachment/src/jquery.inline-attachment';
// require('jquery-ui');
// require('jquery.tocify');

$(() => {
  // 文章内的链接都统一打开新窗口
  $('#article-detail-content a').on('click', function (e) {
    e.preventDefault();
    window.open($(this).attr('href'));
  });

  let $textarea = $('#md-textarea');
  // 初始化inline-attachment
  $textarea.inlineattachment({
    uploadUrl: '/upload-image',
    uploadFieldName: 'image',
    urlText: "\n ![file]({filename}) \n",
    extraParams: {
      _token: document.head.querySelector('meta[name="csrf-token"]')
    }
  });

  $('.comment-send').prop('disabled', !$textarea.val());
  
  $textarea.on('keyup', function() {
    $('.comment-send').prop('disabled', !$(this).val());
  });
  $textarea.on('blur', function () {
    if ($(this).val().length > 0) {
      $('#comment-preview-content').html(marked($(this).val()));
    }
  });

  $('.markdown-body img').css('max-height', '450px');

  // 如果有代码高亮，则开启
  if (typeof hljs === 'object') {
    hljs.initHighlightingOnLoad();
  }

  // 如果有tocify，则开启
  if ($('#chapter').length > 0 && typeof $().tocify === 'function') {
    $('#chapter').tocify({
      context: '#article-detail-content',
      selectors: 'h3,h4',
      scrollHistory: true,
      scrollTo: 88,
      extendPage: false,
    });
  }
});
