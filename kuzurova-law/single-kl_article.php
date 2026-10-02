<?php
get_header();
kuzurova_breadcrumbs();
?>
<article class="section single-article">
  <div class="container content-narrow">
    <p class="meta"><?php echo esc_html(get_the_date('d.m.Y')); ?></p>
    <h1><?php the_title(); ?></h1>
    <div class="entry-content"><?php the_content(); ?></div>
  </div>
</article>
<?php get_footer(); ?>
