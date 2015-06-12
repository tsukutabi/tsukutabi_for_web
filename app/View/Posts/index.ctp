<?php echo $this->Html->css(array('slider-pro.min','index'));
    echo $this->fetch('css');?>

<h1 class="main_h1">つくたび</h1>
  <p class="main_p">do travel, share it</p>
<?php echo $this->element('slider');?>
<header>
  <nav>
  <ul class="left">
    <li><button class="uk-button" data-uk-modal="{target:'#user-login'}">ログイン画面</button>
    <?php echo $this->Html->link('ログイン', '/users/login/'); ?></li>
    <li><button class="uk-button" data-uk-modal="{target:'#user-register'}">会員登録</button>
<!--     <?php echo $this->Html->link('新規ユーザ登録', '/users/add/'); ?> -->    </li>
    <li><?php echo $this->Html->link('旅行記作成', '/posts/add/'); ?></li>
  </ul>

  <ul class="right">
    <li><a href="">facebook</a></li>
    <li><a href="">twitter</a></li>
  </ul>
  </nav>
  </header>


<!-- This is the modal -->
<div id="user-login" class="uk-modal">
    <div class="uk-modal-dialog">
    <div class="uk-modal-header"><p class="textcenter">ユーザーログイン画面</p></div>
    <form class="uk-form">
        email<input type="text" placeholder="email" class="uk-form-width-medium">
        password <input type="text" class="uk-form-width-medium" name="" value="" placeholder="password"><br>

        </form>
        <div class="uk-modal-footer">...</div>
        <a class="uk-modal-close uk-close"></a>

    </div>
</div>

<div id="user-register" class="uk-modal">
  <form action="index_submit" method="post" class="uk-form" accept-charset="utf-8">
     <div class="uk-modal-dialog">
        <div class="uk-modal-header"><p class="textcenter">新規会員登録</p></div>
    email<input type="text" placeholder="email" class="uk-form-width-medium">
        password <input type="text" class="uk-form-width-medium" name="" value="" placeholder="password"><br>

        ユーザー名<input type="text" name="" value="" placeholder="ユーザー名" class="uk-form-width-medium">
    規約に同意する<input type="checkbox" class="uk-checkbox" name="" value="">
        <div class="uk-modal-footer">
          送信する
        </div>
  </form>
  </div>
</div>
<!-- modalここまで -->
                             <!--  <ol class="wrapper"><?php
                                   echo $this->Html->link('会員登録',
                                        array('controller'=>'users','action'=>'signup',
                                        )
                                        );
                                   ?></ol>
                                   <ol><?php
                                   echo $this->Html->link('ログイン',array('controller'=>'users','action'=>'login'));
                                   ?></ol>-->
<!-- <ol><?php echo $this->Html->link('旅行記 作成',array('controller'=>'posts','action'=>'add'));?></ol>
                    </li> -->
                    <!-- <li id="top_sns">
                         <a href=""  ><img src="img/twitter-b.png" alt="twitter" class="twitter" ></a>
                          <a href="">
                          <img src="img/facebook-a.png" alt="facebook" class="facebook">
                         </a>
                    </li> -->
<ul class="tiles">
      <?php foreach ($posts as $post) :?>
<a href="/testnews/posts/view/<?php echo h($post['Post']['id'])?>" >
  <li class="posts">
  <p class="title"><?php echo h($post['Post']['title']);?></p>
  <?php echo $this->Html->link($post['Post']['title'],'/posts/view/'.$post['Post']['id']);?>
  <img src="/testnews/img/<?php echo h($post['Post']['mainimg']); ?>" alt="">
<p class="body"><?php echo h($post['Post']['body']);?></p>
  </li></a>
     <?php endforeach; ?>
     </ul>


<?php echo $this->element('footer');?>



     <?php echo $this->Html->script(array('jquery.sliderPro.min.js','index.js'));
    echo $this->fetch('script');?>

    <script type="text/javascript">
$( document ).ready(function( $ ) {
    $( '#example1' ).sliderPro({
      width: 2000,
      height: 750,
      arrows: true,
      buttons: false,
      waitForLayers: true,
      thumbnailWidth: 200,
      thumbnailHeight: 100,
      thumbnailPointer: true,
      autoplay: false,
      autoScaleLayers: false,
      breakpoints: {
        500: {
          thumbnailWidth: 120,
          thumbnailHeight: 50
        }
      }
    });
  });


</script>
