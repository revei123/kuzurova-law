<article <?php post_class('card card-case'); ?>>
  <?php if (kuzurova_get_field('is_demo')) : ?>
    <span class="demo-tag"><?php esc_html_e('Демонстрационный кейс', 'kuzurova-law'); ?></span>
  <?php endif; ?>
  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
  <p><?php echo esc_html(kuzurova_excerpt(kuzurova_get_field('problem', get_the_ID(), get_the_excerpt()))); ?></p>
  <a class="card-link" href="<?php the_permalink(); ?>"><?php esc_html_e('Читать кейс', 'kuzurova-law'); ?></a>
</article>
