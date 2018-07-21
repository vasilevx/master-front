<?php

$afisha_events = new WP_Query([
        'post_type' => 'event',
        'posts_per_page' => 2,
        'orderby' => 'meta_value',
        'order' => 'DESC',
        'offset' => -1,
        'meta_query' => [
          [
            'key' => 'event_end',
            'value' => date('d.m.Y H:i'),
            'type' => 'datetime',
            'compare' => '<'
          ],

        ]
]);

$months = array( 1 => 'Января' , 'Февраля' , 'Марта' , 'Апреля' , 'Мая' , 'Июня' , 'Июля' , 'Августа' , 'Сентября' , 'Октября' , 'Ноября' , 'Декабря' );
foreach ($months as &$month) $month = mb_strtolower($month);
unset($month);

/*
echo '<pre>';
var_dump($query);
echo '</pre>';*/
/*
while ( $query->have_posts() ) {
  $query->the_post();
echo $months[date( 'n' , strtotime(get_post_meta($post->ID, 'event_begin', true)))];
  echo the_title();
  echo get_post_meta($post->ID, 'event_end', true);
}
*/
?>

<?php get_header(); ?>
	<!-- Контент -->

	<!-- Анонс -->
	<div class="page-content">
		<section class="announcement wrapper">
			<div class="announcement-image"><a href="<?php echo get_template_directory_uri(); ?>/img/announcement.jpg" data-lightbox="image-1"><img src="<?php echo get_template_directory_uri(); ?>/img/announcement.jpg" alt="Северный бал"></a></div>
			<div class="announcement-description">
        <h1 class="title dance-title"><a href="#"><span class="dance-title-number">VII</span><span class="dance-title-name">Благотворительный<br>Северный бал</span></a></h1>
				<p class="desc">19 мая фонд «МАСТЕР КЛАСС» проведет 7-й Благотворительный Северный бал. Мероприятие пройдет в Мраморном зале Этнографического музея. Вход по приглашениям.</p>
				<p class="place-time">Этнографический музей · 18:00</p>
			</div>
		</section>


		<!-- Новости и Афиша -->
		<section class="news-afisha wrapper">
			<section class="news">
				<h2><a href="#">Новости</a></h2>
				<ul class="news-list underline-grey">
					<li class="news-title"><a href="#">Приглашаем на ежегодную выставку «Осетинская палитра на берегах Невы»</a></li>
					<li class="news-title"><a href="#">Приглашаем на органные концерты!</a></li>
					<li class="news-title"><a href="#">Опубликованы фотографии с акции «Дети рисуют в храме»</a></li>
					<li class="news-title"><a href="#">Завершилась акция «Дети рисуют в храме»</a></li>
				</ul>
				<p class="arch underline-grey"><a href="#">Архив</a></p>
			</section>

			<section class="afisha">
				<h2><a href="#">Афиша</a></h2>
				<ul class="afisha-list">
          <?php while ( $afisha_events->have_posts() ) : $afisha_events->the_post()?>
            <li>
              <a class="afisha-item" href="<?=get_the_permalink($post->ID)?>">
                <div class="afisha-img">
                  <?=get_the_post_thumbnail($post->ID) ?>
                </div>
                <div class="afisha-about">
                  <p class="afisha-date">
                    <?=date( 'd' , strtotime(get_post_meta($post->ID, 'event_begin', true))).' '.$months[date( 'n' , strtotime(get_post_meta($post->ID, 'event_begin', true)))] ?>
                    ·
                    <?=date( 'H:i' , strtotime(get_post_meta($post->ID, 'event_begin', true))) ?>
                  </p>
                  <h2 class="afisha-title"><?=get_the_title()?></h2>
                  <p class="afisha-description"><?=get_post_meta($post->ID, 'event_short', true)?></p>
                  <p class="afisha-place">
                    <?=get_term_meta(get_the_terms($post->ID, 'places')['0']->term_id, 'place_address', true)?>
                  </p>
                </div>
              </a>
            </li>
          <?php endwhile; ?>
          <!--<li>
						<a class="afisha-item" href="#">
							<div class="afisha-img">
								<img src="<?php echo get_template_directory_uri(); ?>/img/afisha-1.jpg" alt="Афиша">
							</div>
							<div class="afisha-about">
								<p class="afisha-date">20 апреля · 19:00</p>
								<h2 class="afisha-title">Виктория Преображенская «Изумрудное солнце»</h2>
								<p class="afisha-description">Презентация коллекции весна-лето 2018</p>
								<p class="afisha-place">Галерея «Мастер», ул. Маяковского 41</p>
							</div>
						</a>
					</li>
          <li>
						<a class="afisha-item" href="#">
							<div class="afisha-img">
								<img src="<?php echo get_template_directory_uri(); ?>/img/afisha-3.jpg" alt="Афиша">
							</div>
							<div class="afisha-about">
								<p class="afisha-date">20 апреля · 19:00</p>
								<h2 class="afisha-title">Виктория Преображенская «Изумрудное солнце»</h2>
								<p class="afisha-description">Презентация коллекции весна-лето 2018Презентация коллекции весна-лето 2018Презентация коллекции весна-лето 2018</p>
								<p class="afisha-place">Галерея «Мастер», ул. Маяковского 41</p>
							</div>
						</a>
					</li>
					<li>
						<a class="afisha-item" href="#">
							<div class="afisha-img">
								<img src="<?php echo get_template_directory_uri(); ?>/img/afisha-2.jpg" alt="Афиша">
							</div>
							<div class="afisha-about">
								<p class="afisha-date">20 апреля · 19:00</p>
								<h2 class="afisha-title">Виктория </h2>
								<p class="afisha-description">Презентация коллекции весна-лето 2018</p>
								<p class="afisha-place">Галерея «Мастер», ул. Маяковского 41</p>
							</div>
						</a>
					</li>-->


				</ul>
			</section>
		</section>
	</div>
	
	<!-- Галерея Описание -->
	<section class="gallery wrapper">
		<h2 class="letter-spacing-300">ГАЛЕРЕЯ</h2>
		<p>Галерея «Мастер» существует с 2007 года. Она является «домом» Фонда 
		«МАСТЕР КЛАСС» и одновременно социально-культурным центром. Здесь круглый год и каждый месяц проходят мероприятия любых форматов.</p>

		<ul class="gal-formats">
			<li><a href="#">выставки</a></li>
			<li><a href="#">лекции</a></li>
			<li><a href="#">концерты</a></li>
			<li><a href="#">семинары</a></li>
			<li><a href="#">мастер-классы</a></li>
			<li><a href="#">аукционы</a></li>
			<li><a href="#">показы мод</a></li>
			<li><a href="#">тренинги</a></li>
		</ul>
		<!-- Галерея Набор фото -->
		<div class="responsive-box">
			<ul class="gal-imgs">
				<li class="gal-img gal-img2x2"><a href="<?php echo get_template_directory_uri(); ?>/img/gal-1.jpg" data-lightbox="main-gal"><img src="<?php echo get_template_directory_uri(); ?>/img/gal-1.jpg" alt=""></a></li>
				<li class="gal-img"><a href="<?php echo get_template_directory_uri(); ?>/img/gal-2.jpg" data-lightbox="main-gal"><img src="<?php echo get_template_directory_uri(); ?>/img/gal-2.jpg" alt=""></a></li>
				<li class="gal-img"><a href="<?php echo get_template_directory_uri(); ?>/img/gal-3.jpg" data-lightbox="main-gal"><img src="<?php echo get_template_directory_uri(); ?>/img/gal-3.jpg" alt=""></a></li>
				<li class="gal-img"><a href="<?php echo get_template_directory_uri(); ?>/img/gal-4.jpg" data-lightbox="main-gal"><img src="<?php echo get_template_directory_uri(); ?>/img/gal-4.jpg" alt=""></a></li>
				<li class="gal-img gal-master"><a href="#"><div><img src="<?php echo get_template_directory_uri(); ?>/img/gal-logo.png" alt=""></div><p><span>Подробнее о галерее &laquo;Мастер&raquo;</span></p></a></li>
				<li class="gal-img"><a href="<?php echo get_template_directory_uri(); ?>/img/gal-5.jpg" data-lightbox="main-gal"><img src="<?php echo get_template_directory_uri(); ?>/img/gal-5.jpg" alt=""></a></li>
				<li class="gal-img"><a href="<?php echo get_template_directory_uri(); ?>/img/gal-6.jpg" data-lightbox="main-gal"><img src="<?php echo get_template_directory_uri(); ?>/img/gal-6.jpg" alt=""></a></li>
				<li class="gal-img"><a href="<?php echo get_template_directory_uri(); ?>/img/gal-7.jpg" data-lightbox="main-gal"><img src="<?php echo get_template_directory_uri(); ?>/img/gal-7.jpg" alt=""></a></li>
				<li class="gal-img"><a href="<?php echo get_template_directory_uri(); ?>/img/gal-8.jpg" data-lightbox="main-gal"><img src="<?php echo get_template_directory_uri(); ?>/img/gal-8.jpg" alt=""></a></li>
			</ul>
		</div>
	</section>

	<!-- Фонд -->
	<h2 class="letter-spacing-300">ФОНД</h2>
  <div class="fond-parallax-container">
    <img class="fond-big" src="<?php echo get_template_directory_uri(); ?>/img/fond-big.jpg" alt="">
  </div>
	<div class="fond-info wrapper">

		<section class="fond-textabout">
			<div class="fond-redblock">
				<h2>Фонд «Мастер Класс»
				основан в 1993-м году</h2>
				<p class="fond-role">Основатели</p>
				<p class="fond-names">Семёнова Тамара Гавриловна<br>
				Мамединов Азат Аббасович</p>
				<p class="fond-role">Президент</p>
				<p class="fond-names">Пиотровский Михаил Борисович</p>
				<p class="fond-role">Куратор</p>
				<p class="fond-names">Говорухин Станислав Сергеевич</p>
			</div>
			<p>Некоммерческая организация Международный фонд  поддержки культуры «МАСТЕР КЛАСС», проводит Международный фестиваль искусств «МАСТЕР КЛАСС» ежегодно в Санкт-Петербурге с 1993 года. </p>
			<p>Фонд «МАСТЕР КЛАСС» провел десятки выставок и фестивалей, выступил организатором интереснейших культурных акций. </p>
			<p>Целью Международного фестиваля искусств 
				«МАСТЕР КЛАСС» является объединение творческих сил, просветительство и пропаганда основ как классического, 
			так и современного искусства, представление культуры Санкт-Петербурга в регионах России и за рубежом, знакомство петербуржцев с мировой культурой. </p>
			<p>Благодаря поддержке фонда «МАСТЕР КЛАСС» множество молодых талантливых художников и дизайнеров, литераторов и музыкантов смогли донести свое творчество до петербуржцев и гостей города, стать известными и знаменитыми.</p>
			<p>Основной принцип выстраивается на связи поколений. 
			Опытные мастера работают с аудиторией непосредственно, передавая свой опыт и знания не через теоретическую лекцию, а во время мастер-классов на практике. </p>
			<p>За 24 года существования проекта фонда «МАСТЕР КЛАСС» проведены десятки симпозиумов, просмотров, семинаров, выставок. </p>
			<p>Фонд «МАСТЕР КЛАСС» призван искать новые формы и направления в искусстве, сохраняя старые классические традиции, основываясь на профессиональной базе Высшей школы и ставит своей целью приобщение подрастающего поколения к изучению культуры Санкт-Петербурга и мировой культуры, использованию ее лучших достижений для приобретения опыта и практических знаний.</p>
		</section>
		<section class="fond-imgs">
			<img src="<?php echo get_template_directory_uri(); ?>/img/fond-img1.jpg" alt="">
			<img src="<?php echo get_template_directory_uri(); ?>/img/fond-img2.jpg" alt="">
			<img src="<?php echo get_template_directory_uri(); ?>/img/fond-img3.jpg" alt="">
			<img src="<?php echo get_template_directory_uri(); ?>/img/fond-img4.jpg" alt="">
			<!-- <img src="<?php echo get_template_directory_uri(); ?>/img/fond-img5.jpg" alt=""> -->
		</section>

	</div>
	<div class="tar-princ wrapper">
		<section class="target">
			<h2>Цель</h2>
			<div class="desc">
				<p>Работа фонда «МАСТЕР КЛАСС» выстраивается на связи поколений. Опытные мастера работают с аудиторией непосредственно, передавая свой опыт и знания не только через теоретические исследования и во время мастер-классов на практике.</p>
				<p>Приобщение подрастающего поколения к изучению мировой культуры, использованию ее лучших достижений для приобретения опыта и практических знаний.</p>
			</div>
		</section>
		<section class="principles">
			<h2>Принципы</h2>
			<ol class="desc">
				<li>Фестиваль призван пропагандировать
				культуру России.</li>
				<li>В проекте участвуют профессиональные художники, музыканты, архитекторы, кинематографисты, театральные деятели, писатели, журналисты.</li>
			</ol>
		</section>
		<a href="#">Подробнее о фонде</a>

	</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script>
    $( document ).ready(function() {
      console.log( $(window).scrollTop()+$(window).height() );
      console.log('Начало параллакса');
      console.log( $(".fond-parallax-container").offset().top );

      console.log('Длина прокрутки изображения');
      console.log($('.fond-big').height()-$('.fond-parallax-container').height());
      console.log('Сколько px изображение на экране');
      console.log($('.fond-big').height()+$(window).height());

      console.log(($('.fond-big').height()+$(window).height())/($('.fond-big').height()-$('.fond-parallax-container').height()));

      $(document).on('scroll', function () {
        //if($(window).scrollTop()+$(window).height() > $(".fond-parallax-container").offset().top){
          $('.fond-big').css('transform', 'translateY(-'+(($(window).scrollTop()+$(window).height()-$(".fond-parallax-container").offset().top)/(($('.fond-big').height()+$(window).height())/($('.fond-big').height()-$('.fond-parallax-container').height())))+'px)')
        //}
      })
    });
  </script>
<?php get_footer(); ?>