<?php echo $this->Html->script(array('jQuery.js')); ?>

<?php echo $this->Html->css('jquery.ui.plupload.css'); ?>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">


<style>
    .postaddmainh2{
        text-align: center;
        font-size: medium;
    }

    body{
        font: 13px Verdana;
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
    .send_btn{
        width: 50%;
        text-align: center;
        margin: 0 auto;
        margin-left: 22%;
        border: 1px solid;
    }
    .send_btn:hover{
        border: 1px solid;
    }
     .PostsAddFooter{
        margin-left: 22%;
        margin-top: 120px;
    }

    .kiyaku{
    width: 65%;
    }
</style>


<nav class="navbar navbar-default"><h2 class="postaddmainh2">旅行記を作成して下さい。</h2></nav>


<div class="container">

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <!--<script src="../js/fileinput.min.js" type="text/javascript"></script>-->
        <!--<script src="../js/fileinput_locale_fr.js" type="text/javascript"></script>-->
        <!--<script src="../js/fileinput_locale_es.js" type="text/javascript"></script>-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript"></script>

    <?php echo  $this->Html->script(array("plupload.full.min.js","fileinput.min.js"));?>
    <?php echo $this->Html->css("fileinput.min");?>

<form enctype="multipart/form-data" id="upload-form" method="post">
    <input type="text" name="MainTitle" class="form-control" placeholder="" id="Main" required="true"><br>
    <input type="text" name="SubTitle" class="form-control" placeholder="" id="Sub" required><br>
    <input type="hidden" name="user_id" value='<?php echo "$userid";?>'>
    <input type="date">
    <div class="form-group">
        <input  id="input-id" name="photos[]" class="file" type="file" multiple data-preview-file-type="any"  data-preview-file-icon="" >
    </div>
    <input type="submit"  class="btn btn-link btn-lg send_btn" confirm>
    <br>
</form>
    <script>


//        $('#Main').on("change",(function(){
//             Main =$("#Main").val();
//        }))
//
//
//        $('#Sub').on("change",(function(){
//            Sub =$("#Sub").val();
//
//        }))

        $("#input-id").fileinput({
            uploadUrl: 'localhost/cakephp/posts/add',
            allowedFileExtensions : ['jpg', 'png','gif'],
            multiple:true,
            uploadAsync:false,
            previewFileType:'any',
            showUpload:false,
                uploadExtraData: {
                    maintitle:Main,
                    SubTitle:Sub,
                    User_Id:'<?php echo "$userid";?>'
                }
        });


//     監視しておいて 生成さらたらaddClassして そこから飛ばす??



//
//        )
//
//        $('#input-id').on('filebatchpreupload', function(event, data, previewId, index) {
//            var form = data.form, files = data.files, extra = data.extra,
//                  response = data.response, reader = data.reader;
//
//
//        });
//    function jump(){
//        location.href = "localhost/cakephp/";
//    }

    </script>
<footer class="PostsAddFooter">

<div class="list-group kiyaku">
<li class="list-group-item active">写真を投稿する際のお願い</li>
    <li class="list-group-item">アップロードする写真は80枚までにして下さい。</li>
    <li class="list-group-item">拡張子は<strong>jpg png gif</strong>のみにして下さい。</li>
    <li class="list-group-item">アップロードされた写真の所有権はtsukutabi.,Incが所有致します。(ただし、第三者に提供することなどはございませんのでご安心下さい。)</li>
</div>


</footer>
</div>