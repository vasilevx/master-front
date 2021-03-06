
<!--Футер-->
<div class="red-Line"></div>
<footer class="page-footer wrapper">

  <ul class="navigation navigation-footer underline-grey">
      <?php
      wp_nav_menu( [
          'menu'            => 'main-menu',
          'container'       => false,
          'items_wrap'      => '%3$s',
      ] );
      ?>
  </ul>

  <p class="footer-fond">Некоммерческая организация международный фонд поддержки культуры &laquo;Мастер Класс&raquo;
  </p>

  <aside class="copyright">
    &copy; 1993&#8212;2018 &laquo;Мастер Класс&raquo;
    <ul class="socials">
      <li><a href="https://vk.com/club35656414"><i class="fab fa-vk" aria-hidden="true"></i></a></li>
      <li><a href="https://instagram.com/gallerymaster/"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
      <li><a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
      <!-- <li><a href="#"><i class="fab fa-google-plus-g" aria-hidden="true"></i></a></li> -->
      <!-- <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li> -->
    </ul>
  </aside>

  <p class="adress">191123, Санкт-Петербург, ул. Рылеева, дом 6</p>
</footer>

<script src="<?php echo get_template_directory_uri(); ?>/lib/lightbox-plus-jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/photoswipe.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/photoswipe-ui-default.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/masonry.pkgd.min.js"></script>
</body>
<?php wp_footer(); ?>
</html>