<?php
get_header();
?>
<section class="section"><div class="container"><h1><?php esc_html_e('Блог', 'kuzurova-law'); ?></h1><?php if (have_posts()) : while (have_posts()) : the_post(); get_template_part('template-parts/components/card', 'article'); endwhile; endif; ?></div></section>
<?php get_footer(); ?>
