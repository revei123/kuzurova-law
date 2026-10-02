<?php
/**
 * ACF field groups (local registration).
 *
 * @package Kuzurova_Law
 */

declare(strict_types=1);

add_action('acf/init', static function (): void {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_local_field_group([
        'key'    => 'group_kl_service',
        'title'  => 'Service fields',
        'fields' => [
            ['key' => 'field_kl_service_short', 'label' => 'Short description', 'name' => 'short_description', 'type' => 'textarea', 'rows' => 3],
            ['key' => 'field_kl_service_price', 'label' => 'Price / consultation cost', 'name' => 'price', 'type' => 'text'],
            ['key' => 'field_kl_service_benefits', 'label' => 'Benefits', 'name' => 'benefits', 'type' => 'repeater', 'sub_fields' => [
                ['key' => 'field_kl_service_benefit_item', 'label' => 'Item', 'name' => 'item', 'type' => 'text'],
            ]],
            ['key' => 'field_kl_service_faq', 'label' => 'FAQ', 'name' => 'faq', 'type' => 'repeater', 'sub_fields' => [
                ['key' => 'field_kl_service_faq_q', 'label' => 'Question', 'name' => 'question', 'type' => 'text'],
                ['key' => 'field_kl_service_faq_a', 'label' => 'Answer', 'name' => 'answer', 'type' => 'textarea', 'rows' => 3],
            ]],
            ['key' => 'field_kl_service_seo_title', 'label' => 'SEO Title', 'name' => 'seo_title', 'type' => 'text'],
            ['key' => 'field_kl_service_seo_desc', 'label' => 'SEO Description', 'name' => 'seo_description', 'type' => 'textarea', 'rows' => 3],
        ],
        'location' => [[['param' => 'post_type', 'operator' => '==', 'value' => 'kl_service']]],
    ]);

    acf_add_local_field_group([
        'key'    => 'group_kl_case',
        'title'  => 'Case fields',
        'fields' => [
            ['key' => 'field_kl_case_problem', 'label' => 'Client problem', 'name' => 'problem', 'type' => 'textarea', 'rows' => 4],
            ['key' => 'field_kl_case_task', 'label' => 'Task', 'name' => 'task', 'type' => 'textarea', 'rows' => 4],
            ['key' => 'field_kl_case_approach', 'label' => 'Approach', 'name' => 'approach', 'type' => 'textarea', 'rows' => 4],
            ['key' => 'field_kl_case_result', 'label' => 'Result', 'name' => 'result', 'type' => 'textarea', 'rows' => 4],
            ['key' => 'field_kl_case_demo', 'label' => 'Demo case flag', 'name' => 'is_demo', 'type' => 'true_false', 'ui' => 1, 'default_value' => 1],
            ['key' => 'field_kl_case_seo_title', 'label' => 'SEO Title', 'name' => 'seo_title', 'type' => 'text'],
            ['key' => 'field_kl_case_seo_desc', 'label' => 'SEO Description', 'name' => 'seo_description', 'type' => 'textarea', 'rows' => 3],
        ],
        'location' => [[['param' => 'post_type', 'operator' => '==', 'value' => 'kl_case']]],
    ]);

    acf_add_local_field_group([
        'key'    => 'group_kl_review',
        'title'  => 'Review fields',
        'fields' => [
            ['key' => 'field_kl_review_name', 'label' => 'Client name', 'name' => 'client_name', 'type' => 'text'],
            ['key' => 'field_kl_review_date', 'label' => 'Date', 'name' => 'review_date', 'type' => 'date_picker', 'display_format' => 'd.m.Y', 'return_format' => 'Y-m-d'],
            ['key' => 'field_kl_review_service', 'label' => 'Service', 'name' => 'related_service', 'type' => 'post_object', 'post_type' => ['kl_service'], 'return_format' => 'object'],
            ['key' => 'field_kl_review_demo_note', 'label' => 'Admin note', 'name' => 'demo_note', 'type' => 'message', 'message' => 'Демонстрационные отзывы — заменить перед публикацией'],
        ],
        'location' => [[['param' => 'post_type', 'operator' => '==', 'value' => 'kl_review']]],
    ]);

    acf_add_local_field_group([
        'key'    => 'group_kl_article',
        'title'  => 'Article SEO',
        'fields' => [
            ['key' => 'field_kl_article_seo_title', 'label' => 'SEO Title', 'name' => 'seo_title', 'type' => 'text'],
            ['key' => 'field_kl_article_seo_desc', 'label' => 'SEO Description', 'name' => 'seo_description', 'type' => 'textarea', 'rows' => 3],
        ],
        'location' => [[['param' => 'post_type', 'operator' => '==', 'value' => 'kl_article']]],
    ]);

    acf_add_local_field_group([
        'key'    => 'group_kl_options',
        'title'  => 'Site settings',
        'fields' => [
            ['key' => 'field_kl_lawyer_name', 'label' => 'Lawyer name', 'name' => 'lawyer_name', 'type' => 'text', 'default_value' => 'Кузурова Дарья Дмитриевна'],
            ['key' => 'field_kl_city', 'label' => 'City', 'name' => 'city', 'type' => 'text', 'default_value' => 'Минск, Беларусь'],
            ['key' => 'field_kl_phone', 'label' => 'Phone', 'name' => 'phone', 'type' => 'text'],
            ['key' => 'field_kl_email', 'label' => 'Email', 'name' => 'email', 'type' => 'email'],
            ['key' => 'field_kl_telegram', 'label' => 'Telegram', 'name' => 'telegram', 'type' => 'url'],
            ['key' => 'field_kl_address', 'label' => 'Address', 'name' => 'address', 'type' => 'text'],
        ],
        'location' => [[['param' => 'options_page', 'operator' => '==', 'value' => 'kuzurova-settings']]],
    ]);
});

add_action('acf/init', static function (): void {
    if (!function_exists('acf_add_options_page')) {
        return;
    }
    acf_add_options_page([
        'page_title' => 'Site settings',
        'menu_title' => 'Site settings',
        'menu_slug'  => 'kuzurova-settings',
        'capability' => 'edit_posts',
        'redirect'   => false,
    ]);
});

add_filter('acf/settings/save_json', static fn (): string => KUZUROVA_LAW_PATH . '/acf-json');
add_filter('acf/settings/load_json', static function (array $paths): array {
    $paths[] = KUZUROVA_LAW_PATH . '/acf-json';
    return $paths;
});
