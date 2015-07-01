<!-- Force latest IE rendering engine or ChromeFrame if installed -->
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<![endif]-->
<header id="header" class="uk-block-primary">
    <h1>つくたび 記事作成ページ</h1>
</header><!-- /header -->
<div class="uk-container">
    <h2 class="lead">あなたの旅行をまとめて下さい。</h2>
   <!--  <?php echo $this->form->create('posts',array('type'=>'post','action'=>'imgadd','onsubmit'=>'retrun confirm("旅行記を公開します。よろしいでしょうか?");')); ?> -->

<!--<?php echo $this->form->create('add',array('type'=>'post','class'=>'uk-form','id'=>'qq-form','onsubmit'=>'return confirm("旅行記を公開してもよろしいですか??")')); ?>-->

<!--&lt;!&ndash; <form action="server/uploads.php" id="qq-form" class="uk-form">-->
 <!--&ndash;&gt;-->
            <!--<input type="text" name="MainTitle" required class="uk-form text_ titles" placeholder="旅行記のタイトルを入れて下さい。">-->
            <!--<br>-->

            <!--<input type="text" name="SubTitle" required class="uk-form text_ titles" placeholder="旅行の感想、説明を教えて下さい。">-->
<!--<div id="fine-uploader-manual-trigger"></div>-->
<!--<input type="submit" value="Done" class="uk-width-1-1 submit uk-button uk-button-primary uk-button-large"-->
<!--style="border:none;" id="qqform">-->
   <!--</div>-->
<?php echo $this->form->create(
    'Post',
    array('type'=>'post','action'=>'add','onsubmit'=>'retrun confrim("旅行記を公開します。よろしいでしょうか?")')
);?>
    <?php echo $this->form->type('Mai')?>
<?php echo $this->form->text('MainTitle');?>
<?php echo $this->form->end('保存');?>
    <!--<form type="POST" >-->
        <!--<input type="text" name="maintitle">-->
        <!--<input type="file" name="photos[]" multiple>-->
        <!--<input type="submit">-->
    <!--</form>-->


<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script>


 $('#fine-uploader-manual-trigger').fineUploader({
             template: 'qq-template-manual-trigger',
             request: {
                 endpoint: 'localhost/cakephp/posts/add'
             },
             thumbnails: {
                 placeholders: {
                     waitingPath: '/source/placeholders/waiting-generic.png',
                     notAvailablePath: '/source/placeholders/not_available-generic.png'
                 }
             },
             autoUpload: false,
             uploadStoredFiles:true,
                multiple:true

         });

 $('#trigger-upload').click(function() {
             $('#fine-uploader-manual-trigger').fineUploader('uploadStoredFiles');
 });


// $(function () {
//     $('#fileupload').fileupload({
//         dataType: 'json',
//         add: function (e, data) {
//             data.context = $('<button/>').text('Upload')
//                 .appendTo(document.body)
//                 .click(function () {
//                     data.context = $('<p/>').text('旅行記をアップロードしています。').replaceAll($(this));
//                     data.submit();
//                 });
//         },
//         done: function (e, data) {
//             data.context.text('Upload finished.');
//         }
//     });
// });
</script>
<style type="text/css" media="screen">
	#jquery-ui-sortable{
		cursor:move;
	}
	#add-header{
		background-color: black;
		color: white;
	}
</style>