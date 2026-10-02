<?php
get_header();
kuzurova_breadcrumbs();
?>
<article class="section single-service">
  <div class="container content-narrow">
    <h1><?php the_title(); ?></h1>
    <?php if ($price = kuzurova_get_field('price')) : ?><p class="price"><?php echo esc_html($price); ?></p><?php endif; ?>
    <div class="entry-content"><?php the_content(); ?></div>
    <?php if ($benefits = kuzurova_get_field('benefits')) : ?>
      <h2><?php esc_html_e('Преимущества', 'kuzurova-law'); ?></h2>
      <ul><?php foreach ($benefits as $row) : ?><li><?php echo esc_html($row['item'] ?? ''); ?></li><?php endforeach; ?></ul>
    <?php endif; ?>
    <?php if ($faq = kuzurova_get_field('faq')) : ?>
      <h2>FAQ</h2>
      <div class="faq"><?php foreach ($faq as $row) : ?>
        <details><summary><?php echo esc_html($row['question'] ?? ''); ?></summary><p><?php echo esc_html($row['answer'] ?? ''); ?></p></details>
      <?php endforeach; ?></div>
    <?php endif; ?>
    <?php echo kuzurova_button(home_url('/contact/'), __('Записаться на консультацию', 'kuzurova-law')); ?>
  </div>
</article>
<?php get_footer(); ?>
