<?php
/**
 * Custom post types.
 *
 * @package Kuzurova_Law
 */

declare(strict_types=1);

add_action('init', static function (): void {
    register_post_type('kl_service', [
        'labels' => [
            'name'          => __('Services', 'kuzurova-law'),
            'singular_name' => __('Service', 'kuzurova-law'),
            'add_new_item'  => __('Add service', 'kuzurova-law'),
        ],
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => ['slug' => 'services', 'with_front' => false],
        'menu_icon'    => 'dashicons-portfolio',
        'show_in_rest' => true,
        'supports'     => ['title', 'editor', 'thumbnail', 'excerpt', 'revisions'],
    ]);

    register_post_type('kl_case', [
        'labels' => [
            'name'          => __('Cases', 'kuzurova-law'),
            'singular_name' => __('Case', 'kuzurova-law'),
        ],
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => ['slug' => 'cases', 'with_front' => false],
        'menu_icon'    => 'dashicons-analytics',
        'show_in_rest' => true,
        'supports'     => ['title', 'editor', 'thumbnail', 'excerpt', 'revisions'],
    ]);

    register_post_type('kl_review', [
        'labels' => [
            'name'          => __('Reviews', 'kuzurova-law'),
            'singular_name' => __('Review', 'kuzurova-law'),
        ],
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => ['slug' => 'reviews', 'with_front' => false],
        'menu_icon'    => 'dashicons-format-quote',
        'show_in_rest' => true,
        'supports'     => ['title', 'editor', 'thumbnail', 'revisions'],
    ]);

    register_post_type('kl_article', [
        'labels' => [
            'name'          => __('Articles', 'kuzurova-law'),
            'singular_name' => __('Article', 'kuzurova-law'),
        ],
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => ['slug' => 'blog', 'with_front' => false],
        'menu_icon'    => 'dashicons-media-text',
        'show_in_rest' => true,
        'supports'     => ['title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'author'],
        'taxonomies'   => ['category'],
    ]);

    register_taxonomy('kl_case_category', 'kl_case', [
        'labels'       => ['name' => __('Case categories', 'kuzurova-law')],
        'public'       => true,
        'rewrite'      => ['slug' => 'case-category'],
        'show_in_rest' => true,
        'hierarchical' => true,
    ]);
});

add_filter('post_type_link', static function (string $post_link, WP_Post $post): string {
    if ($post->post_type === 'kl_article') {
        return home_url('/blog/' . $post->post_name . '/');
    }
    return $post_link;
}, 10, 2);
