<?php
/**
 * Template Name: Privacy policy
 */
get_header();
kuzurova_breadcrumbs();
?>
<section class="section">
  <div class="container content-narrow">
    <h1><?php esc_html_e('Политика конфиденциальности', 'kuzurova-law'); ?></h1>
    <div class="entry-content">
      <?php while (have_posts()) : the_post(); the_content(); endwhile; ?>
      <?php if (!have_posts()) : ?>
        <p><?php esc_html_e('Демонстрационный текст политики обработки персональных данных. Замените юридически корректным документом перед публикацией.', 'kuzurova-law'); ?></p>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php get_footer(); ?>
