<?php
get_header();
kuzurova_breadcrumbs();
?>
<section class="section">
  <div class="container">
    <h1><?php post_type_archive_title(); ?></h1>
    <div class="cards-grid">
      <?php if (have_posts()) : while (have_posts()) : the_post();
          $type = get_post_type();
          get_template_part('template-parts/components/card', $type === 'kl_service' ? 'service' : ($type === 'kl_case' ? 'case' : ($type === 'kl_review' ? 'review' : 'article')));
      endwhile; else :
          echo '<p>' . esc_html__('Материалы скоро появятся.', 'kuzurova-law') . '</p>';
      endif; ?>
    </div>
    <?php the_posts_pagination(); ?>
  </div>
</section>
<?php get_footer(); ?>
