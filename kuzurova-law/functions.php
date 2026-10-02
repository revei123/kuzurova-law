<?php
/**
 * Theme bootstrap.
 *
 * @package Kuzurova_Law
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

define('KUZUROVA_LAW_VERSION', '1.0.0');
define('KUZUROVA_LAW_PATH', get_template_directory());
define('KUZUROVA_LAW_URI', get_template_directory_uri());

require_once KUZUROVA_LAW_PATH . '/inc/setup.php';
require_once KUZUROVA_LAW_PATH . '/inc/enqueue.php';
require_once KUZUROVA_LAW_PATH . '/inc/cpt.php';
require_once KUZUROVA_LAW_PATH . '/inc/acf-fields.php';
require_once KUZUROVA_LAW_PATH . '/inc/seo.php';
require_once KUZUROVA_LAW_PATH . '/inc/forms.php';
require_once KUZUROVA_LAW_PATH . '/inc/helpers.php';
require_once KUZUROVA_LAW_PATH . '/inc/demo-seed.php';
