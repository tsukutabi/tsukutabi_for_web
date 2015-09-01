<style>
    .frame ul li{
        color: lightsteelblue;
        background-color: rgba(255,240,1,0.5);
    }
</style>

<div id="wrap">

<?php echo $this->Html->script(array('jQuery.js','sly.js','hor.js'));?>
<?php echo $this->Html->css('view');?>
<!-- view.js -->
<script type="text/javascript">
jQuery(function($){
  'use strict';
  // -------------------------------------------------------------
  //   Effects
  // -------------------------------------------------------------
  (function () {
    var $frame = $('#effects');
    var $wrap  = $frame.parent();

    // Call Sly on frame
    $frame.sly({
      horizontal: 1,
      itemNav: 'forceCentered',
      smart: 1,
      activateMiddle: 1,
      activateOn: 'click',
      mouseDragging: 1,
      touchDragging: 1,
      releaseSwing: 1,
      startAt: 3,
      scrollBar: $wrap.find('.scrollbar'),
      scrollBy: 1,
      speed: 300,
      elasticBounds: 1,
      easing: 'swing',
      dragHandle: 1,
      dynamicHandle: 1,
      clickBar: 1,

      // Buttons
      prev: $wrap.find('.prev'),
      next: $wrap.find('.next')
    });
  }());
});
</script>
<div class="view_main_title">
<h1 class="h1"><?php echo h($post['Post']['MainTitle']); ?>  </h1>
<input type="text" class="uk-form flt_rgt" placeholder="検索"> 
</div>
<span class="SubTitle"><?php echo h($post['Post']['SubTitle']);?></span>
<div class="edit">
<?php if($post['Post']['user_id']==$user_id){
    echo $this->Html->link('編集',array('action'=>'edit',$post['Post']['id']));
    echo $this->Form->postLink('削除',array('action'=>'delete',$post['Post']['id']),array('confirm'=>'削除してもよろしいですか?'));
}?>
</div>

<div class="wrap">
<div class="scrollbar">
    <div class="handle"></div>
    <div class="mousearea"></div>
</div>
<div class="frame effects" id="effects" >
    <ul class="clearfix">
        <li>
            <?php echo $_SESSION['_Token']['csrfTokens'][0];?>
            <?php var_dump($_SESSION['_Token']['csrfTokens']);?>
        </li>
        <li id="time_titles">
            <?php foreach ($post['Comment'] as $comment): ?>
                <p class="UserComment" id="comment_<?php h($comment['id']);?>">
        <?php echo h($comment['body']);?> by <?php echo h($comment['user_id']); ?>
        <?php echo $this->Html->link('削除','#',array('class'=>'delete','data-comment-id'=>$comment['id'])); ?>
                </p>

            <?php endforeach;?>

            <!-- 削除用 js by たにはた-->

            <script>
                $(function(){
                    $('a.delete').click(function(e){
                        if(confirm('本当に削除してもいいですか??')){
                            $.post('/cakephp/comments/delete/'+$(this).data('comment-id'),{},function(res){
                                $('#comment_'+res.id).fadeOut();
                            },"json");
                        }
                        return false;
                    })
                })
            </script>


            <!-- /削除用js-->

            <?php
            echo $this->Form->create('Comment',array('action'=>'add'));
            echo '<div class="uk-form-row">';
            echo $this->Form->input('body', array(
            'label'=>false,
            'div'=>false,
            'class'=>'uk-width-1-1 uk-form-large',
            'placeholder' => __d('users', 'ユーザー名')));

            echo '</div>';
            echo $this->Form->input('Comment.user_id',array('type'=>'hidden','value'=>$_SESSION['Auth']['User']['id']));
            echo $this->Form->input('Comment.post_id',array('type'=>'hidden','value'=>$post['Post']['id']));
            echo $this->Form->end('保存');
            ?>
        </li>
        <?php
        $images = explode(',',$post['Post']['Images']);
        foreach ($images as  $value) {
	    echo '<li><img class="slider" src="/cakephp/img/'.$value;
	    echo ' " ></li>';
        }?>
        <li>

            <?php  ?>

            <div id="contents_sample_wrap">
                <div class="text_box">3</div>
                <input type="button" value="お気に入り" id="fav"/><!--クリックしたときにtext()を実行-->
            </div>
            <p>written by <?php echo $post['User']['username']; ?></p>


        </li>
        <li>
            <?php
            echo $this->Form->create();
            echo $this->Form->input('name');
            echo $this->Js->submit('Send', array(
            'before'=>$this->Js->get('#sending')->effect('fadeIn'),
            'success'=>$this->Js->get('#sending')->effect('fadeOut'),
            'update'=>'#success'
            ));
            echo $this->Form->end();
            ?>
            <div id="success"></div>
            <div id="sending"></div>
        </li>


