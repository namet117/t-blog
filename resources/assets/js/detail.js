window.marked = require('marked');
import 'github-markdown-css/github-markdown.css';
import 'font-awesome/css/font-awesome.min.css';
import 'inline-attachment/src/inline-attachment';
import 'inline-attachment/src/jquery.inline-attachment';

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

  $('.comment-send').prop('disabled', $(this).val().length === 0);
  $textarea.on('keyup', function() {
    $('.comment-send').prop('disabled', $(this).val().length === 0);
  });
  $textarea.on('blur', function () {
    if ($(this).val().length > 0) {
      $('#comment-preview-content').html(marked($(this).val()));
    }
  });
});
