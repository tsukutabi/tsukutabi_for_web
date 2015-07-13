
<?php echo $this->Html->script(array('jQuery.js')); ?>

<style>
    .postaddmainh2{
        text-align: center;
        font-size: medium;
    }

    body{
        font: 13px Verdana;
        background: #eee;
        color: #333
    }

    .none{
        display: none;
    }
    #previewArea {
        overflow: hidden;
    }
    #previewArea img{
        width: 200px;
        float: left;
    }
    
</style>
<?php echo $this->Html->css('jquery.ui.plupload.css'); ?>

<nav class="navbar navbar-default"><h2 class="postaddmainh2">旅行記を作成して下さい。</h2></nav>



<!--<form id="form" id="upload-form" method="post" enctype="multipart/form-data" onSubmit="return upload(this);">-->
<!--&lt;!&ndash;<div id="uploader">&ndash;&gt;-->
    <!--&lt;!&ndash;<p>Your browser doesn't have Flash, Silverlight or HTML5 support.</p>&ndash;&gt;-->
<!--&lt;!&ndash;</div>&ndash;&gt;-->


    <!--<input type="file" name="files[]" multiple>-->
    <!--<input type="submit" value="Submit" />-->
<!--</form>-->

<div class="container">

<form id="upload-form" method="post" enctype="multipart/form-data" onSubmit="return upload(this);">
    <input type="text" class="form-control" placeholder="" name="MainTitle">
    <br>
    <input type="text" class="form-control" placeholder="" name="SubTitle">



    <input id="upload-form-file" class="FormObservation" name="userfile[]" onchange="preview(this);" type="file" accept="image/*;capture=camera" multiple/>
    <br>
<div class="test">

</div>

    <div id="previewArea" style="width:90%; height:300px;">
    </div>


    <input type="submit" name="submit" value="OK" />
</form>


</div>
<script type="text/javascript">
    $(function(){

        $(document).on('change','.FormObservation', function() {

//            後で file.input.type.valueが!nullな時に以下を実行する（未実装）


//
                $('.test').append('<input type="file" name="userfile[]" multiple class="FormObservation" onchange="preview(this);">');
            $(this).addClass("none");





        });



    $('')


    });
    function upload(form) {
        $form = $('#upload-form');
        fd = new FormData($form[0]);
        $.ajax(
                'loaclhost/cakephp/posts/imgadd/',
                {
                    type: 'post',
                    processData: false,
                    contentType: false,
                    data: fd,
                    dataType: "json",
                    success: function(data) {
                        alert( data.message );
                        console.log(data);
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert( "ERROR" );
                        alert( textStatus );
                        alert( errorThrown );
                    }
                });
        return false;
    }

    function preview (e) {
        // ファイル未選択
        if (!e.files.length) return;
        // ファイルを1件ずつ処理する
        var errMsg = "";
        for (var i = 0; i < e.files.length; i++) {
            var file = e.files[i];
            // 想定したMIMEタイプでない場合には処理しない
            if (!/^image\/(png|jpeg|gif)$/.test(file.type)) {
                errMsg += "ファイル名: " + file.name + ", 実際のMIMEタイプ: " + file.type + "\n\n";
                continue;
            }
            // Imageを作成
            // imgとかfr変数は、ループごとに上書きされるので、
            // onloadイベントで上書きされた変数にアクセスしないために
            // fr.tmpImgなどに一時的にポインタを保存したり、
            // onload関数内では、frやimgでなくthisでアクセスする。
            var img = document.createElement('img');

            var fr = new FileReader();
            fr.tmpImg = img;
            fr.onload = function () {
                this.tmpImg.src = this.result;
                this.tmpImg.onload = function () {
                    document.getElementById('previewArea').appendChild(this);

//                    $(this).after('<input type="text" name="ImgComments[]">');

                }
            }
            // 画像読み込み
            fr.readAsDataURL(file);
        }

        // エラーがあれば表示する
        if (errMsg != "") {
            errMsg = "以下ファイルはMIMEタイプが対応していません。\n"
            + "MIMEタイプはimage/png, image/jpeg, image/gifのみ対応です。\n\n"
            + errMsg;
            alert(errMsg);
        }
    }

</script>