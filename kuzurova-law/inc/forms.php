<?php
/**
 * Contact form handler.
 *
 * @package Kuzurova_Law
 */

declare(strict_types=1);

add_action('admin_post_nopriv_kuzurova_contact', 'kuzurova_handle_contact_form');
add_action('admin_post_kuzurova_contact', 'kuzurova_handle_contact_form');

function kuzurova_handle_contact_form(): void
{
    if (!isset($_POST['kuzurova_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['kuzurova_nonce'])), 'kuzurova_contact')) {
        wp_die(esc_html__('Security check failed.', 'kuzurova-law'));
    }

    if (!empty($_POST['website'])) {
        wp_safe_redirect(wp_get_referer() ?: home_url('/contact/'));
        exit;
    }

    $name    = sanitize_text_field(wp_unslash($_POST['name'] ?? ''));
    $phone   = sanitize_text_field(wp_unslash($_POST['phone'] ?? ''));
    $email   = sanitize_email(wp_unslash($_POST['email'] ?? ''));
    $method  = sanitize_text_field(wp_unslash($_POST['contact_method'] ?? ''));
    $message = sanitize_textarea_field(wp_unslash($_POST['message'] ?? ''));
    $consent = !empty($_POST['consent']);

    if (!$name || !$phone || !$email || !$message || !$consent) {
        wp_safe_redirect(add_query_arg('form', 'error', wp_get_referer() ?: home_url('/contact/')));
        exit;
    }

    $to      = kuzurova_get_field('email', 'option') ?: get_option('admin_email');
    $subject = 'Новая заявка с сайта — ' . $name;
    $body    = "Имя: {$name}\nТелефон: {$phone}\nEmail: {$email}\nСпособ связи: {$method}\n\nВопрос:\n{$message}";
    $headers = ['Content-Type: text/plain; charset=UTF-8', 'Reply-To: ' . $email];

    wp_mail($to, $subject, $body, $headers);

    wp_safe_redirect(add_query_arg('form', 'success', home_url('/contact/')));
    exit;
}

function kuzurova_render_contact_form(): void
{
    $status = sanitize_text_field($_GET['form'] ?? '');
    ?>
    <?php if ($status === 'success') : ?>
        <p class="form-notice form-notice--success" role="status"><?php esc_html_e('Заявка отправлена. Я свяжусь с вами в ближайшее время.', 'kuzurova-law'); ?></p>
    <?php elseif ($status === 'error') : ?>
        <p class="form-notice form-notice--error" role="alert"><?php esc_html_e('Заполните все обязательные поля и подтвердите согласие.', 'kuzurova-law'); ?></p>
    <?php endif; ?>
    <form class="contact-form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
        <input type="hidden" name="action" value="kuzurova_contact">
        <?php wp_nonce_field('kuzurova_contact', 'kuzurova_nonce'); ?>
        <label class="hp" aria-hidden="true">
            <input type="text" name="website" tabindex="-1" autocomplete="off">
        </label>
        <label><?php esc_html_e('Имя', 'kuzurova-law'); ?> <input type="text" name="name" required autocomplete="name"></label>
        <label><?php esc_html_e('Телефон', 'kuzurova-law'); ?> <input type="tel" name="phone" required autocomplete="tel"></label>
        <label><?php esc_html_e('Email', 'kuzurova-law'); ?> <input type="email" name="email" required autocomplete="email"></label>
        <label><?php esc_html_e('Удобный способ связи', 'kuzurova-law'); ?>
            <select name="contact_method">
                <option value="phone"><?php esc_html_e('Телефон', 'kuzurova-law'); ?></option>
                <option value="email"><?php esc_html_e('Email', 'kuzurova-law'); ?></option>
                <option value="telegram"><?php esc_html_e('Telegram', 'kuzurova-law'); ?></option>
            </select>
        </label>
        <label><?php esc_html_e('Краткое описание вопроса', 'kuzurova-law'); ?> <textarea name="message" rows="5" required></textarea></label>
        <label class="checkbox">
            <input type="checkbox" name="consent" value="1" required>
            <?php esc_html_e('Даю согласие на обработку персональных данных', 'kuzurova-law'); ?>
        </label>
        <button class="btn btn-primary" type="submit"><?php esc_html_e('Отправить заявку', 'kuzurova-law'); ?></button>
    </form>
    <?php
}
