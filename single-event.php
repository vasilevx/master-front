<?php get_header(); ?>

<?php require_once('classes/Helpers.php');

?>


<div class="page-content">
    <div class="event wrapper">
        <?php if(have_posts()): the_post()?>
            <!--<img src="<?=get_post_meta($post->ID, 'event_photos')[0]['guid']?>" alt=""/> для работы с фотками-->
            <span class="event__title-label">мероприятие <?= get_the_terms($post->ID, 'event_type')[0]->name?></span>
            <h1 class="event__title"><?=get_the_title()?></h1>
            <div class="event__left-container">
                <div class="event__announcement">
                    <?=get_post_meta($post->ID, 'about_event', true)?>
                </div>
            </div>
            <div class="event__right-container">
                <div class="event__data">
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
                    <span class="event__date">
                        <?php
                            $begin = '';
                            $end = '';

                            if(get_post_meta($post->ID, 'event_begin-date', true))
                                $begin = new DateTime(get_post_meta($post->ID, 'event_begin-date', true));
                            if(get_post_meta($post->ID, 'event_end-date', true))
                                $end = new DateTime(get_post_meta($post->ID, 'event_end-date', true));

                            if($begin && $end){
                                if((int)$begin->format('m') === (int)$end->format('m')){
                                    if((int)$begin->format('d') === (int)$end->format('d'))
                                        echo $begin->format('j').' '.Helpers::getRusMonth($begin->format('d.m.Y'), 'lower');
                                    else
                                        echo $begin->format('j').'—'.$end->format('j').' '.Helpers::getRusMonth($begin->format('d.m.Y'), 'lower');
                                }
                                else{
                                    echo $begin->format('j').' '.Helpers::getRusMonth($begin->format('d.m.Y'), 'lower').' — '.$end->format('j').' '.Helpers::getRusMonth($end->format('d.m.Y'), 'lower');
                                }
                            }
                            elseif($begin){
                                echo 'с '.$begin->format('j').' '.Helpers::getRusMonth($begin->format('d.m.Y'), 'lower');
                            }
                            elseif($end){
                                echo 'до '.$end->format('j').' '.Helpers::getRusMonth($end->format('d.m.Y'), 'lower');
                            }
                        ?>
                    </span><br/><br/>
                    <span class="event__place">
                        <?=get_term_meta(get_the_terms($post->ID, 'places')['0']->term_id, 'place_address', true)?>
                    </span>
                </div>
            </div>
        <?php endif ?>
        <div style="clear: both;"></div>
    </div>
</div>
<?php get_footer(); ?>