

<!DOCTYPE html>
<head <?php language_attributes(); ?>>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

  <link rel="apple-touch-icon" sizes="57x57" href="img/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="img/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="img/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="img/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="img/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="img/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="img/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="img/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="img/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="img/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
  <link rel="manifest" href="/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="img/ms-icon-144x144.png"> <meta name="theme-color" content="#ffffff">

  <title><?php wp_title('—', true, 'right'); ?> <?php bloginfo('name'); ?></title>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/lib/fontawesome-all.min.css">
  <link href="<?php echo get_template_directory_uri(); ?>/lib/lightbox.min.css" rel="stylesheet">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

  <!-- Шапка -->
  <header class="page-header wrapper">
    <p class="header-title">НЕКОММЕРЧЕСКАЯ ОРГАНИЗАЦИЯ МЕЖДУНАРОДНЫЙ ФОНД ПОДДЕРЖКИ КУЛЬТУРЫ  “МАСТЕР КЛАСС”</p>
    <div class="grey-line"></div>
    <div class="header-block">
      <a href="#" class="logo"></a>
      <div class="header-contacts">
        <p>191123,Россия,Санкт-Петербург, ул.Рылеева, д. 6<br>
          e-mail: gallery-master@yandex.ru<br>
        +7 (812) 640 77 37</p>

        <ul class="socials">
          <li><a href="https://vk.com/club35656414"><i class="fab fa-vk" aria-hidden="true"></i></a></li>
          <li><a href="https://instagram.com/gallerymaster/"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
          <li><a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
          <li><a href="#"><i class="fab fa-google-plus-g" aria-hidden="true"></i></a></li>
          <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
        </ul>

      </div>
    </div>
  </header>
  <div class="grey-line"></div>
  <nav class="header-menu wrapper">
    <ul class="navigation underline-grey">
      <li><a href="#">Галерея &laquo;Мастер&raquo;</a></li>
      <li><a href="#">Мероприятия</a></li>
      <li><a href="#">О фонде</a></li>
      <li><a href="#">Авторы</a></li>
      <li><a href="#">Контакты</a></li>
      <li><i class="fal fa-search"></i></li>
    </ul>
  </nav>
<!-- end header -->