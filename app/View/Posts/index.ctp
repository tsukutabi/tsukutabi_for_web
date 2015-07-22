<?php echo $this->Html->css(array('slider-pro.min','uikit','index'));
    echo $this->fetch('css');?>
<style>
    /** General page styling **/

</style>


<h1 class="main_h1">つくたび</h1>
<form action="serch/index" method="post" accept-charset="utf-8" class="SerchArticle uk-form">
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
        <ul class="uk-navbar-nav center-nav">
            <li data-filter="amsterdam"><a href=""> Amsterdam</a></li>
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


<ul class="tiles">
      <?php foreach ($posts as $post) :?>
<!--<a href="/cakephp/posts/view/<?php echo h($post['Post']['id'])?>" >-->
    <a href="posts/view/<?php echo h($post['Post']['id']);?>">
  <li class="posts">
  <p class="title"><?php echo h($post['Post']['MainTitle']);?></p>
      <img src="/cakephp/img/<?php

             // 変数代入
$string = $post['Post']['MainImg'];


$pattern = '/\/Applications\/XAMPP\/xamppfiles\/htdocs\/cakephp\/app\/webroot\/img\//';

$replacement = '';


// ②置換後
echo preg_replace($pattern, $replacement, $string);

 ?>">


    <p class="body"><?php echo h($post['Post']['SubTitle']);?></p>
    </li></a>
        <?php endforeach; ?>
     </ul>

</div><!--container-->


<div>
    <ol id="filters">
        <li data-filter="amsterdam">Amsterdam</li>
        <li data-filter="tokyo">Tokyo</li>
        <li data-filter="london">London</li>
        <li data-filter="paris">Paris</li>
        <li data-filter="berlin">Berlin</li>
        <li data-filter="sport">Sport</li>
        <li data-filter="fashion">Fashion</li>
        <li data-filter="video">Video</li>
        <li data-filter="art">Art</li>
    </ol>
    <br/>

    <div role="main">
        <ul id="container" class="tiles-wrap animated">

            <li data-filter-class='["london", "art"]'>
                <img src="../sample-images/image_1.jpg" height="283" width="200">
                <p>London Art</p>
            </li>
            <li data-filter-class='["berlin", "art"]'>
                <img src="../sample-images/image_2.jpg" height="300" width="200">
                <p>Berlin Art</p>
            </li>
            <li data-filter-class='["berlin", "video"]'>
                <img src="../sample-images/image_3.jpg" height="252" width="200">
                <p>Berlin Video</p>
            </li>
            <li data-filter-class='["tokyo", "fashion", "berlin"]'>
                <img src="../sample-images/image_4.jpg" height="158" width="200">
                <p>Tokyo Fashion Berlin</p>
            </li>
            <li data-filter-class='["berlin", "art"]'>
                <img src="../sample-images/image_5.jpg" height="300" width="200">
                <p>Berlin Art</p>
            </li>
            <li data-filter-class='["tokyo", "fashion"]'>
                <img src="../sample-images/image_6.jpg" height="297" width="200">
                <p>Tokyo Fashion</p>
            </li>
            <li data-filter-class='["london", "art"]'>
                <img src="../sample-images/image_7.jpg" height="200" width="200">
                <p>London Art</p>
            </li>
            <li data-filter-class='["tokyo", "video"]'>
                <img src="../sample-images/image_8.jpg" height="200" width="200">
                <p>Tokyo Video</p>
            </li>
            <li data-filter-class='["tokyo", "art"]'>
                <img src="../sample-images/image_9.jpg" height="398" width="200">
                <p>Tokyo Art</p>
            </li>
            <li data-filter-class='["berlin", "fashion"]'>
                <img src="../sample-images/image_10.jpg" height="267" width="200">
                <p>Berlin Fashion</p>
            </li>
            <li data-filter-class='["amsterdam", "art"]'>
                <img src="../sample-images/image_1.jpg" height="283" width="200">
                <p>Amsterdam Art</p>
            </li>
            <li data-filter-class='["paris", "video"]'>
                <img src="../sample-images/image_2.jpg" height="300" width="200">
                <p>Paris Video</p>
            </li>
            <li data-filter-class='["london", "video"]'>
                <img src="../sample-images/image_3.jpg" height="252" width="200">
                <p>London Video</p>
            </li>
            <li data-filter-class='["london", "video"]'>
                <img src="../sample-images/image_4.jpg" height="158" width="200">
                <p>London Video</p>
            </li>
            <li data-filter-class='["amsterdam"," video"]'>
                <img src="../sample-images/image_5.jpg" height="300" width="200">
                <p>Amsterdam Video</p>
            </li>
            <li data-filter-class='["tokyo", "fashion"]'>
                <img src="../sample-images/image_6.jpg" height="297" width="200">
                <p>Tokyo Fashion</p>
            </li>
            <li data-filter-class='["tokyo", "sport"]'>
                <img src="../sample-images/image_7.jpg" height="200" width="200">
                <p>Tokyo Sport</p>
            </li>
            <li data-filter-class='["berlin", "video"]'>
                <img src="../sample-images/image_8.jpg" height="200" width="200">
                <p>Berlin Video</p>
            </li>
            <li data-filter-class='["amsterdam", "fashion"]'>
                <img src="../sample-images/image_9.jpg" height="398" width="200">
                <p>Amsterdam Fashion</p>
            </li>
            <li data-filter-class='["berlin", "sport"]'>
                <img src="../sample-images/image_10.jpg" height="267" width="200">
                <p>Berlin Sport</p>
            </li>
            <li data-filter-class='["paris", "video"]'>
                <img src="../sample-images/image_1.jpg" height="283" width="200">
                <p>Paris Video</p>
            </li>
            <li data-filter-class='["tokyo", "sport"]'>
                <img src="../sample-images/image_2.jpg" height="300" width="200">
                <p>Tokyo Sport</p>
            </li>
            <li data-filter-class='["amsterdam", "art"]'>
                <img src="../sample-images/image_3.jpg" height="252" width="200">
                <p>Amsterdam Art</p>
            </li>
            <li data-filter-class='["berlin", "sport"]'>
                <img src="../sample-images/image_4.jpg" height="158" width="200">
                <p>Berlin Sport</p>
            </li>
            <li data-filter-class='["paris", "art"]'>
                <img src="../sample-images/image_5.jpg" height="300" width="200">
                <p>Paris Art</p>
            </li>
            <li data-filter-class='["berlin", "art"]'>
                <img src="../sample-images/image_6.jpg" height="297" width="200">
                <p>Berlin Art</p>
            </li>
            <li data-filter-class='["london", "art"]'>
                <img src="../sample-images/image_7.jpg" height="200" width="200">
                <p>London Art</p>
            </li>
            <li data-filter-class='["london", "video"]'>
                <img src="../sample-images/image_8.jpg" height="200" width="200">
                <p>London Video</p>
            </li>
            <li data-filter-class='["london", "video"]'>
                <img src="../sample-images/image_9.jpg" height="398" width="200">
                <p>London Video</p>
            </li>
            <li data-filter-class='["paris", "video"]'>
                <img src="../sample-images/image_10.jpg" height="267" width="200">
                <p>Paris Video</p>
            </li>
            <!-- End of grid blocks -->
        </ul>

    </div>
</div>



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

