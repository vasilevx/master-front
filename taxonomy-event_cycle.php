<?php get_header(); ?>

<?php require_once('classes/Helpers.php');

?>


<div class="page-content">
    <div class="event-cycle wrapper">
        <h1 class="event-cycle__title text30"><?=get_queried_object()->name?></h1>
        <p class="event-cycle__description"><?=get_queried_object()->description?></p>
<!--        <pre>-->
<!--            --><?php //var_dump(get_queried_object())?>
<!--        </pre>-->
        <section class="event-cycle__events">
            <?php if(have_posts()) : while(have_posts()): the_post()?>
                <div class="event-cycle__event">
                    <a href="<?= get_permalink() ?>">
                        <div class="event-cycle__event-image-container">
                            <?= get_the_post_thumbnail(null, 'large'); ?>
                        </div>
                        <div class="event-cycle__event-info">
                            <h2 class="event-cycle__event-title">
                                    <?php the_title()?>
                            </h2>
                        </div>
                    </a>
                </div>
            <?php endwhile; endif;?>
        </section>
    </div>
</div>

<?php get_footer(); ?>