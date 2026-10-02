<article <?php post_class('card card-article'); ?>>
  <?php if (has_post_thumbnail()) : ?>
    <?php the_post_thumbnail('kuzurova-card', ['loading' => 'lazy']); ?>
  <?php endif; ?>
  <p class="meta"><?php echo esc_html(get_the_date('d.m.Y')); ?> · <?php echo esc_html(get_the_category_list(', ') ?: __('Статья', 'kuzurova-law')); ?></p>
  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
  <p><?php echo esc_html(get_the_excerpt()); ?></p>
  <a class="card-link" href="<?php the_permalink(); ?>"><?php esc_html_e('Читать статью', 'kuzurova-law'); ?></a>
</article>
