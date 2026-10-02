<?php
/**
 * Footer.
 *
 * @package Kuzurova_Law
 */
?>
</main>
<section class="section cta-block">
  <div class="container cta-inner">
    <h2><?php esc_html_e('Нужна консультация?', 'kuzurova-law'); ?></h2>
    <p><?php esc_html_e('Опишите ситуацию — вместе определим, какие шаги стоит сделать дальше.', 'kuzurova-law'); ?></p>
    <?php echo kuzurova_button(home_url('/contact/'), __('Записаться на консультацию', 'kuzurova-law')); ?>
  </div>
</section>
<footer class="site-footer">
  <div class="container footer-grid">
    <div>
      <p class="footer-name"><?php echo esc_html(kuzurova_get_field('lawyer_name', 'option', 'Кузурова Дарья Дмитриевна')); ?></p>
      <p><?php echo esc_html(kuzurova_get_field('city', 'option', 'Минск, Беларусь')); ?></p>
    </div>
    <div>
      <?php if ($phone = kuzurova_get_field('phone', 'option')) : ?>
        <p><a href="tel:<?php echo esc_attr(preg_replace('/\D+/', '', $phone)); ?>"><?php echo esc_html($phone); ?></a></p>
      <?php endif; ?>
      <?php if ($email = kuzurova_get_field('email', 'option')) : ?>
        <p><a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></p>
      <?php endif; ?>
    </div>
    <div>
      <p><a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>"><?php esc_html_e('Политика конфиденциальности', 'kuzurova-law'); ?></a></p>
      <p class="footer-note"><?php esc_html_e('Прототип сайта. Демонстрационный контент.', 'kuzurova-law'); ?></p>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
