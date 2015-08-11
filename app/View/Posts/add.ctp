<?php echo $this->Html->script(array('jQuery.js')); ?>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
<style>
    #suggest {
        position: absolute;
        background-color: #FFFFFF;
        border: 1px solid #CCCCFF;
        font-size: 90%;
        width: 200px;
    }
    #suggest div {
        display: block;
        width: 200px;
        overflow: hidden;
        white-space: nowrap;
    }
    #suggest div.select{ /* キー上下で選択した場合のスタイル */
        color: #FFFFFF;
        background-color: #3366FF;
    }
    #suggest div.over{ /* マウスオーバ時のスタイル */
        background-color: #99CCFF;
    }
    .mg-t{
        margin-bottom: 40px ;
    }
</style>
<nav class="navbar navbar-default"><h2 class="postaddmainh2">旅行記を作成して下さい。</h2>
</nav>

<div class="container">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript"></script>
    <?php echo  $this->Html->script(array("fileinput.js","suggest.js"));?>
    <?php echo $this->Html->css(array("fileinput.min","postsadd"));?>
<form enctype="multipart/form-data" id="upload-form" method="post">
    <input type="text" name="MainTitle" class="form-control" placeholder="旅行記のタイトル" id="Main" required="true"><br>
    <input type="text" name="SubTitle" class="form-control" placeholder="旅の概要を教えて下さい。" id="Sub" required><br>
    <input type="hidden" name="user_id" value='<?php echo "$userid";?>'>
    <br>
    <div class="input_data">
        <p class="for_data datas">出発日を教えて下さい。<input type="date" name="DepartureData"></p>
        <p class="arrival_data datas">到着日を教えて下さい。<input type="date" name="BackedData"></p>
    </div>


    <!-- 入力フォーム -->
    <input id="text" type="text" name="tags" value="" autocomplete="off" placeholder="旅行のタグを付けて下さい" size="10" style="display: block" class="form-control mg-t">
    <!-- 補完候補を表示するエリア -->
    <div id="suggest" style="display:none;"></div>

    <div class="form-group">
        <input  id="input-id" name="photos[]" class="file" type="file" multiple data-preview-file-type="any" data-preview-file-icon="" >
    </div>
    <br>
</form>



    <script>

        <!-- form type=text系を監視しておいて、 uploadextraに付け加えて、アップロードできるようにしておく。-->
        var Main ="a";
        var Sub = "b";

        $("#input-id").fileinput({
            uploadUrl: "<?php echo FULL_BASE_URL; ?>/cakephp/posts/add",
            allowedFileExtensions : ['jpg','png','gif','jpeg'],
            multiple:true,
            uploadAsync:false,
            previewFileType:'any',
            maxFileCount: 80,
                uploadExtraData: {
                    maintitle:Main,
                    SubTitle:Sub,
                    User_Id:'<?php echo "$userid";?>'

                }

        });

        $("input-id").on(clicked,function(){
            location.href="<?php echo FULL_BASE_URL; ?>cakephp/users/view/<?php echo $userid ;?>"
        })



    </script>

    <script>

        var list=[ <?php foreach ($tag_name as $value){
            echo '"';
            print_r ($value['tags']['name']);
            echo '"';
            echo ",";}?>"umi"];

        console.log(list);

        new Suggest.Local("text", "suggest", list);

        function startSuggest() {
            new Suggest.Local(
                    "text",    // 入力のエレメントID
                    "suggest", // 補完候補を表示するエリアのID
                    list,      // 補完候補の検索対象となる配列
                    {dispMax: 10, interval: 1000}); // オプション
        }

        window.addEventListener ?
                window.addEventListener('load', startSuggest, false) :
                window.attachEvent('onload', startSuggest);
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