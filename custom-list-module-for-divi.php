<?php
/**
 * Plugin Name:     Custom List Module For Divi
 * Description:     Divi module for building custom lists.
 * Author:          M R K Development Pty Ltd
 * Author URI:      https://www.mrkwp.com
 * Text Domain:     divi-custom-list-module
 * Domain Path:     /languages
 * Version:         1.1.0
 *
 * @package         
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

define('DF_CUSTOM_LIST_VERSION', '1.1.0');
define('DF_CUSTOM_LIST_DIR', __DIR__);
define('DF_CUSTOM_LIST_URL', plugins_url('/' . basename(__DIR__)));

require_once DF_CUSTOM_LIST_DIR . '/vendor/autoload.php';

$container = \DF_CUSTOM_LIST\Container::getInstance();
$container['plugin_name'] = 'Custom List Module For Divi';
$container['plugin_version'] = DF_CUSTOM_LIST_VERSION;
$container['plugin_file'] = __FILE__;
$container['plugin_dir'] = DF_CUSTOM_LIST_DIR;
$container['plugin_url'] = DF_CUSTOM_LIST_URL;
$container['plugin_slug'] = 'divi-custom-list-module';

// activation hook.
register_activation_hook(__FILE__, array($container['activation'], 'install'));

$container->run();
