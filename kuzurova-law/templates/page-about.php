<?php
/**
 * Template Name: About
 */
get_header();
kuzurova_breadcrumbs();
?>
<section class="section">
  <div class="container about-preview">
    <div class="about-photo placeholder-photo"></div>
    <div>
      <h1><?php echo esc_html(kuzurova_get_field('lawyer_name', 'option', 'Кузурова Дарья Дмитриевна')); ?></h1>
      <p class="subtitle"><?php esc_html_e('Юрист', 'kuzurova-law'); ?> · <?php echo esc_html(kuzurova_get_field('city', 'option', 'Минск, Беларусь')); ?></p>
      <div class="entry-content">
        <?php while (have_posts()) : the_post(); the_content(); endwhile; ?>
        <?php if (!have_posts()) : ?>
          <p><?php esc_html_e('Демонстрационный текст об образовании и опыте для прототипа. Замените перед публикацией реальными подтвержденными сведениями.', 'kuzurova-law'); ?></p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>
