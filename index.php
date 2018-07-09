<?php get_header(); ?>
	<div id="main">
		<div id="content">
			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
			<div <?php post_class(); ?>  id="post-<?php the_ID(); ?>">
				<div class="entry-date">
					<div class="entry-month">
						<?php the_time('M'); ?>
					</div>
					<div class="entry-day">
						<?php the_time('d'); ?>
					</div>
				</div>
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
					<?php the_title(); ?>
					</a></h2>
				<div class="entry-meta">Автор <?php the_author(); ?> Рубрика <span class="catposted">
					<?php the_category(', ') ?>
					</span> <strong>|</strong> <span class="comments">
					<?php comments_popup_link('0 Комментариев &#187;', '1 Комментарий &#187;', '% Коментариев &#187;'); ?>
					</span> </div>
				<div class="entry-content">
				        <?php the_content('<p class="serif">Подробнее &raquo;</p>'); ?>
						<?php edit_post_link('Ред.', '<p>', '</p>'); ?>
				</div>
				<?php wp_link_pages();?>
			</div>
			<!-- end the post div-->
			<?php endwhile; ?>
			<div class="navigation">
				<div class="alignleft">
					<?php next_posts_link('&laquo; Previous Entries') ?>
				</div>
				<div class="alignright">
					<?php previous_posts_link('Next Entries &raquo;') ?>
				</div>
			</div>
			<?php else : ?>
			<h2 class="center">Не найдено</h2>
			<p class="center">Извините, но Вы ищете не здесь.</p>
			<?php get_search_form(); ?>
			<div class="navigation">
				<?php posts_nav_link();?>
			</div>
			<?php endif; ?>
		</div>
		<!-- end content div-->
		<?php get_sidebar(); ?>
	</div>
	<!-- end the main div-->
<?php get_footer(); ?>
