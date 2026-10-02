<?php
/**
 * Header.
 *
 * @package Kuzurova_Law
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main"><?php esc_html_e('Перейти к содержимому', 'kuzurova-law'); ?></a>
<header class="site-header">
  <div class="container header-inner">
    <a class="logo" href="<?php echo esc_url(home_url('/')); ?>">
      <span class="logo-name"><?php echo esc_html(kuzurova_get_field('lawyer_name', 'option', 'Кузурова Дарья Дмитриевна')); ?></span>
      <span class="logo-role"><?php esc_html_e('Юрист', 'kuzurova-law'); ?> · <?php echo esc_html(kuzurova_get_field('city', 'option', 'Минск, Беларусь')); ?></span>
    </a>
    <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="primary-menu"><?php esc_html_e('Меню', 'kuzurova-law'); ?></button>
    <?php
    wp_nav_menu([
        'theme_location' => 'primary',
        'menu_id'        => 'primary-menu',
        'menu_class'     => 'primary-nav',
        'container'      => 'nav',
        'container_class'=> 'site-nav',
        'fallback_cb'    => static function (): void {
            echo '<nav class="site-nav"><ul class="primary-nav" id="primary-menu">';
            echo '<li><a href="' . esc_url(home_url('/services/')) . '">' . esc_html__('Услуги', 'kuzurova-law') . '</a></li>';
            echo '<li><a href="' . esc_url(home_url('/about/')) . '">' . esc_html__('Обо мне', 'kuzurova-law') . '</a></li>';
            echo '<li><a href="' . esc_url(home_url('/cases/')) . '">' . esc_html__('Кейсы', 'kuzurova-law') . '</a></li>';
            echo '<li><a href="' . esc_url(home_url('/blog/')) . '">' . esc_html__('Блог', 'kuzurova-law') . '</a></li>';
            echo '<li><a href="' . esc_url(home_url('/contact/')) . '">' . esc_html__('Контакты', 'kuzurova-law') . '</a></li>';
            echo '</ul></nav>';
        },
    ]);
    ?>
  </div>
</header>
<main id="main" class="site-main">
