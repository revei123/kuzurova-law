<?php
/**
 * Demo content seed (run once on theme activation).
 *
 * @package Kuzurova_Law
 */

declare(strict_types=1);

add_action('after_switch_theme', static function (): void {
    if (get_option('kuzurova_demo_seeded')) {
        return;
    }
    kuzurova_seed_demo_content();
    update_option('kuzurova_demo_seeded', 1);
    flush_rewrite_rules();
});

function kuzurova_seed_demo_content(): void
{
    $pages = [
        'about'   => ['title' => 'Обо мне', 'template' => 'templates/page-about.php'],
        'contact' => ['title' => 'Контакты', 'template' => 'templates/page-contact.php'],
        'privacy-policy' => ['title' => 'Политика конфиденциальности', 'template' => 'templates/page-privacy.php'],
    ];

    foreach ($pages as $slug => $data) {
        if (!get_page_by_path($slug)) {
            $id = wp_insert_post([
                'post_title'   => $data['title'],
                'post_name'    => $slug,
                'post_status'  => 'publish',
                'post_type'    => 'page',
                'post_content' => '',
            ]);
            if ($id && !is_wp_error($id)) {
                update_post_meta($id, '_wp_page_template', $data['template']);
            }
        }
    }

    $services = [
        ['slug' => 'grazhdanskie-konsultacii', 'title' => 'Консультация по гражданским вопросам', 'short' => 'Разбор ситуации и понятный план действий по гражданско-правовым спорам.'],
        ['slug' => 'dogovornoe-pravo', 'title' => 'Договорное право', 'short' => 'Подготовка, проверка и сопровождение договоров.'],
        ['slug' => 'semeinye-spory', 'title' => 'Семейные споры', 'short' => 'Консультации и сопровождение по семейным вопросам.'],
        ['slug' => 'zashchita-v-sude', 'title' => 'Защита интересов в суде', 'short' => 'Подготовка позиции и представление интересов клиента.'],
        ['slug' => 'pretenzionnaya-rabota', 'title' => 'Претензионная работа', 'short' => 'Досудебное урегулирование споров.'],
        ['slug' => 'analiz-dokumentov', 'title' => 'Юридический анализ документов', 'short' => 'Проверка рисков и рекомендации по документам.'],
    ];

    foreach ($services as $service) {
        if (get_page_by_path($service['slug'], OBJECT, 'kl_service')) {
            continue;
        }
        $id = wp_insert_post([
            'post_type'    => 'kl_service',
            'post_title'   => $service['title'],
            'post_name'    => $service['slug'],
            'post_status'  => 'publish',
            'post_content' => '<p>Демонстрационное описание услуги для прототипа. Замените текст перед публикацией.</p>',
            'post_excerpt' => $service['short'],
        ]);
        if ($id && !is_wp_error($id) && function_exists('update_field')) {
            update_field('short_description', $service['short'], $id);
            update_field('price', 'от 80 BYN (демо)', $id);
        }
    }

    $cases = [
        ['title' => 'Спор по условиям договора поставки', 'cat' => 'Договорное право'],
        ['title' => 'Семейный вопрос: согласование порядка общения', 'cat' => 'Семейное право'],
        ['title' => 'Претензия по некачественно выполненным работам', 'cat' => 'Претензионная работа'],
        ['title' => 'Анализ договора аренды перед подписанием', 'cat' => 'Анализ документов'],
    ];

    foreach ($cases as $case) {
        $id = wp_insert_post([
            'post_type'   => 'kl_case',
            'post_title'  => $case['title'],
            'post_status' => 'publish',
            'post_content'=> '<p>Демонстрационный кейс для прототипа.</p>',
        ]);
        if ($id && !is_wp_error($id) && function_exists('update_field')) {
            update_field('problem', 'Клиент столкнулся с неясными условиями и рисками (демо).', $id);
            update_field('task', 'Оценить ситуацию и предложить план действий (демо).', $id);
            update_field('approach', 'Анализ документов, консультация, подготовка претензии/позиции (демо).', $id);
            update_field('result', 'Согласован понятный план дальнейших шагов (демо, не подтвержденный судебный результат).', $id);
            update_field('is_demo', 1, $id);
            wp_set_object_terms($id, $case['cat'], 'kl_case_category');
        }
    }

    $reviews = [
        ['name' => 'Анна', 'text' => 'Понятно объяснили ситуацию и что можно сделать дальше. (Демо-отзыв)'],
        ['name' => 'Игорь', 'text' => 'Спокойная консультация, без давления. (Демо-отзыв)'],
        ['name' => 'Ольга', 'text' => 'Получила структурированный план по документам. (Дemo-отзыв)'],
    ];

    foreach ($reviews as $review) {
        wp_insert_post([
            'post_type'    => 'kl_review',
            'post_title'   => $review['name'],
            'post_status'  => 'publish',
            'post_content' => $review['text'],
        ]);
    }

    $articles = [
        'chto-proverit-pered-podpisyvaniem-dogovora' => 'Что проверить перед подписанием договора',
        'kogda-nuzhna-yuridicheskaya-konsultaciya' => 'Когда необходима юридическая консультация',
        'kak-podgotovitsya-k-konsultacii-yurista' => 'Как подготовиться к консультации юриста',
        'chto-delat-esli-narusheny-usloviya-dogovora' => 'Что делать, если нарушены условия договора',
    ];

    foreach ($articles as $slug => $title) {
        wp_insert_post([
            'post_type'    => 'kl_article',
            'post_title'   => $title,
            'post_name'    => $slug,
            'post_status'  => 'publish',
            'post_content' => '<p>Демонстрационная статья для прототипа. Замените текст перед публикацией.</p>',
            'post_excerpt' => 'Краткое описание статьи для карточки (демо).',
        ]);
    }

    update_option('show_on_front', 'page');
    $front = get_page_by_path('home');
    if (!$front) {
        $front_id = wp_insert_post([
            'post_title'  => 'Главная',
            'post_name'   => 'home',
            'post_status' => 'publish',
            'post_type'   => 'page',
        ]);
        if ($front_id && !is_wp_error($front_id)) {
            update_option('page_on_front', $front_id);
        }
    }
}
