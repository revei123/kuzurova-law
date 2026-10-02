<?php
/**
 * Helpers.
 *
 * @package Kuzurova_Law
 */

declare(strict_types=1);

function kuzurova_get_field(string $key, $post_id = null, $default = '')
{
    if (function_exists('get_field')) {
        $value = get_field($key, $post_id);
        return $value !== null && $value !== '' ? $value : $default;
    }
    return $default;
}

function kuzurova_excerpt(string $text, int $length = 160): string
{
    $text = wp_strip_all_tags($text);
    if (mb_strlen($text) <= $length) {
        return $text;
    }
    return rtrim(mb_substr($text, 0, $length), '.,; ') . '…';
}

function kuzurova_button(string $url, string $label, string $class = 'btn btn-primary'): string
{
    return sprintf(
        '<a class="%s" href="%s">%s</a>',
        esc_attr($class),
        esc_url($url),
        esc_html($label)
    );
}

function kuzurova_demo_badge(): string
{
    return '<p class="demo-badge" role="note">' . esc_html__('Демонстрационные данные для прототипа', 'kuzurova-law') . '</p>';
}
