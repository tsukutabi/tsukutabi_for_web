<?php echo $this->Html->script(array('sly.js','hor.js'));?>
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
<h1 class="h1"><?php echo h($post['Post']['MainTitle']); ?></h1>
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
        <li id="time_titles"><input type="text" class="Comment"></li>
<?php
$images = explode(',',$post['Post']['Images']);
foreach ($images as  $value) {
	echo '<li><img class="slider" src="/cakephp/img/'.$value;
	echo ' " ></li>';
}
?>
        <li>

        </li>

        <li>
       <p>written by <?php echo $post['User']['username']; ?></p>

    </li>
</ul>
</div>
    <div class="controls center">
    <button class=" prev uk-botton"><i class="icon-chevron-left"></i> prev</button>
    <button class=" next uk-botton">next <i class="icon-chevron-right"></i></button>
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
<!-- <script type="text/javascript">

  $('img').error(function(){
      $(this).attr({
            src: '/testnews/images/logo.png',
              alt: 'エラー',
              style:'border: 0px solid #fff;width:400px;height:400px;'
       });
    });
</script> -->