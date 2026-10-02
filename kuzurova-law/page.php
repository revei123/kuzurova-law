<?php
get_header();
kuzurova_breadcrumbs();
?>
<section class="section"><div class="container content-narrow"><h1><?php the_title(); ?></h1><div class="entry-content"><?php while (have_posts()) : the_post(); the_content(); endwhile; ?></div></div></section>
<?php get_footer(); ?>
