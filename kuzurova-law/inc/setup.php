<?php
/**
 * Theme setup.
 *
 * @package Kuzurova_Law
 */

declare(strict_types=1);

add_action('after_setup_theme', static function (): void {
    load_theme_textdomain('kuzurova-law', KUZUROVA_LAW_PATH . '/languages');

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);
    add_theme_support('responsive-embeds');
    add_theme_support('editor-styles');
    add_editor_style('assets/css/editor.css');

    add_theme_support('align-wide');
    add_theme_support('wp-block-styles');

    register_nav_menus([
        'primary' => __('Primary menu', 'kuzurova-law'),
        'footer'  => __('Footer menu', 'kuzurova-law'),
    ]);

    add_image_size('kuzurova-card', 640, 400, true);
    add_image_size('kuzurova-hero', 1200, 800, true);
});

add_filter('document_title_separator', static fn (): string => '—');

add_action('init', static function (): void {
    global $wp_rewrite;
    $wp_rewrite->author_base = 'author';
});
