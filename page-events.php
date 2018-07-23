<?php 
/*
Template Name: events
*/
get_header(); ?>
<!-- Контент -->

<!-- Анонс -->
<div class="page-content">
	<div class="events wrapper">
		<h1 class="letter-spacing-300">МЕРОПРИЯТИЯ</h1>

		<ul class="events__place-switches">
			<li><a href="#" class="events__cur-place">в галерее «Мастер»</a></li>
			<li><a href="#">фонда</a></li>
		</ul>

		<div class="events__years-events">
			<ul class="events__year-list">
				<li class="current-year"><a href="#">2018</a></li>
				<li><a href="#">2017</a></li>
				<li><a href="#">2016</a></li>
				<li><a href="#">2015</a></li>
				<li><a href="#">2014</a></li>
				<li><a href="#">2013</a></li>
				<li><a href="#">2012</a></li>
				<li><a href="#">2011</a></li>
				<li><a href="#">2010</a></li>
				<li><a href="#">2009</a></li>
			</ul>
			<ul class="events__events-all-list">
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


			</ul>
		</div>
	</div>
</div>



<?php get_footer(); ?>