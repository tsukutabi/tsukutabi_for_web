<?php echo $this->Html->css(array('slider-pro.min','uikit','index'));
    echo $this->fetch('css');?>
<style>
    /** General page styling **/

</style>

<h1 class="main_h1">つくたび</h1>

<form action="search/index" method="post" accept-charset="utf-8" class="SerchArticle uk-form">
 <input type="text" name="" class="SerchInput" value="" placeholder="検索して下さい">
</form>
  <p class="main_p">do travel, share it</p>
<?php echo $this->element('slider');?>


<div class="uk-conatiner">
<header>
    <nav class="uk-navbar" data-uk-sticky> 

        <ul class="uk-navbar-nav">
            <?php if (isset($username)) {
    echo   '<li ><a href="'.FULL_BASE_URL.'/cakephp/users/users/view/'."$username".'"">'. "$username" .'</a></li>';
            } else{
            echo '<li>';
            echo $this->html->link('ログイン画面',
            array(
            'controller'=>'users',
            'action'=>'login'
            ),
            array(
            'target'=>'_blank'
            ));
            echo '</li><li>';
            echo $this->html->link('会員登録',
            array(
            'controller'=>'users',
            'action'=>'add'
            ),
            array(
            'target'=>'_blank'
            ));
            echo "</li>";
            }?>
            <li ><?php echo $this->Html->link('旅行記作成', '/posts/add/'); ?></li>
       </ul>
        <ul class="uk-navbar-nav center-nav" id="filters">

            <li data-filter="amsterdam">Amsterdam</li>
            <li data-filter="tokyo">Tokyo</li>
            <li data-filter="london">London</li>
            <li data-filter="paris">Paris</li>
            <li data-filter="berlin">Berlin</li>
            <li data-filter="sport">Sport</li>
            <li data-filter="fashion">Fashion</li>
            <li data-filter="video">Video</li>
            <li data-filter="art">Art</li>
        </ul>

        <div class="uk-navbar-flip center-nav">
            <ul class="uk-navbar-nav">
                <li class="uk-parent" data-uk-dropdown>
                    <a href="">facebook</a>
                    <div class="uk-dropdown uk-dropdown-navbar">
                        <ul class="uk-nav uk-nav-navbar">
                           <p>facebookですね!!</p>
                        </ul>
                    </div>
                </li>
                <li class="uk-parent" data-uk-dropdown>
                    <a href="">twitter</a>
                    <div class="uk-dropdown uk-dropdown-navbar">
                        <ul class="uk-nav uk-nav-navbar">
                            <p>伸びしろです</p>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>



    <div role="main">
        <ul id="container" class="tiles-wrap animated">

      <?php foreach ($posts as $post) :?>

            <li data-filter-class='["london", "art"]' class="main_tiles pic_box">
            
                <img src="/cakephp/img/<?php
$string = $post['Post']['MainImg'];
$pattern = '/\/Applications\/XAMPP\/xamppfiles\/htdocs\/cakephp\/app\/webroot\/img\//';
$replacement = '';
echo preg_replace($pattern, $replacement, $string);
 ?>" height="283" >
                <span>
                <a href="posts/view/<?php echo h($post['Post']['id']);?>" target="_blank"><p><?php echo h($post['Post']['MainTitle']);?></p></a>
                </span>
            </li>
            <?php endforeach; ?>
     </ul>

</div><!--container-->


                <h2 class="title"></h2>
                <p>London Art</p> 


     <?php echo $this->Html->script(array('jquery.sliderPro.min.js','uikit.js','index.js','wookmark.min.js','imagesloaded.pkgd.min.js',''));
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


(function($) {
    // Instantiate wookmark after all images have been loaded
    var wookmark;
    imagesLoaded('#container', function() {
        wookmark = new Wookmark('#container', {
            fillEmptySpace: true // Optional, fill the bottom of each column with widths of flexible height
        });
    });

    // Setup filter buttons when jQuery is available
    var $filters = $('#filters li');

    /**
     * When a filter is clicked, toggle it's active state and refresh.
     */
    function onClickFilter(e) {
        var $item = $(e.currentTarget),
                activeFilters = [],
                filterType = $item.data('filter');

        if (filterType === 'all') {
            $filters.removeClass('active');
        } else {
            $item.toggleClass('active');

            // Collect active filter strings
            $filters.filter('.active').each(function() {
                activeFilters.push($(this).data('filter'));
            });
        }

        wookmark.filter(activeFilters, 'and');
    }

    // Capture filter click events.
    $('#filters').on('click.wookmark-filter', 'li', onClickFilter);
})(jQuery);

    </script>

    <script type="text/javascript">
$(function(){
        
        $('.pic_box').hover(function(){
                $('>span',this).animate({
                                        top:"0px"
                                        }, 500 );
                },function(){
                $('>span',this).animate({
                                        top:"200px"
                                        }, 500 );
                 
        });
});
</script>


    <div class="pic_box">
    <img src="/cakephp/img/4c3627de8a01c3f00e59467749633a2c.png" height="283">
    <span>
<p><a href=""></a></p>
</span></div>


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


    <?php echo $this->Js->writeBuffer(); ?>


