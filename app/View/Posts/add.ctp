<!-- Force latest IE rendering engine or ChromeFrame if installed -->
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<![endif]-->
<header id="header" class="uk-block-primary">
    <h1>つくたび 記事作成ページ</h1>
</header><!-- /header -->
<div class="uk-container">
    <h2 class="lead">あなたの旅行をまとめて下さい。</h2>



    <?php echo $this->form->create('Post', array('type'=>'post','action'=>'add','onsubmit'=>'retrun confrim("旅行記を公開します。よろしいでしょうか?")'
    ));?>
    <?php echo $this->form->text('MainTitle');?>
    <input type="file" name="file" onchange="preview(this);" multiple="multiplle"/><br>
    <span style="font-size:small;">※ 複数ファイル選択可</span><br>
    <br>
    <div id="previewArea" style="width:90%; height:300px;">
    <?php echo $this->form->end('保存');?>



<script>

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
<style type="text/css" media="screen">
	#jquery-ui-sortable{
		cursor:move;
	}
	#add-header{
		background-color: black;
		color: white;
	}


    .thumb {
        height: 75px;
        border: 1px solid #000;
        margin: 10px 5px 0 0;
    }
</style>

    </div>