</ul>
</div>

  <div class="googlemaps_view">
    <script type="text/javascript"></script>
  </div>

    <div class="controls center">
    <p class="nameofsite">つくたび.com</p>
    <button class=" prev uk-botton"><i class="icon-chevron-left"></i> prev</button>
    <button class=" next uk-botton">next <i class="icon-chevron-right"></i></button>

   <!--  <a class="view_sns" href="http://b.hatena.ne.jp/entry/hoge.html[共有したいURL]" class="hatena-bookmark-button" data-hatena-bookmark-layout="simple" title="任意のタイトル">はてなブックマークに追加  </a> -->

    <a class="uk-icon-button view_sns uk-icon-twitter" href="http://twitter.com/share?url=<?php echo "FULL_BASE_URL"."";?>&text=<?php echo h($post['Post']['MainTitle']); ?>&via=[ツイート内に含まれるユーザー名]&related=[関連アカウント]" target="_blank"></a>

    <a class="uk-icon-button uk-icon-facebook view_sns" href="http://www.facebook.com/share.php?u=[共有したいURL]" onclick="window.open(this.href, 'FBwindow', 'width=650, height=450, menubar=no, toolbar=no, scrollbars=yes'); return false;"></a>

    
    
  </div>
  
</div>

            <ul class="pages"></ul>

<br>
<ul>
<?php foreach($post['Comment']as$comment):?>
<li id="comment">
<?php echo h($comment['body'])?> by <?php echo h($comment['user_id']); ?>
    <p>コメント</p>
    <?php
echo $this->Form->create('Comment',array('action'=>'add'));
    echo $this->Form->input('body',array('row'=>'3','label'=>'本文'));
    echo $this->Form->input('Comment.post_id',array('type'=>'hidden','value'=>$post['Post']['id']));
    echo $this->Form->end('送信');
    ?>
</li>

    <?php echo $this->Form->postLink(
                '削除',
                array(
                	'controller'=>'Comments',
                	'action' => 'delete',$comment['id']),
                array('confirm' => '本当に削除してもよろしいでしょうか??'));?>
</li>
<?php endforeach; ?>
</ul>


    < ?php echo $html->formTag() ?>
    <input type=”hidden” name=”data[_Token][key]” value=”6ab2d0043ab0a0d7974324ccefe17806cb1279d5″ id=”Token1858912179 targetform″>

    <script>
        var click_count = 3;
        //▼▼ページ要素が操作可能になったときの処理
        $(function(){
            //▼▼ボタンがクリックされたときの処理
            //▼▼inputタグのtype属性buttonにアクセスするセレクタ
            $("#fav").click(function(e){
                //▼▼"#contents_sample_wrap .text_box"タグに書き込む
                click_count++;
                $("#contents_sample_wrap .text_box").text( click_count);
                $.ajax({
                    type:'POST',
                    url: 'http://112.168.33.10/cakephp/favs/add/',
                    dataType: 'json',
                    data : { user_id :<?php if (isset($user_id)){echo "$user_id";}?>,
                        'data[_Token][key]':
                        post_id :<?php echo($post['Post']['id']);?> },
                    timeout:10000,
                    success: function(data) {
                        alert("ok");
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert("error");
                    }
                });

            });
        });
    </script>

    <!-- <script type="text/javascript">

      $('img').error(function(){
          $(this).attr({
                src: '/testnews/images/logo.png',
                  alt: 'エラー',
                  style:'border: 0px solid #fff;width:400px;height:400px;'
           });
        });
    </script> -->




