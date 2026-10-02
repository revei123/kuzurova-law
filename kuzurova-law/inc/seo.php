<?php
/**
 * SEO meta and schema.
 *
 * @package Kuzurova_Law
 */

declare(strict_types=1);

add_action('wp_head', static function (): void {
    if (is_singular()) {
        $post_id = get_queried_object_id();
        $seo_title = kuzurova_get_field('seo_title', $post_id);
        $seo_desc  = kuzurova_get_field('seo_description', $post_id);
        if ($seo_desc) {
            echo '<meta name="description" content="' . esc_attr($seo_desc) . '">' . "\n";
        }
        if ($seo_title) {
            echo '<meta property="og:title" content="' . esc_attr($seo_title) . '">' . "\n";
        }
        if ($seo_desc) {
            echo '<meta property="og:description" content="' . esc_attr($seo_desc) . '">' . "\n";
        }
        if (has_post_thumbnail($post_id)) {
            echo '<meta property="og:image" content="' . esc_url(get_the_post_thumbnail_url($post_id, 'large')) . '">' . "\n";
        }
    }

    echo '<meta property="og:type" content="website">' . "\n";
    echo '<meta property="og:locale" content="ru_RU">' . "\n";
    echo '<link rel="canonical" href="' . esc_url(kuzurova_canonical_url()) . '">' . "\n";
}, 5);

function kuzurova_canonical_url(): string
{
    if (is_singular()) {
        return get_permalink();
    }
    if (is_post_type_archive()) {
        return get_post_type_archive_link(get_post_type()) ?: home_url('/');
    }
    return home_url(add_query_arg([], $GLOBALS['wp']->request ?? ''));
}

add_action('wp_head', static function (): void {
    $name  = kuzurova_get_field('lawyer_name', 'option', 'Кузурова Дарья Дмитриевна');
    $city  = kuzurova_get_field('city', 'option', 'Минск, Беларусь');
    $phone = kuzurova_get_field('phone', 'option');
    $email = kuzurova_get_field('email', 'option');

    $schema = [
        '@context' => 'https://schema.org',
        '@type'    => 'LegalService',
        'name'     => $name,
        'areaServed' => $city,
        'url'      => home_url('/'),
    ];
    if ($phone) {
        $schema['telephone'] = $phone;
    }
    if ($email) {
        $schema['email'] = $email;
    }

    if (is_singular('kl_article')) {
        $schema = [
            '@context' => 'https://schema.org',
            '@type'    => 'Article',
            'headline' => get_the_title(),
            'datePublished' => get_the_date('c'),
            'author' => ['@type' => 'Person', 'name' => $name],
        ];
    }

    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
}, 20);

function kuzurova_breadcrumbs(): void
{
    if (is_front_page()) {
        return;
    }
    echo '<nav class="breadcrumbs" aria-label="Breadcrumb"><ol>';
    echo '<li><a href="' . esc_url(home_url('/')) . '">' . esc_html__('Главная', 'kuzurova-law') . '</a></li>';
    if (is_post_type_archive()) {
        echo '<li aria-current="page">' . esc_html(post_type_archive_title('', false)) . '</li>';
    } elseif (is_singular()) {
        $post_type = get_post_type();
        if ($post_type && $post_type !== 'page') {
            $archive_link = get_post_type_archive_link($post_type);
            if ($archive_link) {
                echo '<li><a href="' . esc_url($archive_link) . '">' . esc_html(get_post_type_object($post_type)->labels->name ?? '') . '</a></li>';
            }
        }
        echo '<li aria-current="page">' . esc_html(get_the_title()) . '</li>';
    } elseif (is_page()) {
        echo '<li aria-current="page">' . esc_html(get_the_title()) . '</li>';
    }
    echo '</ol></nav>';
}
