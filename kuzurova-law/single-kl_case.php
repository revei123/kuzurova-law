<?php
get_header();
kuzurova_breadcrumbs();
?>
<article class="section single-case">
  <div class="container content-narrow">
    <h1><?php the_title(); ?></h1>
    <?php if (kuzurova_get_field('is_demo')) echo kuzurova_demo_badge(); ?>
    <div class="case-blocks">
      <section><h2><?php esc_html_e('Проблема', 'kuzurova-law'); ?></h2><p><?php echo esc_html(kuzurova_get_field('problem')); ?></p></section>
      <section><h2><?php esc_html_e('Задача', 'kuzurova-law'); ?></h2><p><?php echo esc_html(kuzurova_get_field('task')); ?></p></section>
      <section><h2><?php esc_html_e('Подход', 'kuzurova-law'); ?></h2><p><?php echo esc_html(kuzurova_get_field('approach')); ?></p></section>
      <section><h2><?php esc_html_e('Результат', 'kuzurova-law'); ?></h2><p><?php echo esc_html(kuzurova_get_field('result')); ?></p></section>
    </div>
  </div>
</article>
<?php get_footer(); ?>
