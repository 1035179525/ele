@extends("layouts.shop.default")
@section("title","添加")
@section("content")



    <br/>
    <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">菜品名字</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="inputEmail3" placeholder="" name="goods_name" value="{{old("goods_name")}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">菜品评分</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="inputPassword3" placeholder="" name="rating" value="{{old("rating")}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">所属商品分类</label>
            <div class="col-sm-5">
                <select name="category_id" id="" class="form-control">
                    @foreach($cates as $cate)
                    <option value="{{$cate->id}}">{{$cate->name}}</option>
                        @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">菜品价格</label>
            <div class="col-sm-2">
                <input type="text" class="form-control"  name="goods_price" value="{{old("goods_price")}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">菜品描述</label>
            <div class="col-sm-2">
                <textarea name="description" id="" cols="30" rows="10">
                    {{old("description")}}
                </textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">月销量</label>
            <div class="col-sm-2">
                <input type="text" class="form-control"  name="month_sales" value="{{old("month_sales")}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">评分数量</label>
            <div class="col-sm-2">
                <input type="text" class="form-control"  name="rating_count" value="{{old("rating_count")}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">提示信息</label>
            <div class="col-sm-2">
                <input type="text" class="form-control"  name="tips" value="{{old("tips")}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">满意度数量</label>
            <div class="col-sm-2">
                <input type="text" class="form-control"  name="satisfy_count" value="{{old("satisfy_count")}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">满意度评分</label>
            <div class="col-sm-2">
                <input type="text" class="form-control"  name="satisfy_rate" value="{{old("satisfy_rate")}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">是否上架</label>
            <div class="col-sm-2">
                <input type="radio" value="1" name="status">是
                <input type="radio" value="0" name="status">否
            </div>
        </div>

            <!--用来存放文件信息-->
            <div id="uploader-demo">
                <!--用来存放item-->
                <div id="fileList" class="uploader-list"></div>
                <div id="filePicker">选择图片</div>
            </div>

        <input type="hidden" id="upload"  name="goods_img" >
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">添加</button>
            </div>
        </div>

        <script type="text/javascript">
            var ue = UE.getEditor('container');
            ue.ready(function() {
                ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
            });
        </script>

        <!-- 编辑器容器 -->
    </form>
    @endsection

@section("js")
    <script>
        // 初始化Web Uploader
        var uploader = WebUploader.create({
            formData: {
                // 这里的token是外部生成的长期有效的，如果把token写死，是可以上传的。
                _token:'{{csrf_token()}}'
                // 我想上传时再请求服务器返回token，改怎么做呢？反复尝试而不得。谢谢大家了！
                //uptoken_url: '127.0.0.1:8080/examples/upload_token.php'
            },



            // 选完文件后，是否自动上传。
            auto: true,

            // swf文件路径
            swf: '/webuploader/Uploader.swf',

            // 文件接收服务端。
            server: '{{route("menu.upload")}}',

            // 选择文件的按钮。可选。
            // 内部根据当前运行是创建，可能是input元素，也可能是flash.
            pick: '#filePicker',

            // 只允许选择图片文件。
            accept: {
                title: 'Images',
                extensions: 'gif,jpg,jpeg,bmp,png',
                mimeTypes: 'image/*'
            }
        });


        // 当有文件添加进来的时候
        uploader.on( 'fileQueued', function( file ) {
            var $li = $(
                '<div id="' + file.id + '" class="file-item thumbnail">' +
                '<img>' +
                '<div class="info">' + file.name + '</div>' +
                '</div>'
                ),
                $img = $li.find('img');

            var $list=$("#fileList");

            // $list为容器jQuery实例
            $list.append( $li );

            // 创建缩略图
            // 如果为非图片文件，可以不用调用此方法。
            // thumbnailWidth x thumbnailHeight 为 100 x 100
            uploader.makeThumb( file, function( error, src ) {
                if ( error ) {
                    $img.replaceWith('<span>不能预览</span>');
                    return;
                }

                $img.attr( 'src', src );
            }, 100, 100 );
        });

        // 文件上传过程中创建进度条实时显示。
        uploader.on( 'uploadProgress', function( file, percentage ) {

            var $li = $( '#'+file.id ),
                $percent = $li.find('.progress span');

            // 避免重复创建
            if ( !$percent.length ) {
                $percent = $('<p class="progress"><span></span></p>')
                    .appendTo( $li )
                    .find('span');
            }

            $percent.css( 'width', percentage * 100 + '%' );
        });

        // 文件上传成功，给item添加成功class, 用样式标记上传成功。
        uploader.on( 'uploadSuccess', function( file,data ) {
            $( '#'+file.id ).addClass('upload-state-done');
            $("#upload").val(data.img)
        });

        // 文件上传失败，显示上传出错。
        uploader.on( 'uploadError', function( file ) {
            var $li = $( '#'+file.id ),
                $error = $li.find('div.error');

            // 避免重复创建
            if ( !$error.length ) {
                $error = $('<div class="error"></div>').appendTo( $li );
            }

            $error.text('上传失败');
        });

        // 完成上传完了，成功或者失败，先删除进度条。
        uploader.on( 'uploadComplete', function( file ) {
            $( '#'+file.id ).find('.progress').remove();
        });

    </script>

    @endsection