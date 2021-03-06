<?php

// Template functions. If order is important, replace this and require each file separately.
foreach ( glob( dirname( __FILE__ ) . '/includes/template_functions/*.php' ) as $filename ) {
	require_once($filename);
}

// Includes
include_once 'includes/admin_favicon.php'; // adds favicon to the admin backend
include_once 'includes/customizer.php';
include_once 'includes/body_class.php'; // Expand body classes
include_once 'includes/cpt_archives.php'; // Add custom post types to wp_get_archives
require_once 'includes/edit_class.php'; // Expand edit link classes
require_once 'includes/fresco.php'; // Uses fresco.js for gallery and content images
include_once 'includes/image_sizes.php'; // image size definitions
include_once 'includes/login_page.php'; // Customize admin login
require_once 'includes/menu_classes.php'; // Expand menu classes
include_once 'includes/menus.php'; // core menu registration
require_once 'includes/post_classes.php'; // Expand post classes
include_once 'includes/post_image_classes.php'; // Post classes for images
include_once 'includes/scripts.php'; // Enqued Scripts
include_once 'includes/share_meta.php'; // sharing meta tags
// include_once 'includes/sidebars.php'; // core sidebar registration
include_once 'includes/sub_menu.php'; // sub menu hook
include_once 'includes/theme_setup.php'; // stylesheet_uri, after_setup_theme, cleanup head
