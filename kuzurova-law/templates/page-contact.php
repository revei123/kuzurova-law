<?php
/**
 * Template Name: Contact
 */
get_header();
kuzurova_breadcrumbs();
?>
<section class="section">
  <div class="container contact-grid">
    <div>
      <h1><?php esc_html_e('Контакты / запись на консультацию', 'kuzurova-law'); ?></h1>
      <p><?php esc_html_e('Оставьте заявку — я свяжусь с вами и предложу удобное время для консультации.', 'kuzurova-law'); ?></p>
      <?php kuzurova_render_contact_form(); ?>
    </div>
    <aside class="contact-aside">
      <p><strong><?php echo esc_html(kuzurova_get_field('lawyer_name', 'option', 'Кузурова Дарья Дмитриевна')); ?></strong></p>
      <p><?php echo esc_html(kuzurova_get_field('city', 'option', 'Минск, Беларусь')); ?></p>
    </aside>
  </div>
</section>
<?php get_footer(); ?>
