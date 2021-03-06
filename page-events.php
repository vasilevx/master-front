<?php 
/*
Template Name: events
*/
get_header(); ?>
<!-- Контент -->


<?php
require_once('classes/Helpers.php');
$params = [
	'type' => $_GET['event_type'] ? $_GET['event_type'] : 'fund',
	'year' => $_GET['event_year'] ? $_GET['event_year'] : date("Y")
];

if ($params['year'] === 'all') $params['year'] = '';

if($params['year'])
	$events = new WP_Query([
		'post_type' => 'event',
		'orderby' => 'meta_value',
		'order' => 'DESC',
		'meta_key' => 'event_begin-date',
		'nopaging' => true,
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
		'nopaging' => true,
		'event_type' => $params['type']
	]);


$all_events = new WP_Query([
    'post_type' => 'event',
    'orderby' => 'meta_value',
    'meta_key' => 'event_begin-date',
	'order' => 'DESC',
	'nopaging' => true,
    'event_type' => $params['type']
]);

//$year = $current_year = date('Y');

$events_grouped_by_year = [];
foreach($events->posts as $event){
	$year = get_post_meta($event->ID, 'event_begin-date', true);
	$year = new DateTime($year);
	$events_grouped_by_year["".$year->format('Y').""][] = $event;
}

$years = [];
foreach($all_events->posts as $event){
    $year = get_post_meta($event->ID, 'event_begin-date', true);
    $year = new DateTime($year);
    $years["".$year->format('Y').""][] = $year->format('Y');
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
			<li><a href="?event_type=gallery&event_year=<?= $params['year'] ?>" <?= ($params['type'] == 'gallery') ? 'class="events__cur-place"' : ''?>>в галерее «Мастер»</a></li>
			<li><a href="?event_type=fund&event_year=<?= $params['year'] ?>" <?= ($params['type'] == 'fund') ? 'class="events__cur-place"' : ''?>>фонда</a></li>
		</ul>

		<div class="events__years-events">
            <div class="events__years">
                <ul class="events__year-list">
                    <?php foreach ($years as $year => $event) : ?>
                    <li <?= ($params['year'] == $year) ? 'class="current-year"' : ''?>>
                        <a href="?event_type=<?=$params['type']?>&event_year=<?= $year ?>"><?= $year ?></a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
			<ul class="events__events-all-list">


				<?php foreach($events_grouped_by_year as $year => $year_events): ?>
					<li class="events__year-events">
						<span class="events__year"><?=$year?></span>
						<ul class="events__events-in-year grid">
						<?php foreach($year_events as $event): ?>
							<li class="events__single-event grid-item">
                                <a href="<?=get_permalink($event->ID)?>">
                                    <div class="events__image-container">
                                        <?= get_the_post_thumbnail($event->ID, 'large'); ?>
                                    </div>
                                    <div class="events__title-container">
                                        <h2 class="events__event-title">
                                            <?=$event->post_title?>
                                        </h2>
                                        <span class="events__date">
                                            <?php Helpers::showDate(get_post_meta($event->ID, 'event_begin-date', true), get_post_meta($event->ID, 'event_end-date', true))?>
                                        </span>
                                    </div>
                                    <p class="events__description">
                                        <?php
                                        if(get_post_meta($event->ID, 'event_announcement', true) != "")
                                            echo get_post_meta($event->ID, 'event_announcement', true);
                                        else
                                            echo event_excerpt(['text' => get_post_meta($event->ID, 'about_event', true), 'maxchar'=>200]);
                                        ?>
                                    </p>
                                </a>
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