<?php
/*
Plugin Name: company
Description:
Version: 1
Author: ifm.com
Author URI: http://ifm.com
*/
// function to create the DB / Options / Defaults	




function ss_options_install() {

    global $wpdb;

    $table_name = $wpdb->prefix . "company";
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE $table_name (
            `id` varchar(3) CHARACTER SET utf8 NOT NULL,
            `company_name` varchar(50) CHARACTER SET utf8 NOT NULL,
		    `year_of_incorporation` varchar(50) CHARACTER SET utf8 NOT NULL,
      	    `industry` varchar(150) CHARACTER SET utf8 NOT NULL,
			`country` varchar(150) CHARACTER SET utf8 NOT NULL,
			`subsidiaries` varchar(300) CHARACTER SET utf8 NOT NULL,
			`website` varchar(300) CHARACTER SET utf8 NOT NULL,
			`CEO` varchar(300) CHARACTER SET utf8 NOT NULL,
			`board_members` varchar(300) CHARACTER SET utf8 NOT NULL,
		    `key_investors` varchar(300) CHARACTER SET utf8 NOT NULL,
	    	`asset_price` varchar(300) CHARACTER SET utf8 NOT NULL,
			`mission_statements` varchar(300) CHARACTER SET utf8 NOT NULL,
			`awards` varchar(300) CHARACTER SET utf8 NOT NULL,
			`about` varchar(300) CHARACTER SET utf8 NOT NULL,

            PRIMARY KEY (`id`)
          ) $charset_collate; ";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
}

// run the install scripts upon plugin activation
register_activation_hook(__FILE__, 'ss_options_install');

//menu items

if ( is_admin() )   
{  
    add_action('admin_menu','ifm_company_modifymenu');
} 


function ifm_company_modifymenu() {

    add_options_page('My Plugin Settings', 'My Plugin', 'manage_options', 'my-plugin-settings', 'my_plugin_admin_page');  

	//this is the main item for the menu
	add_menu_page('company', //page title
	'company', //menu title
	'manage_options', //capabilities
	'ifm_company_list', //menu slug
	'ifm_company_list' //function
	);
	
	//this is a submenu
	add_submenu_page('ifm_company_list', //parent slug
	'Add New Company', //page title
	'Add New', //menu title
	'manage_options', //capability
	'ifm_company_create', //menu slug
	'ifm_company_create'); //function
	
	//this submenu is HIDDEN, however, we need to add it anyways
	add_submenu_page(null, //parent slug
	'Update company', //page title
	'Update', //menu title
	'manage_options', //capability
	'ifm_company_update', //menu slug
	'ifm_company_update'); //function
}
define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'company-list.php');
require_once(ROOTDIR . 'company-create.php');
require_once(ROOTDIR . 'company-update.php');






