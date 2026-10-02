<?php
/**
 * Assets.
 *
 * @package Kuzurova_Law
 */

declare(strict_types=1);

add_action('wp_enqueue_scripts', static function (): void {
    wp_enqueue_style(
        'kuzurova-fonts',
        'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=DM+Sans:wght@400;500;600;700&display=swap',
        [],
        null
    );

    wp_enqueue_style(
        'kuzurova-main',
        KUZUROVA_LAW_URI . '/assets/css/main.css',
        ['kuzurova-fonts'],
        KUZUROVA_LAW_VERSION
    );

    wp_enqueue_script(
        'kuzurova-main',
        KUZUROVA_LAW_URI . '/assets/js/main.js',
        [],
        KUZUROVA_LAW_VERSION,
        true
    );
});

add_action('wp_head', static function (): void {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
}, 1);
