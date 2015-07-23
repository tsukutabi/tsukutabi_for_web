<?php	$this->set('title_for_layout',$post['Post']['MainTitle']);?>
<?php echo $this->Html->script(array('sly.js','hor.js'));?>
<?php echo $this->Html->css(array('view'));
    echo $this->fetch('css');?>
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
<div class="edit">
<?php if($post['Post']['user_id']==$user_id){
    echo $this->Html->link('編集',array('action'=>'edit',$post['Post']['id']));
    echo $this->Form->postLink('削除',array('action'=>'delete',$post['Post']['id']),array('confirm'=>'削除してもよろしいですか?'));
}?>
</div>





<p><?php echo h($post['Post']['SubTitle']);?></p>
<?php $images = explode(',',$post['Post']['Images'])?>
<?php print_r($images)?>
<div class="wrap">
<div class="scrollbar">
    <div class="handle"></div>
    <div class="mousearea"></div>
</div>

<div class="frame effects" id="effects" >
    <ul class="clearfix">
<?php
foreach ($images as  $value) {
	echo '<li><img class="slider" src="/cakephp/img/'.$value;
	echo ' " ></li>';
  $img_for_exif = 'tsukutabi.raindrop.jp/testnews/img/'.$value;
}
?><li>
       <p>written by <?php ?></p>

    </li>
</ul>
</div>
    <div class="controls center">
    <button class="btn prev"><i class="icon-chevron-left"></i> prev</button>
    <button class="btn next">next <i class="icon-chevron-right"></i></button>
  </div>

</div>

            <ul class="pages"></ul>

<br>
<ul>
<?php foreach($post['Comment']as$comment):?>
<li id="comment">
<?php echo h($comment['body'])?> by <?php echo h($comment['user_id']); ?>
<?php echo $this->Form->postLink(
                '削除',
                array(
                	'controller'=>'Comments',
                	'action' => 'delete',$comment['id']),
                array('confirm' => '本当に削除してもよろしいでしょうか??'));?>
</li>
<?php endforeach; ?>
</ul>
<p>コメント</p>
<?php
echo $this->Form->create('Comment',array('action'=>'add'));
echo $this->Form->input('body',array('row'=>'3','label'=>'本文'));
echo $this->Form->input('Comment.post_id',array('type'=>'hidden','value'=>$post['Post']['id']));
echo $this->Form->end('送信');
?>

<h3><?php
  print_r($img_for_exif);
  chmod("$img_for_exif",0755);
  chmod("/img/35775cf2a4e5b5f1d778f34785567e12.jpg",0777);
  echo "string";
  $exif= exif_read_data("/testnews/img/35775cf2a4e5b5f1d778f34785567e12.jpg",0,true);
  print_r($exif);
  ?>
</h3>

<img src="/testnews/img/35775cf2a4e5b5f1d778f34785567e12.jpg" alt="">


<!-- <script type="text/javascript">

  $('img').error(function(){
      $(this).attr({
            src: '/testnews/images/logo.png',
              alt: 'エラー',
              style:'border: 0px solid #fff;width:400px;height:400px;'
       });
    });
</script> -->