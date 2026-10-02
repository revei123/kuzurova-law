<?php
get_header();
?>
<section class="section">
  <div class="container content-narrow">
    <h1><?php esc_html_e('Страница не найдена', 'kuzurova-law'); ?></h1>
    <p><?php esc_html_e('Возможно, ссылка устарела или страница была перемещена.', 'kuzurova-law'); ?></p>
    <?php echo kuzurova_button(home_url('/'), __('На главную', 'kuzurova-law')); ?>
  </div>
</section>
<?php get_footer(); ?>
