<?php
/**
 * Plugin Name: BrightLocal - Helpers
 * Description: A collection of optional frontend and backend tweaks for BrightLocal
 * Version: 1.0.0
 * Author: Ash Whiting for BrightLocal
 */

if (!defined('ABSPATH')) {
    exit;
}

// Autoload Helpers and Manager
require_once __DIR__ . '/includes/class-blh-manager.php';
require_once __DIR__ . '/admin/settings-page.php';

// Initialize Helpers
add_action('plugins_loaded', ['BLH_Manager', 'init']);