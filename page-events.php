<?php 
/*
Template Name: events
*/
get_header(); ?>
<!-- Контент -->


<?php

$params = [
	'type' => $_GET['event_type'],
	'year' => $_GET['event_year']
];

if($params['year'])
	$events = new WP_Query([
		'post_type' => 'event',
		'orderby' => 'meta_value_num',
		'order' => 'DESC',
		'meta_query' => [
			[
				'key' => 'event_begin-date',
				'value' => [date('Y-m-d', mktime(0, 0, 0, 1, 1, $params['year'])), date('Y-m-d', mktime(0, 0, 0, 1, 1, $params['year']+1)-1)],
				'type' => 'DATE',
				'compare' => 'BETWEEN'
			]
		],
		'event_type' => $params['type']
	]);
else
	$events = new WP_Query([
		'post_type' => 'event',
		'orderby' => 'meta_value',
		'meta_key' => 'event_begin-date',
		'order' => 'DESC',
		'event_type' => $params['type']
	]);

//$year = $current_year = date('Y');

$events_grouped_by_year = [];
foreach($events->posts as $event){
	$year = get_post_meta($event->ID, 'event_begin-date', true);
	$year = new DateTime($year);
	$events_grouped_by_year["".$year->format('Y').""][] = $event;
}


/*
echo '<pre>';
var_dump($events_grouped_by_year);
echo '</pre>';
$first_year = $prev_year = $current_year = date('Y');
*/
?>

<!-- Анонс -->
<div class="page-content">
	<div class="events wrapper">
		<h1 class="letter-spacing-300">МЕРОПРИЯТИЯ</h1>

		<ul class="events__place-switches">
			<li><a href="?event_type=gallery&event_year=<?php $params['year'] ?>" <?= ($params['type'] == 'gallery') ? 'class="events__cur-place"' : ''?>>в галерее «Мастер»</a></li>
			<li><a href="?event_type=fund&event_year=<?php $params['year'] ?>" <?= ($params['type'] == 'fund') ? 'class="events__cur-place"' : ''?>>фонда</a></li>
		</ul>

		<div class="events__years-events">
			<ul class="events__year-list">
                <?php foreach ($events_grouped_by_year as $year => $event) : ?>
				<li <?= ($params['year'] == $year) ? 'class="current-year"' : ''?>>
                    <a href="?event_type=<?=$params['type']?>&event_year=<?= $year ?>"><?= $year ?></a>
                </li>
                <?php endforeach; ?>
			</ul>
			<ul class="events__events-all-list">


				<?php foreach($events_grouped_by_year as $year => $year_events): ?>
					<li class="events__year-events">
						<span class="events__year"><?=$year?></span>
						<ul class="events__events-in-year grid">
						<?php foreach($year_events as $event): ?>
							<li class="events__single-event grid-item">
								<div class="events__image-container">
									<?= get_the_post_thumbnail($event->ID, 'large'); ?>
								</div>
								<span class="events__before-event-title">предстоящее</span>
								<h2 class="events__event-title"><a href="<?=get_permalink($event->ID)?>"><?=$event->post_title?></a></h2>
								<p>Акция посвящена явлению Августовской Божьей Матери.</p>
							</li>
						<?php endforeach ?>
						</ul>
					</li>
				<?php endforeach?>
				<!--
				<li class="events__year-events">
					<span class="events__year">2018</span>
					<ul class="events__events-in-year">
						<li class="events__single-event">
							<img src="<?php echo get_template_directory_uri(); ?>/img/events1.jpg" alt="">	
							<span class="events__before-event-title">предстоящее</span>
							<h2 class="events__event-title"><a href="#">Эра милосердия 2018</a></h2>
							<p>Акция посвящена явлению Августовской Божьей Матери.</p>
						</li>
						<li class="events__single-event">
							<img src="<?php echo get_template_directory_uri(); ?>/img/events2.jpg" alt="">	
							<h2 class="events__event-title"><a href="#">Дети рисуют в храме 2018</a></h2>
							<p>Юные художники творят под сводами Исаакиевского собора. Более 350-ти детей рисуют на тему «Доброта и Милосердие» в рамках международного фестиваля искусств «Мастер-класс».</p>
						</li>
					</ul>
				</li>

				<li class="events__year-events">
					<span class="events__year">2017</span>
					<ul class="events__events-in-year">
						<li class="events__single-event">
							<img src="<?php echo get_template_directory_uri(); ?>/img/events3.jpg" alt="">	
							<h2 class="events__event-title"><a href="#">VII Благотворительный Северный бал</a></h2>
						</li>
						<li class="events__single-event">
							<img src="<?php echo get_template_directory_uri(); ?>/img/events4.jpg" alt="">	
							<h2 class="events__event-title"><a href="#">Признание Исаакию</a></h2>
							<p>Рисуем "Признание Исаакию" вместе с художниками нашего города.</p>
						</li>
					</ul>
				</li>

				<li class="events__year-events">
					<span class="events__year">2016</span>
					<ul class="events__events-in-year">
						<li class="events__single-event">
							<img src="<?php echo get_template_directory_uri(); ?>/img/events5.jpg" alt="">	
							<h2 class="events__event-title"><a href="#">Журавли</a></h2>
							<p>Проект посвящен жертвам теракта над Синаем. Ангелы нарисованные детьми. </p>
						</li>
						<li class="events__single-event">
							<img src="<?php echo get_template_directory_uri(); ?>/img/events6.jpg" alt="">	
							<h2 class="events__event-title"><a href="#">VI Благотворительный Северный бал</a></h2>
						</li>
						<li class="events__single-event">
							<img src="<?php echo get_template_directory_uri(); ?>/img/events7.jpg" alt="">	
							<h2 class="events__event-title"><a href="#">Дети рисуют в храме 2016</a></h2>
						</li>
					</ul>
				</li>
				-->

			</ul>
		</div>
	</div>
</div>
<?php get_footer(); ?>

<script>
	/*$(document).ready(function(){
		$('.grid').masonry({
			itemSelector: '.grid-item',
			gutter: 20
		});
	});*/
</script>