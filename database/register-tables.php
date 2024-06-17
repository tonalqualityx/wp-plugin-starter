<?php defined( 'ABSPATH' ) or die( 'Sectumsempra!' );//For enemies

/* Use this as a sample to get you started.
 * 
 * Please remove it when you no longer need it!
*/

function check_ind_version() {
    $ind_version = get_option('ind_version');
    
    if (!$ind_version || version_compare($ind_version, '1.0.0', '<')) {
        global $wpdb;
        
        $table_name = $wpdb->prefix . 'sample_table';
        $charset_collate = $wpdb->get_charset_collate();
        
        $sql = "CREATE TABLE $table_name (
            ID bigint(20) unsigned NOT NULL AUTO_INCREMENT,
            name text NOT NULL,
            content longtext NOT NULL,
            PRIMARY KEY  (ID)
        ) $charset_collate;";
        
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
        
        update_option('ind_version', '1.0.0');
    }
}

register_activation_hook( INDPL_PLUGIN, 'check_ind_version');
