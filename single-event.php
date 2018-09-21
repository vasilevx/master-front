<?php get_header(); ?>

<?php require_once('classes/Helpers.php');

?>


<div class="page-content">
    <div class="event wrapper">
        <?php if(have_posts()): the_post()?>
            <?php if(get_the_terms($post->ID, 'event_type')[0]->name) : ?>
                <span class="event__title-label">мероприятие <?= get_the_terms($post->ID, 'event_type')[0]->name?></span>
            <?php endif;?>
            <h1 class="event__title text30"><?=get_the_title()?></h1>
            <section class="event__top-containers">
                <div class="event__left-container">
                    <div class="event__announcement">
                        <?=get_post_meta($post->ID, 'about_event', true)?>
                    </div>
                </div>
                <div class="event__right-container">
                    <div class="event__data">
                        <?php if (get_post_meta($post->ID, 'event_begin-time', true) && get_post_meta($post->ID, 'event_end-time', true)) : ?>
                            <span class="event__time">
                                <?php
                                if(get_post_meta($post->ID, 'event_begin-time', true))
                                    $begin = new DateTime(get_post_meta($post->ID, 'event_begin-time', true));
                                if(get_post_meta($post->ID, 'event_end-time', true))
                                    $end = new DateTime(get_post_meta($post->ID, 'event_end-time', true));

                                if($begin && $end){
                                    echo $begin->format('H:i').'—'.$end->format('H:i');
                                }
                                elseif($begin){
                                    echo 'с '.$begin->format('H:i');
                                }
                                elseif($end){
                                    echo 'до '.$end->format('H:i');
                                }
                                ?>
                            </span>
                        <?php endif; ?>
                        <span class="event__date">
                            <?php Helpers::showDate(get_post_meta($post->ID, 'event_begin-date', true), get_post_meta($post->ID, 'event_end-date', true))?>
                        </span>
                        <br>
                        <span class="event__place">
                            <?php
                            $count = count(get_the_terms($post->ID, 'places'));
                            $i=1;
                            foreach (get_the_terms($post->ID, 'places') as $place){
                                echo get_term_meta($place->term_id, 'place_address', true);
                                if($count !== $i) echo ';';
                                echo '<br>';
                                $i++;
                            }

                            ?>
                        </span>
                        <?php if (get_event_massmedia($post->ID)) : ?>
                            <div class="event__massmedia">
                                <h4>СМИ о мероприятии</h4>
                                <ul>
                                    <?php foreach (get_event_massmedia($post->ID) as $item) : ?>
                                        <li class="underline-grey">
                                            <a target="_blank" href="<?=$item[1]?>"><nobr><?=$item[0]?></nobr></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php endif ?>
        <div style="clear: both;"></div>
        <div class="event__photos">
            <div class="grid picture-container" itemscope itemtype="http://schema.org/ImageGallery">
                <div class="grid-sizer" style="width: 25%; display:none;"></div>
                <?php foreach (get_post_meta($post->ID, 'event_photos') as $i => $photo) :?>
                    <figure class="grid-item picture" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject" data-index="<?=$i;?>">
                        <a href="<?=$photo['guid']?>" itemprop="contentUrl" data-size="<?=getimagesize($photo['guid'])[0].'x'.getimagesize($photo['guid'])[1]?>" data-index="<?=$photo['id']?>">
                            <?= wp_get_attachment_image($photo['ID'], 'full', false, ['class' => 'event__photo', 'itemprop' => 'thumbnail'])?>
                        </a>
                    </figure>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>


    <!-- Root element of PhotoSwipe. Must have class pswp. -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

        <!-- Background of PhotoSwipe.
             It's a separate element as animating opacity is faster than rgba(). -->
        <div class="pswp__bg"></div>

        <!-- Slides wrapper with overflow:hidden. -->
        <div class="pswp__scroll-wrap">

            <!-- Container that holds slides.
                PhotoSwipe keeps only 3 of them in the DOM to save memory.
                Don't modify these 3 pswp__item elements, data is added later on. -->
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
            <div class="pswp__ui pswp__ui--hidden">

                <div class="pswp__top-bar">

                    <!--  Controls are self-explanatory. Order can be changed. -->

                    <div class="pswp__counter"></div>

                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                    <button class="pswp__button pswp__button--share" title="Share"></button>

                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                    <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                    <!-- element will get class pswp__preloader--active when preloader is running -->
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>

                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                </button>

                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                </button>

                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>

            </div>

        </div>

    </div>

<?php get_footer(); ?>

<script>
    $(document).ready(function () {
        var $pswp = $('.pswp')[0],
            items = [],
            $pic = $('.picture-container');

        $pic.each( function() {
            $(this).find('a').each(function() {
                var $href   = $(this).attr('href'),
                    $size   = $(this).data('size').split('x'),
                    $width  = $size[0],
                    $height = $size[1];

                var item = {
                    src : $href,
                    w   : $width,
                    h   : $height
                }

                items.push(item);
            });
        });

        $pic.on('click', 'figure', function(event) {
            event.preventDefault();

            var $index = $(this).data('index');
            var options = {
                index: $index,
                bgOpacity: 0.9,
                showHideOpacity: true
            };

            // Initialize PhotoSwipe
            var lightBox = new PhotoSwipe($pswp, PhotoSwipeUI_Default, items, options);
            lightBox.init();
        });
    });
</script>

<script>
    $(window).on('load', function () {
        $('.grid').masonry({
            itemSelector: '.grid-item',
            percentPosition: true,
            columnWidth: '.grid-sizer'
        });
    })
</script>