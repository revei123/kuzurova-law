<?php
/**
 * Front page.
 *
 * @package Kuzurova_Law
 */

get_header();
$name = kuzurova_get_field('lawyer_name', 'option', 'Кузурова Дарья Дмитриевна');
$city = kuzurova_get_field('city', 'option', 'Минск, Беларусь');
?>
<section class="hero section">
  <div class="container hero-grid">
    <div class="hero-copy">
      <p class="eyebrow"><?php echo esc_html($name); ?></p>
      <h1><?php esc_html_e('Юридическая помощь в Минске', 'kuzurova-law'); ?></h1>
      <p class="lead"><?php esc_html_e('Помощь в решении юридических вопросов — от консультации до сопровождения дела.', 'kuzurova-law'); ?></p>
      <div class="hero-actions">
        <?php echo kuzurova_button(home_url('/contact/'), __('Записаться на консультацию', 'kuzurova-law')); ?>
        <?php echo kuzurova_button(home_url('/services/'), __('Посмотреть услуги', 'kuzurova-law'), 'btn btn-secondary'); ?>
      </div>
      <p class="trust-line"><?php esc_html_e('Индивидуальный подход • Конфиденциальность • Понятное объяснение юридических вопросов', 'kuzurova-law'); ?></p>
    </div>
    <div class="hero-visual">
      <div class="hero-photo placeholder-photo" aria-hidden="true"></div>
    </div>
  </div>
</section>

<section class="section section-alt fade-in">
  <div class="container">
    <h2><?php esc_html_e('С чем я могу помочь', 'kuzurova-law'); ?></h2>
    <div class="cards-grid">
      <?php
      $services = new WP_Query(['post_type' => 'kl_service', 'posts_per_page' => 6]);
      if ($services->have_posts()) :
          while ($services->have_posts()) :
              $services->the_post();
              get_template_part('template-parts/components/card', 'service');
          endwhile;
          wp_reset_postdata();
      endif;
      ?>
    </div>
  </div>
</section>

<section class="section fade-in">
  <div class="container about-preview">
    <div class="about-photo placeholder-photo"></div>
    <div>
      <h2><?php echo esc_html($name); ?></h2>
      <p class="subtitle"><?php esc_html_e('Юрист', 'kuzurova-law'); ?> · <?php echo esc_html($city); ?></p>
      <p><?php esc_html_e('Демонстрационный текст о профессиональном подходе: внимательный разбор ситуации, понятные объяснения и аккуратная работа с документами. Замените этот текст перед публикацией.', 'kuzurova-law'); ?></p>
      <?php echo kuzurova_button(home_url('/about/'), __('Подробнее обо мне', 'kuzurova-law'), 'btn btn-secondary'); ?>
    </div>
  </div>
</section>

<section class="section section-alt fade-in">
  <div class="container">
    <h2><?php esc_html_e('Почему клиентам удобно работать со мной', 'kuzurova-law'); ?></h2>
    <ul class="benefits-list">
      <li><?php esc_html_e('Понятно объясняю сложные вопросы', 'kuzurova-law'); ?></li>
      <li><?php esc_html_e('Разбираюсь в ситуации до начала работы', 'kuzurova-law'); ?></li>
      <li><?php esc_html_e('Работаю конфиденциально', 'kuzurova-law'); ?></li>
      <li><?php esc_html_e('Предлагаю понятный план дальнейших действий', 'kuzurova-law'); ?></li>
    </ul>
  </div>
</section>

<section class="section fade-in">
  <div class="container">
    <h2><?php esc_html_e('Кейсы', 'kuzurova-law'); ?></h2>
    <?php echo kuzurova_demo_badge(); ?>
    <div class="cards-grid">
      <?php
      $cases = new WP_Query(['post_type' => 'kl_case', 'posts_per_page' => 4]);
      while ($cases->have_posts()) :
          $cases->the_post();
          get_template_part('template-parts/components/card', 'case');
      endwhile;
      wp_reset_postdata();
      ?>
    </div>
  </div>
</section>

<section class="section section-alt fade-in">
  <div class="container">
    <h2><?php esc_html_e('Отзывы', 'kuzurova-law'); ?></h2>
    <p class="demo-note"><?php esc_html_e('Демонстрационные отзывы — заменить перед публикацией', 'kuzurova-law'); ?></p>
    <div class="reviews-grid">
      <?php
      $reviews = new WP_Query(['post_type' => 'kl_review', 'posts_per_page' => 5]);
      while ($reviews->have_posts()) :
          $reviews->the_post();
          get_template_part('template-parts/components/card', 'review');
      endwhile;
      wp_reset_postdata();
      ?>
    </div>
  </div>
</section>

<section class="section fade-in">
  <div class="container">
    <h2><?php esc_html_e('Блог', 'kuzurova-law'); ?></h2>
    <div class="cards-grid">
      <?php
      $articles = new WP_Query(['post_type' => 'kl_article', 'posts_per_page' => 4]);
      while ($articles->have_posts()) :
          $articles->the_post();
          get_template_part('template-parts/components/card', 'article');
      endwhile;
      wp_reset_postdata();
      ?>
    </div>
  </div>
</section>
<?php
get_footer();
