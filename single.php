<?php get_header(); ?>

<?php require_once('classes/Helpers.php');

?>


<div class="page-content">
    <section class="article wrapper">
        <?php if(have_posts()): the_post()?>
            <h1 class="article__title text30"><?=the_title()?></h1>
            <div class="article__flex-containers">
                <div class="article__left-container">
                    <?=the_content()?>
                </div>
                <div class="article__right-container">
                    <?php
                    foreach (get_post_meta($post->ID, 'related-events') as $post) : ?>
                        <span class="underline-grey">
                            <a href="<?=get_permalink($post['ID'])?>"><?=$post['post_title']?></a>
                        </span><br><br>
                    <?php $i++; endforeach;?>
                </div>
            </div>
        <?php endif ?>
    </section>
</div>

<?php get_footer(); ?>