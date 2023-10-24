<?php
/* 
Theme functions

@package advancedwordpress


*/

if (!defined('ADVANCEDWORDPRESS_VERSION')) {
    define('ADVANCEDWORDPRESS_VERSION', '1.0.0');
}

if (!defined('ADVANCEDWORDPRESS_DIR_PATH')) {
    define('ADVANCEDWORDPRESS_DIR_PATH', untrailingslashit(get_template_directory()));
}

if (!defined('ADVANCEDWORDPRESS_DIR_URI')) {
    define('ADVANCEDWORDPRESS_DIR_URI', untrailingslashit(get_template_directory_uri()));
}

if (!defined('ADVANCEDWORDPRESS_BUILD_URI')) {
    define('ADVANCEDWORDPRESS_BUILD_URI', untrailingslashit(get_template_directory_uri()) . '/assets/build');
}

if (!defined('ADVANCEDWORDPRESS_BUILD_JS_URI')) {
    define('ADVANCEDWORDPRESS_BUILD_JS_URI', untrailingslashit(get_template_directory_uri()) . '/assets/build/js');
}


if (!defined('ADVANCEDWORDPRESS_BUILD_JS_DIR_PATH')) {
    define('ADVANCEDWORDPRESS_BUILD_JS_DIR_PATH', untrailingslashit(get_template_directory()) . '/assets/build/js');
}

if (!defined('ADVANCEDWORDPRESS_BUILD_IMG_URI')) {
    define('ADVANCEDWORDPRESS_BUILD_IMG_URI', untrailingslashit(get_template_directory_uri()) . '/assets/build/src/img');
}

if (!defined('ADVANCEDWORDPRESS_BUILD_CSS_URI')) {
    define('ADVANCEDWORDPRESS_BUILD_CSS_URI', untrailingslashit(get_template_directory_uri()) . '/assets/build/css');
}
