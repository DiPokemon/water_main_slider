<?php
/*
Plugin Name: Главный слайдер
Description: Основной слайдер на главной
Version: 1.0
*/

global $wpdb;

if ( ! defined( 'ABSPATH' ) ) exit;



/**************
 * Константы
 **************/
define( 'WATER_MAIN_SLIDER_PLUGIN_DB_VERSION', '1.0' );
define( 'WATER_MAIN_SLIDER_PLUGIN_NAME',     'water_main_slider' );
define( 'WATER_MAIN_SLIDER_PLUGIN_NAME_RU',  'Основной слайдер' );
define( 'WATER_MAIN_SLIDER_DB_TABLE_NAME',    $wpdb->prefix . WATER_MAIN_SLIDER_PLUGIN_NAME );
define( 'WATER_MAIN_SLIDER_PLUGIN_DIR',       plugin_dir_path( __FILE__ ) );
define( 'WATER_MAIN_SLIDER_PLUGIN_ADMIN_URL', admin_url('?page=' . WATER_MAIN_SLIDER_PLUGIN_NAME) );



/**************
 * Class
 **************/
require_once dirname(__FILE__) . '/inc/class-main.php';
require_once dirname(__FILE__) . '/inc/class-model.php';
$water_main_class = new WaterMainSlider( __FILE__ );



/**************
 * Run
 **************/

// Правила активации:
// register_activation_hook() должен вызываться из основного файла плагина, из того где расположена директива Plugin Name
register_activation_hook(__FILE__, array($water_main_class, 'activate'));