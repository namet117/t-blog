try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap-sass');
} catch (e) {}

$('.tag_name').click(function () {
    let tag = $.trim($(this).text());

    location.href = `/tag/${tag}`;
});
