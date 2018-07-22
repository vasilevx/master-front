<?php 
/*
Template Name: gallery
*/
get_header(); ?>
<!-- Контент -->

<!-- Анонс -->
<div class="page-content">

	<div class="wrapper gal-intro">
		<img class="gal-intro__logo" src="<?php echo get_template_directory_uri(); ?>/img/gal-logo.png" alt="Логотип Галереи">
		<p>Галерея «Мастер» организовывает мероприятия любых <span>форматов</span></p>
		<ul class="gal-formats">
			<li><a href="#">выставки</a></li>
			<li><a href="#">лекции</a></li>
			<li><a href="#">концерты</a></li>
			<li><a href="#">семинары</a></li>
			<li><a href="#">мастер-классы</a></li>
			<li><a href="#">аукционы</a></li>
			<li><a href="#">показы мод</a></li>
			<li><a href="#">тренинги</a></li>
			<li><a href="#">деловые встречи</a></li>
			<li><a href="#">конференции</a></li>
			<li><a href="#">презентации</a></li>
			<li><a href="#">корпоративы</a></li>
		</ul>
		
		<div class="gal-intro__services">
			<p class="gal-intro__bold-title">Всю организацию берем на себя:</p>
			<ul class="gal-intro__services-list">
				<li>разработаем концепцию и программу мероприятия;</li>
				<li>оформим и украсим помещение;
				</li>
				<li>подготовим нужную технику;</li>
				<li>организуем фуршет / банкет / кофе-брейк;</li>
				<li>пригласим гостей;
				</li>
				<li>поможем управлять мероприятием, чтобы все прошло, как задумано;</li>
				<li>сфотографируем, снимем на видео ваше мероприятие и подготовим отчет.</li>
			</ul>
		</div>
	</div>
</div>

<div class="gal-photos">
	<ul class="gal-photos__list">
		<li><img src="<?php echo get_template_directory_uri(); ?>/img/gal-photo1.jpg" alt="Фото"></li>
		<li><img src="<?php echo get_template_directory_uri(); ?>/img/gal-photo2.jpg" alt="Фото"></li>
		<li><img src="<?php echo get_template_directory_uri(); ?>/img/gal-photo3.jpg" alt="Фото"></li>
	</ul>
	<ul class="gal-photos__list">
		<li><img src="<?php echo get_template_directory_uri(); ?>/img/gal-photo4.jpg" alt="Фото"></li>
		<li><img src="<?php echo get_template_directory_uri(); ?>/img/gal-photo5.jpg" alt="Фото"></li>
		<li><img src="<?php echo get_template_directory_uri(); ?>/img/gal-photo6.jpg" alt="Фото"></li>
	</ul>
	<ul class="gal-photos__list">
		<li><img src="<?php echo get_template_directory_uri(); ?>/img/gal-photo7.jpg" alt="Фото"></li>
		<li><img src="<?php echo get_template_directory_uri(); ?>/img/gal-photo8.jpg" alt="Фото"></li>
		<li><img src="<?php echo get_template_directory_uri(); ?>/img/gal-photo9.jpg" alt="Фото"></li>
	</ul>
</div>

<div class="wrapper">
	<p class="w-620 ">До галереи «Мастер» 7 минут пешком от станции метро Чернышевская. Общая площадь галереи — 235 м<sup>2</sup>. В каждом зале: кондиционеры, направленное освещение, аудиосистема, удобные кресла и диваны. Все залы выдержаны в классическом лаконичном стиле. На всей территории работает вай-фай. Есть 50 стульев для гостей. </p>

	<ul class="gal-locations">
		<li class="gal-location">
			<img class="gal-location__photo" src="<?php echo get_template_directory_uri(); ?>/img/location-royal.jpg" alt="Фото">
			<h2>Зал с роялем
				<div class="gal-location__icons">
				<img src="<?php echo get_template_directory_uri(); ?>/img/gal-camera.png" width="21" height="17" alt="Иконка">
				<img src="<?php echo get_template_directory_uri(); ?>/img/gal-presentation.png" width="20" height="20" alt="Иконка">
				
				
				</div>
			</h2>
			<p>Для мастер-классов, лекций, семинаров, тренингов, аукционов.
			Есть проектор и белый экран для проведения презентаций.</p>
			<span class="gal-location__stat"><span class="gal-location__number">94</span> м<sup>2</sup></span>
			<span class="gal-location__stat"><span class="gal-location__number">60</span> человек</span>
		</li>
		<li class="gal-location">
			<img class="gal-location__photo" src="<?php echo get_template_directory_uri(); ?>/img/location-columns.jpg" alt="Фото">
			<h2>Зал с колоннами
				<div class="gal-location__icons">
				<img src="<?php echo get_template_directory_uri(); ?>/img/gal-tv.png" width="21" height="16" alt="Иконка">
			</div>
			</h2>
			<p>Для деловых переговоров, банкетов, танцевальных вечеров.
			Есть плазменная панель на 54 дюйма.</p>
			<span class="gal-location__stat"><span class="gal-location__number">90</span> м<sup>2</sup></span>
			<span class="gal-location__stat"><span class="gal-location__number">55</span> человек</span>
		</li>
		<li class="gal-location">
			<img class="gal-location__photo" src="<?php echo get_template_directory_uri(); ?>/img/location-studio.jpg" alt="Фото">
			<h2>Арт-студия (малый зал)</h2>
			<p>Для выставок и показов.</p>
			<span class="gal-location__stat"><span class="gal-location__number">51</span> м<sup>2</sup></span>
			<span class="gal-location__stat"><span class="gal-location__number">30</span> человек</span>
		</li>
	</ul>

	<div class="w-620">
		<p class="gal-before-map">Галерея «Мастер» существует с 2007 года. Каждый день любой желающий может прийти и насладиться искусством художников и скульпторов со всей России. Со дня основания в нашей галерее провели уже более <a href="#">200 мероприятий <img src="<?php echo get_template_directory_uri(); ?>/img/gal-photos.png" width="15" height="15" alt="Иконка">
			</a></p>
			<p class="gal-before-map">Чтобы провести мероприятие в нашей галерее, позвоните нам или напишите на почту. В зависимости от мероприятия, мы предложим вам подходящие условия.</p>
			<p class="eng-red-clr"><span class="t14">+7 812</span> 640-7737<br>gallery-master@yandex.ru</p>
		</div>

	</div>

	<iframe class="ya-map" src="https://yandex.ru/map-widget/v1/?um=constructor%3A223c1a6b2e1244fc70cd8b83188f7d7fdb06e0061770da318fb9425e26ed3670&amp;source=constructor" width="100%" height="700" frameborder="0"></iframe>



	<?php get_footer(); ?>