<article <?php post_class('card card-review'); ?>>
  <p class="review-text"><?php the_content(); ?></p>
  <p class="review-author"><?php echo esc_html(kuzurova_get_field('client_name') ?: get_the_title()); ?></p>
</article>
