<article <?php post_class('card card-service'); ?>>
  <?php if (has_post_thumbnail()) : ?>
    <?php the_post_thumbnail('kuzurova-card', ['loading' => 'lazy', 'alt' => esc_attr(get_the_title())]); ?>
  <?php endif; ?>
  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
  <p><?php echo esc_html(kuzurova_get_field('short_description') ?: get_the_excerpt()); ?></p>
  <a class="card-link" href="<?php the_permalink(); ?>"><?php esc_html_e('Подробнее', 'kuzurova-law'); ?></a>
</article>
