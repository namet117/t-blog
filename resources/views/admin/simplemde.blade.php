<div class="form-group {!! !$errors->has($label) ?: 'has-error' !!}">

    <label for="{{$id}}" class="col-sm-2 control-label">{{$label}}</label>

    <div class="col-sm-8">

        @include('admin::form.error')

        <textarea class="form-control" id="{{$id}}" name="{{$name}}" placeholder="{{ trans('admin::lang.input') }} {{$label}}" {!! $attributes !!} >{{ old($column, $value) }}</textarea>
    </div>
</div>
<script>
    $(function () {
        window.addEventListener("drop", function (e) {
            e = e || event;
            e.preventDefault();
        }, false);

        var simplemde = new SimpleMDE({
            element: $("#{{$id}}")[0],
            autoDownloadFontAwesome: false,
            forceSync: true,
            placeholder: "请输入MarkDown格式文章内容",
            showIcons: ["code", "table"],
        });

        simplemde.codemirror.on('drop', function (editor, e) {
            if (!e.dataTransfer && e.dataTransfer.files) {
                alert('浏览器不支持此操作');
                return;
            }
            var dataList = e.dataTransfer.files;
            batchUpload(dataList, editor);
        });

        simplemde.codemirror.on('paste', function (editor, e) {
          e.preventDefault();
            if (!e.clipboardData && e.clipboardData.files) {
                alert('浏览器不支持此操作');
                return;
            }
            var dataList = e.clipboardData.items;
            batchUpload(dataList, editor);
        });

        function batchUpload(dataList) {
            for (let i = 0; i < dataList.length; i++) {
                if (dataList[i].type.indexOf('image') === -1) {
                    continue;
                }
                let formData = new FormData();
                formData.append('image', dataList[i]);
                fileUpload(formData);
            }
        }

        function fileUpload(formData) {
            formData.append('_token', '{{ csrf_token() }}');
            $.ajax({
                url: '{{ route('admin.uploadimg') }}',
                type: 'POST',
                cache: false,
                data: formData,
                dataType: 'json',
                timeout: 5000,
                processData: false,
                contentType: false,
                xhrFields: {
                    withCredentials: true
                },
                success: function (data) {
                    simplemde.value(simplemde.value() + "\n ![file](" + data.url + ") \n");
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                  let data = XMLHttpRequest.responseJSON;
                  let html = '上传图片出错了';
                  if (parseInt(status) === 422) {
                    html = data.errors.image.join('<br>')
                  } else {
                    html = data.message;
                  }
                  alert(html);
                }
            });
        }
    });
</script>
