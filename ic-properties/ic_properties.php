<?php
/**
 * Plugin Name: ic properties
 * Description: ic properties
 * Version: 1.0
 * Author: Himanshu
 * Text Domain: ic-properties
 * Domain Path: /languages/

 * Author URI: https://icreatewentech.com/
 */

register_activation_hook( __FILE__, 'myPluginCreateTable');
function myPluginCreateTable() {
    global $wpdb;

    $active_theme_path = get_stylesheet_directory();

    $plugin_path = plugin_dir_path( __FILE__ );

    if(!file_exists($active_theme_path . "/single-ic_properties.php")){
        copy($plugin_path.'single-ic_properties.php', $active_theme_path.'/single-ic_properties.php');
    }

    /*$content = "some text here";
    if(!file_exists($active_theme_path . "/single-ic_properties.php")){
        $fp = fopen($active_theme_path . "/single-ic_properties.php","wb");
        fwrite($fp,$content);
        fclose($fp);
    }*/

    /*$charset_collate = $wpdb->get_charset_collate();
    $table_name = $wpdb->prefix . 'ic_changelog';
    $sql = "CREATE TABLE `$table_name` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
          `action` varchar(255) NOT NULL,
          `user_id` varchar(255) DEFAULT NULL,
          `user_name` varchar(255) NOT NULL,
          `table_name` varchar(255) NOT NULL,
          `table_id` int(11) DEFAULT NULL,
          `data` longtext NOT NULL,
          `col_name` longtext NOT NULL,
          `change_id` int(11) NOT NULL,
          `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
        PRIMARY KEY(id)
        ) ENGINE=MyISAM DEFAULT CHARSET=latin1; ";

    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }*/
}

add_action('admin_menu','ic_properties');
function ic_properties() {

	/*add_menu_page('ic_properties', //page title
                    'IC Properties', //menu title
                    'manage_options', //capabilities
                    'properties_list', //menu slug
                    'properties_list', //function
                    'dashicons-building'); // icon*/

    /*add_submenu_page( null, 
                        'add_property',
                        'add_property',
                        'manage_options',
                        'add_property',
                        'add_property');*/

}

/*wp_enqueue_script( 'custom_js', plugin_dir_url( __FILE__ ) . 'js/custom.js' );
wp_enqueue_style( 'custom_css', plugin_dir_url( __FILE__ ) . 'css/custom.css' );*/

/*require_once('changelog_listing.php');
require_once('changelog_details.php');*/

function ic_custom_post_type() {
    register_post_type('ic_properties',
        array(
            'labels'      => array(
                'name'          => __( 'IC Properties', 'ic-properties' ),
                'singular_name' => __( 'ic_properties', 'ic-properties' ),
            ),
            'public'      => true,
            'has_archive' => true,
            'rewrite'     => array( 'slug' => 'ic_properties' ),
            'supports'    => array( 'title', 'editor', 'thumbnail' ),
        )
    );
}
add_action('init', 'ic_custom_post_type');

abstract class WPOrg_Meta_Box {


    /**
     * Set up and add the meta box.
     */
    public static function add() {
        $screens = [ 'ic_properties' ];
        foreach ( $screens as $screen ) {
            add_meta_box(
                'wporg_box_id_1',          // Unique ID
                'Listing Details', // Box title
                [ self::class, 'html1' ],   // Content callback, must be of type callable
                $screen                  // Post type
            );

            add_meta_box(
                'wporg_box_id_2',          // Unique ID
                'Listing Features', // Box title
                [ self::class, 'html2' ],   // Content callback, must be of type callable
                $screen                  // Post type
            );

            add_meta_box(
                'wporg_box_id_3',          // Unique ID
                'Additional Features', // Box title
                [ self::class, 'html3' ],   // Content callback, must be of type callable
                $screen                  // Post type
            );


            add_meta_box(
                'wporg_box_id_4',          // Unique ID
                'Gallery', // Box title
                [ self::class, 'html4' ],   // Content callback, must be of type callable
                $screen                  // Post type
            );
        }
    }

    /**
     * Save the meta box selections.
     *
     * @param int $post_id  The post ID.
     */
    public static function save( $post_id ) {
        if ( array_key_exists( 'ic_property_heading', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_heading', $_POST['ic_property_heading'] );
        }
        if ( array_key_exists( 'ic_property_status', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_status', $_POST['ic_property_status'] );
        }
        if ( array_key_exists( 'ic_property_category', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_category', $_POST['ic_property_category'] );
        }
        if ( array_key_exists( 'ic_property_list_date', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_list_date', $_POST['ic_property_list_date'] );
        }
        if ( array_key_exists( 'ic_property_unique_id', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_unique_id', $_POST['ic_property_unique_id'] );
        }
        if ( array_key_exists( 'ic_property_featured', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_featured', $_POST['ic_property_featured'] );
        }
        if ( array_key_exists( 'ic_property_price', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_price', $_POST['ic_property_price'] );
        }
        if ( array_key_exists( 'ic_property_bedrooms', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_bedrooms', $_POST['ic_property_bedrooms'] );
        }
        if ( array_key_exists( 'ic_property_bathrooms', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_bathrooms', $_POST['ic_property_bathrooms'] );
        }
        if ( array_key_exists( 'ic_property_toilet', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_toilet', $_POST['ic_property_toilet'] );
        }
        if ( array_key_exists( 'ic_property_ensuite', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_ensuite', $_POST['ic_property_ensuite'] );
        }
        if ( array_key_exists( 'ic_property_garage', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_garage', $_POST['ic_property_garage'] );
        }
        if ( array_key_exists( 'ic_property_carport', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_carport', $_POST['ic_property_carport'] );
        }
        if ( array_key_exists( 'ic_property_open_spaces', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_open_spaces', $_POST['ic_property_open_spaces'] );
        }
        if ( array_key_exists( 'ic_property_rooms', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_rooms', $_POST['ic_property_rooms'] );
        }
        if ( array_key_exists( 'ic_property_year_built', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_year_built', $_POST['ic_property_year_built'] );
        }
        if ( array_key_exists( 'ic_property_new_construction', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_new_construction', $_POST['ic_property_new_construction'] );
        }
        if ( array_key_exists( 'ic_property_air_conditioning', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_air_conditioning', $_POST['ic_property_air_conditioning'] );
        }
        if ( array_key_exists( 'ic_property_pool', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_pool', $_POST['ic_property_pool'] );
        }
        if ( array_key_exists( 'ic_property_security_system', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_security_system', $_POST['ic_property_security_system'] );
        }
        if ( array_key_exists( 'ic_property_land_area', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_land_area', $_POST['ic_property_land_area'] );
        }
        if ( array_key_exists( 'ic_property_land_area_unit', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_land_area_unit', $_POST['ic_property_land_area_unit'] );
        }
        if ( array_key_exists( 'ic_property_building_area', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_building_area', $_POST['ic_property_building_area'] );
        }
        if ( array_key_exists( 'ic_property_building_area_unit', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_building_area_unit', $_POST['ic_property_building_area_unit'] );
        }
        if ( array_key_exists( 'ic_property_energy_rating', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_energy_rating', $_POST['ic_property_energy_rating'] );
        }
        if ( array_key_exists( 'ic_property_land_fully_fenced', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_land_fully_fenced', $_POST['ic_property_land_fully_fenced'] );
        }
        if ( array_key_exists( 'ic_property_broadband', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_broadband', $_POST['ic_property_broadband'] );
        }
        if ( array_key_exists( 'ic_property_built_in_robes', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_built_in_robes', $_POST['ic_property_built_in_robes'] );
        }
        if ( array_key_exists( 'ic_property_dishwasher', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_dishwasher', $_POST['ic_property_dishwasher'] );
        }
        if ( array_key_exists( 'ic_property_floor_boards', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_floor_boards', $_POST['ic_property_floor_boards'] );
        }
        if ( array_key_exists( 'ic_property_gym', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_gym', $_POST['ic_property_gym'] );
        }
        if ( array_key_exists( 'ic_property_intercom', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_intercom', $_POST['ic_property_intercom'] );
        }
        if ( array_key_exists( 'ic_property_pay_tv', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_pay_tv', $_POST['ic_property_pay_tv'] );
        }
        if ( array_key_exists( 'ic_property_remote_garage', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_remote_garage', $_POST['ic_property_remote_garage'] );
        }
        if ( array_key_exists( 'ic_property_rumpus_room', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_rumpus_room', $_POST['ic_property_rumpus_room'] );
        }
        if ( array_key_exists( 'ic_property_secure_parking', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_secure_parking', $_POST['ic_property_secure_parking'] );
        }
        if ( array_key_exists( 'ic_property_spa', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_spa', $_POST['ic_property_spa'] );
        }
        if ( array_key_exists( 'ic_property_study', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_study', $_POST['ic_property_study'] );
        }
        if ( array_key_exists( 'ic_property_vacuum_system', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_vacuum_system', $_POST['ic_property_vacuum_system'] );
        }
        if ( array_key_exists( 'ic_property_workshop', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_workshop', $_POST['ic_property_workshop'] );
        }
        if ( array_key_exists( 'ic_property_balcony', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_balcony', $_POST['ic_property_balcony'] );
        }
        if ( array_key_exists( 'ic_property_courtyard', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_courtyard', $_POST['ic_property_courtyard'] );
        }
        if ( array_key_exists( 'ic_property_deck', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_deck', $_POST['ic_property_deck'] );
        }
        if ( array_key_exists( 'ic_property_outdoor_entertaining', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_outdoor_entertaining', $_POST['ic_property_outdoor_entertaining'] );
        }
        if ( array_key_exists( 'ic_property_shed', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_shed', $_POST['ic_property_shed'] );
        }
        if ( array_key_exists( 'ic_property_tennis_court', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_tennis_court', $_POST['ic_property_tennis_court'] );
        }
        if ( array_key_exists( 'ic_property_ducted_cooling', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_ducted_cooling', $_POST['ic_property_ducted_cooling'] );
        }
        if ( array_key_exists( 'ic_property_ducted_heating', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_ducted_heating', $_POST['ic_property_ducted_heating'] );
        }
        if ( array_key_exists( 'ic_property_evaporative_cooling', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_evaporative_cooling', $_POST['ic_property_evaporative_cooling'] );
        }
        if ( array_key_exists( 'ic_property_gas_heating', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_gas_heating', $_POST['ic_property_gas_heating'] );
        }
        if ( array_key_exists( 'ic_property_hydronic_heating', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_hydronic_heating', $_POST['ic_property_hydronic_heating'] );
        }
        if ( array_key_exists( 'ic_property_open_fire_place', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_open_fire_place', $_POST['ic_property_open_fire_place'] );
        }
        if ( array_key_exists( 'ic_property_reverse_cycle_aircon', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_reverse_cycle_aircon', $_POST['ic_property_reverse_cycle_aircon'] );
        }
        if ( array_key_exists( 'ic_property_split_system_aircon', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_split_system_aircon', $_POST['ic_property_split_system_aircon'] );
        }
        if ( array_key_exists( 'ic_property_split_system_heating', $_POST ) ) {
            update_post_meta( $post_id, 'ic_property_split_system_heating', $_POST['ic_property_split_system_heating'] );
        }
        if ( array_key_exists( 'ic_images_input', $_POST ) ) {
            update_post_meta( $post_id, 'ic_images_input', $_POST['ic_images_input'] );
        }
    }


    /**
     * Display the meta box HTML to the user.
     *
     * @param WP_Post $post   Post object.
     */
    public static function html1( $post ) {
        $ic_property_heading = get_post_meta( $post->ID, 'ic_property_heading', true );
        $ic_property_status = get_post_meta( $post->ID, 'ic_property_status', true );
        $ic_property_category = get_post_meta( $post->ID, 'ic_property_category', true );
        $ic_property_list_date = get_post_meta( $post->ID, 'ic_property_list_date', true );
        $ic_property_unique_id = get_post_meta( $post->ID, 'ic_property_unique_id', true );
        $ic_property_featured = get_post_meta( $post->ID, 'ic_property_featured', true );
        $ic_property_price = get_post_meta( $post->ID, 'ic_property_price', true );
        
        ?>
        <h3>Listing Details</h3>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_heading">Property Heading</label>
            </span>
        </div>
        <div class="form-field">
            <input type="text" name="ic_property_heading" id="ic_property_heading" value="<?php echo $ic_property_heading; ?>">
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_price">Property Price</label>
            </span>
        </div>
        <div class="form-field">
            <input type="number" name="ic_property_price" id="ic_property_price" value="<?php echo $ic_property_price; ?>">
        </div>
        <h3>Listing Type</h3>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_status">Property Status</label>
            </span>
        </div>
        <div class="form-field">
            <select name="ic_property_status" id="ic_property_status" class="postbox">
                <option value="current" <?php selected( $ic_property_status, 'current' ); ?>>Current</option>
                <option value="withdrawn" <?php selected( $ic_property_status, 'withdrawn' ); ?>>Withdrawn</option>
                <option value="offmarket" <?php selected( $ic_property_status, 'offmarket' ); ?>>Off Market</option>
                <option value="sold" <?php selected( $ic_property_status, 'sold' ); ?>>Sold</option>
            </select>
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_category">House Category</label>
            </span>
        </div>
        <div class="form-field">
            <select name="ic_property_category" id="ic_property_category" class="postbox">
                <option value="House" <?php selected( $ic_property_category, 'House' ); ?>>House</option>
                <option value="Unit" <?php selected( $ic_property_category, 'Unit' ); ?>>Unit</option>
                <option value="Townhouse" <?php selected( $ic_property_category, 'Townhouse' ); ?>>Townhouse</option>
                <option value="Villa" <?php selected( $ic_property_category, 'Villa' ); ?>>Villa</option>
                <option value="Apartment" <?php selected( $ic_property_category, 'Apartment' ); ?>>Apartment</option>
                <option value="Flat" <?php selected( $ic_property_category, 'Flat' ); ?>>Flat</option>
                <option value="Studio" <?php selected( $ic_property_category, 'Studio' ); ?>>Studio</option>
                <option value="Warehouse" <?php selected( $ic_property_category, 'Warehouse' ); ?>>Warehouse</option>
                <option value="DuplexSemi-detached" <?php selected( $ic_property_category, 'DuplexSemi-detached' ); ?>>Duplex Semi-detached</option>
                <option value="Alpine" <?php selected( $ic_property_category, 'Alpine' ); ?>>Alpine</option>
                <option value="AcreageSemi-rural" <?php selected( $ic_property_category, 'AcreageSemi-rural' ); ?>>Acreage Semi-rural</option>
                <option value="Retirement" <?php selected( $ic_property_category, 'Retirement' ); ?>>Retirement</option>
                <option value="BlockOfUnits" <?php selected( $ic_property_category, 'BlockOfUnits' ); ?>>Block Of Units</option>
                <option value="Terrace" <?php selected( $ic_property_category, 'Terrace' ); ?>>Terrace</option>
                <option value="ServicedApartment" <?php selected( $ic_property_category, 'ServicedApartment' ); ?>>Serviced Apartment</option>
                <option value="Other" <?php selected( $ic_property_category, 'Other' ); ?>>Other</option>
            </select>
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_list_date">Date Listed</label>
            </span>
        </div>
        <div class="form-field">
            <input type="date" name="ic_property_list_date" id="ic_property_list_date" value="<?php echo $ic_property_list_date; ?>">
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_unique_id">Unique ID</label>
            </span>
        </div>
        <div class="form-field">
            <input type="text" name="ic_property_unique_id" id="ic_property_unique_id" value="<?php echo $ic_property_unique_id; ?>">
        </div>
        <div class="form-field">
            <input type="checkbox" name="ic_property_featured" id="ic_property_featured_yes" value="yes" <?php if($ic_property_featured){ echo 'checked'; } ?>>
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_featured_yes">Featured Listing</label>
            </span>
        </div>
        <?php
    }
    public static function html2( $post ) {
        $ic_property_bedrooms = get_post_meta( $post->ID, 'ic_property_bedrooms', true );
        $ic_property_bathrooms = get_post_meta( $post->ID, 'ic_property_bathrooms', true );
        $ic_property_toilet = get_post_meta( $post->ID, 'ic_property_toilet', true );
        $ic_property_ensuite = get_post_meta( $post->ID, 'ic_property_ensuite', true );
        $ic_property_garage = get_post_meta( $post->ID, 'ic_property_garage', true );
        $ic_property_carport = get_post_meta( $post->ID, 'ic_property_carport', true );
        $ic_property_open_spaces = get_post_meta( $post->ID, 'ic_property_open_spaces', true );
        $ic_property_rooms = get_post_meta( $post->ID, 'ic_property_rooms', true );
        $ic_property_year_built = get_post_meta( $post->ID, 'ic_property_year_built', true );
        $ic_property_new_construction = get_post_meta( $post->ID, 'ic_property_new_construction', true );
        $ic_property_air_conditioning = get_post_meta( $post->ID, 'ic_property_air_conditioning', true );
        $ic_property_pool = get_post_meta( $post->ID, 'ic_property_pool', true );
        $ic_property_security_system = get_post_meta( $post->ID, 'ic_property_security_system', true );
        $ic_property_land_area = get_post_meta( $post->ID, 'ic_property_land_area', true );
        $ic_property_land_area_unit = get_post_meta( $post->ID, 'ic_property_land_area_unit', true );
        $ic_property_building_area = get_post_meta( $post->ID, 'ic_property_building_area', true );
        $ic_property_building_area_unit = get_post_meta( $post->ID, 'ic_property_building_area_unit', true );
        $ic_property_energy_rating = get_post_meta( $post->ID, 'ic_property_energy_rating', true );
        $ic_property_land_fully_fenced = get_post_meta( $post->ID, 'ic_property_land_fully_fenced', true );

        ?>
        <h3>House Features</h3>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_bedrooms">Bedrooms</label>
            </span>
        </div>
        <div class="form-field">
            <input type="number" name="ic_property_bedrooms" id="ic_property_bedrooms" value="<?php echo $ic_property_bedrooms; ?>">
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_bathrooms">Bedrooms</label>
            </span>
        </div>
        <div class="form-field">
            <input type="number" name="ic_property_bathrooms" id="ic_property_bathrooms" value="<?php echo $ic_property_bathrooms; ?>">
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_toilet">Toilet</label>
            </span>
        </div>
        <div class="form-field">
            <input type="number" name="ic_property_toilet" id="ic_property_toilet" value="<?php echo $ic_property_toilet; ?>">
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_ensuite">Toilet</label>
            </span>
        </div>
        <div class="form-field">
            <input type="number" name="ic_property_ensuite" id="ic_property_ensuite" value="<?php echo $ic_property_ensuite; ?>">
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_garage">Garage</label>
            </span>
        </div>
        <div class="form-field">
            <input type="number" name="ic_property_garage" id="ic_property_garage" value="<?php echo $ic_property_garage; ?>">
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_carport">Carport</label>
            </span>
        </div>
        <div class="form-field">
            <input type="number" name="ic_property_carport" id="ic_property_carport" value="<?php echo $ic_property_carport; ?>">
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_open_spaces">Open Parking Spaces</label>
            </span>
        </div>
        <div class="form-field">
            <input type="number" name="ic_property_open_spaces" id="ic_property_open_spaces" value="<?php echo $ic_property_open_spaces; ?>">
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_rooms">Rooms</label>
            </span>
        </div>
        <div class="form-field">
            <input type="number" name="ic_property_rooms" id="ic_property_rooms" value="<?php echo $ic_property_rooms; ?>">
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_year_built">Year Built</label>
            </span>
        </div>
        <div class="form-field">
            <input type="number" name="ic_property_year_built" id="ic_property_year_built" value="<?php echo $ic_property_year_built; ?>">
        </div>
        <div class="form-field">
            <input type="checkbox" name="ic_property_new_construction" id="ic_property_new_construction_yes" value="yes" <?php if($ic_property_new_construction){ echo 'checked'; } ?>>
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_new_construction_yes">New Construction</label>
            </span>
        </div>
        <div class="form-field">
            <input type="checkbox" name="ic_property_air_conditioning" id="ic_property_air_conditioning_yes" value="yes" <?php if($ic_property_air_conditioning){ echo 'checked'; } ?>>
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_air_conditioning_yes">Air Conditioning</label>
            </span>
        </div>
        <div class="form-field">
            <input type="checkbox" name="ic_property_pool" id="ic_property_pool_yes" value="yes" <?php if($ic_property_pool){ echo 'checked'; } ?>>
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_pool_yes">Pool</label>
            </span>
        </div>
        <div class="form-field">
            <input type="checkbox" name="ic_property_security_system" id="ic_property_security_system_yes" value="yes" <?php if($ic_property_security_system){ echo 'checked'; } ?>>
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_security_system_yes">Security System</label>
            </span>
        </div>
        <h3>Land Details</h3>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_land_area">Land Area</label>
            </span>
        </div>
        <div class="form-field">
            <input type="number" name="ic_property_land_area" id="ic_property_land_area" value="<?php echo $ic_property_land_area; ?>">
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_land_area_unit">Land Unit</label>
            </span>
        </div>
        <div class="form-field">
            <select name="ic_property_land_area_unit" id="ic_property_land_area_unit" class="postbox">
                <option value="square" <?php selected( $ic_property_land_area_unit, 'square' ); ?>>Square</option>
                <option value="squareMeter" <?php selected( $ic_property_land_area_unit, 'squareMeter' ); ?>>Square Meter</option>
                <option value="acre" <?php selected( $ic_property_land_area_unit, 'acre' ); ?>>Acre</option>
                <option value="hectare" <?php selected( $ic_property_land_area_unit, 'hectare' ); ?>>Hectare</option>
                <option value="sqft" <?php selected( $ic_property_land_area_unit, 'sqft' ); ?>>Square Feet</option>
            </select>
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_building_area">Building Area</label>
            </span>
        </div>
        <div class="form-field">
            <input type="number" name="ic_property_building_area" id="ic_property_building_area" value="<?php echo $ic_property_building_area; ?>">
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_building_area_unit">Building Unit</label>
            </span>
        </div>
        <div class="form-field">
            <select name="ic_property_building_area_unit" id="ic_property_building_area_unit" class="postbox">
                <option value="square" <?php selected( $ic_property_building_area_unit, 'square' ); ?>>Square</option>
                <option value="squareMeter" <?php selected( $ic_property_building_area_unit, 'squareMeter' ); ?>>Square Meter</option>
                <option value="acre" <?php selected( $ic_property_building_area_unit, 'acre' ); ?>>Acre</option>
                <option value="hectare" <?php selected( $ic_property_building_area_unit, 'hectare' ); ?>>Hectare</option>
                <option value="sqft" <?php selected( $ic_property_building_area_unit, 'sqft' ); ?>>Square Feet</option>
            </select>
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_energy_rating">Energy Rating</label>
            </span>
        </div>
        <div class="form-field">
            <input type="number" name="ic_property_energy_rating" id="ic_property_energy_rating" value="<?php echo $ic_property_energy_rating; ?>">
        </div>
        <div class="form-field">
            <input type="checkbox" name="ic_property_land_fully_fenced" id="ic_property_land_fully_fenced_yes" value="yes" <?php if($ic_property_land_fully_fenced){ echo 'checked'; } ?>>
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_land_fully_fenced_yes">Fully Fenced</label>
            </span>
        </div>
        <?php
    }
    public static function html3( $post ) { 
        $ic_property_broadband = get_post_meta( $post->ID, 'ic_property_broadband', true );
        $ic_property_built_in_robes = get_post_meta( $post->ID, 'ic_property_built_in_robes', true );
        $ic_property_dishwasher = get_post_meta( $post->ID, 'ic_property_dishwasher', true );
        $ic_property_floor_boards = get_post_meta( $post->ID, 'ic_property_floor_boards', true );
        $ic_property_gym = get_post_meta( $post->ID, 'ic_property_gym', true );
        $ic_property_intercom = get_post_meta( $post->ID, 'ic_property_intercom', true );
        $ic_property_pay_tv = get_post_meta( $post->ID, 'ic_property_pay_tv', true );
        $ic_property_remote_garage = get_post_meta( $post->ID, 'ic_property_remote_garage', true );
        $ic_property_rumpus_room = get_post_meta( $post->ID, 'ic_property_rumpus_room', true );
        $ic_property_secure_parking = get_post_meta( $post->ID, 'ic_property_secure_parking', true );
        $ic_property_spa = get_post_meta( $post->ID, 'ic_property_spa', true );
        $ic_property_study = get_post_meta( $post->ID, 'ic_property_study', true );
        $ic_property_vacuum_system = get_post_meta( $post->ID, 'ic_property_vacuum_system', true );
        $ic_property_workshop = get_post_meta( $post->ID, 'ic_property_workshop', true );
        $ic_property_balcony = get_post_meta( $post->ID, 'ic_property_balcony', true );
        $ic_property_courtyard = get_post_meta( $post->ID, 'ic_property_courtyard', true );
        $ic_property_deck = get_post_meta( $post->ID, 'ic_property_deck', true );
        $ic_property_outdoor_entertaining = get_post_meta( $post->ID, 'ic_property_outdoor_entertaining', true );
        $ic_property_shed = get_post_meta( $post->ID, 'ic_property_shed', true );
        $ic_property_tennis_court = get_post_meta( $post->ID, 'ic_property_tennis_court', true );
        $ic_property_ducted_cooling = get_post_meta( $post->ID, 'ic_property_ducted_cooling', true );
        $ic_property_ducted_heating = get_post_meta( $post->ID, 'ic_property_ducted_heating', true );
        $ic_property_evaporative_cooling = get_post_meta( $post->ID, 'ic_property_evaporative_cooling', true );
        $ic_property_gas_heating = get_post_meta( $post->ID, 'ic_property_gas_heating', true );
        $ic_property_hydronic_heating = get_post_meta( $post->ID, 'ic_property_hydronic_heating', true );
        $ic_property_open_fire_place = get_post_meta( $post->ID, 'ic_property_open_fire_place', true );
        $ic_property_reverse_cycle_aircon = get_post_meta( $post->ID, 'ic_property_reverse_cycle_aircon', true );
        $ic_property_split_system_aircon = get_post_meta( $post->ID, 'ic_property_split_system_aircon', true );
        $ic_property_split_system_heating = get_post_meta( $post->ID, 'ic_property_split_system_heating', true );
        ?>
        <h3>Internal</h3>
        <div class="form-field">
            <input type="checkbox" name="ic_property_broadband" id="ic_property_broadband_yes" value="yes" <?php if($ic_property_broadband){ echo 'checked'; } ?>>
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_broadband_yes">Broadband</label>
            </span>
        </div>
        <div class="form-field">
            <input type="checkbox" name="ic_property_built_in_robes" id="ic_property_built_in_robes_yes" value="yes" <?php if($ic_property_built_in_robes){ echo 'checked'; } ?>>
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_built_in_robes_yes">Built In Robes</label>
            </span>
        </div>
        <div class="form-field">
            <input type="checkbox" name="ic_property_dishwasher" id="ic_property_dishwasher_yes" value="yes" <?php if($ic_property_dishwasher){ echo 'checked'; } ?>>
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_dishwasher_yes">Dishwasher</label>
            </span>
        </div>
        <div class="form-field">
            <input type="checkbox" name="ic_property_floor_boards" id="ic_property_floor_boards_yes" value="yes" <?php if($ic_property_floor_boards){ echo 'checked'; } ?>>
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_floor_boards_yes">Floor Boards</label>
            </span>
        </div>
        <div class="form-field">
            <input type="checkbox" name="ic_property_gym" id="ic_property_gym_yes" value="yes" <?php if($ic_property_gym){ echo 'checked'; } ?>>
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_gym_yes">Gym</label>
            </span>
        </div>
        <div class="form-field">
            <input type="checkbox" name="ic_property_intercom" id="ic_property_intercom_yes" value="yes" <?php if($ic_property_intercom){ echo 'checked'; } ?>>
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_intercom_yes">Intercom</label>
            </span>
        </div>
        <div class="form-field">
            <input type="checkbox" name="ic_property_pay_tv" id="ic_property_pay_tv_yes" value="yes" <?php if($ic_property_pay_tv){ echo 'checked'; } ?>>
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_pay_tv_yes">Pay TV</label>
            </span>
        </div>
        <div class="form-field">
            <input type="checkbox" name="ic_property_remote_garage" id="ic_property_remote_garage_yes" value="yes" <?php if($ic_property_remote_garage){ echo 'checked'; } ?>>
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_remote_garage_yes">Remote Garage</label>
            </span>
        </div>
        <div class="form-field">
            <input type="checkbox" name="ic_property_rumpus_room" id="ic_property_rumpus_room_yes" value="yes" <?php if($ic_property_rumpus_room){ echo 'checked'; } ?>>
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_rumpus_room_yes">Rumpus Room</label>
            </span>
        </div>
        <div class="form-field">
            <input type="checkbox" name="ic_property_secure_parking" id="ic_property_secure_parking_yes" value="yes" <?php if($ic_property_secure_parking){ echo 'checked'; } ?>>
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_secure_parking_yes">Secure Parking</label>
            </span>
        </div>
        <div class="form-field">
            <input type="checkbox" name="ic_property_spa" id="ic_property_spa_yes" value="yes" <?php if($ic_property_spa){ echo 'checked'; } ?>>
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_spa_yes">Spa</label>
            </span>
        </div>
        <div class="form-field">
            <input type="checkbox" name="ic_property_study" id="ic_property_study_yes" value="yes" <?php if($ic_property_study){ echo 'checked'; } ?>>
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_study_yes">Study</label>
            </span>
        </div>
        <div class="form-field">
            <input type="checkbox" name="ic_property_vacuum_system" id="ic_property_vacuum_system_yes" value="yes" <?php if($ic_property_vacuum_system){ echo 'checked'; } ?>>
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_vacuum_system_yes">Vacuum System</label>
            </span>
        </div>
        <div class="form-field">
            <input type="checkbox" name="ic_property_workshop" id="ic_property_workshop_yes" value="yes" <?php if($ic_property_workshop){ echo 'checked'; } ?>>
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_workshop_yes">Workshop</label>
            </span>
        </div>
        <h3>External</h3>
        <div class="form-field">
            <input type="checkbox" name="ic_property_balcony" id="ic_property_balcony_yes" value="yes" <?php if($ic_property_balcony){ echo 'checked'; } ?>>
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_balcony_yes">Balcony</label>
            </span>
        </div>
        <div class="form-field">
            <input type="checkbox" name="ic_property_courtyard" id="ic_property_courtyard_yes" value="yes" <?php if($ic_property_courtyard){ echo 'checked'; } ?>>
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_courtyard_yes">Courtyard</label>
            </span>
        </div>
        <div class="form-field">
            <input type="checkbox" name="ic_property_deck" id="ic_property_deck_yes" value="yes" <?php if($ic_property_deck){ echo 'checked'; } ?>>
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_deck_yes">Deck</label>
            </span>
        </div>
        <div class="form-field">
            <input type="checkbox" name="ic_property_outdoor_entertaining" id="ic_property_outdoor_entertaining_yes" value="yes" <?php if($ic_property_outdoor_entertaining){ echo 'checked'; } ?>>
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_outdoor_entertaining_yes">Outdoor Entertaining</label>
            </span>
        </div>
        <div class="form-field">
            <input type="checkbox" name="ic_property_shed" id="ic_property_shed_yes" value="yes" <?php if($ic_property_shed){ echo 'checked'; } ?>>
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_shed_yes">Shed</label>
            </span>
        </div>
        <div class="form-field">
            <input type="checkbox" name="ic_property_tennis_court" id="ic_property_tennis_court_yes" value="yes" <?php if($ic_property_tennis_court){ echo 'checked'; } ?>>
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_tennis_court_yes">Tennis Court</label>
            </span>
        </div>
        <h3>Heating & Cooling</h3>
        <div class="form-field">
            <input type="checkbox" name="ic_property_ducted_cooling" id="ic_property_ducted_cooling_yes" value="yes" <?php if($ic_property_ducted_cooling){ echo 'checked'; } ?>>
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_ducted_cooling_yes">Ducted Cooling</label>
            </span>
        </div>
        <div class="form-field">
            <input type="checkbox" name="ic_property_ducted_heating" id="ic_property_ducted_heating_yes" value="yes" <?php if($ic_property_ducted_heating){ echo 'checked'; } ?>>
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_ducted_heating_yes">Ducted Heating</label>
            </span>
        </div>
        <div class="form-field">
            <input type="checkbox" name="ic_property_evaporative_cooling" id="ic_property_evaporative_cooling_yes" value="yes" <?php if($ic_property_evaporative_cooling){ echo 'checked'; } ?>>
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_evaporative_cooling_yes">Evaporative Cooling</label>
            </span>
        </div>
        <div class="form-field">
            <input type="checkbox" name="ic_property_gas_heating" id="ic_property_gas_heating_yes" value="yes" <?php if($ic_property_gas_heating){ echo 'checked'; } ?>>
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_gas_heating_yes">Gas Heating</label>
            </span>
        </div>
        <div class="form-field">
            <input type="checkbox" name="ic_property_hydronic_heating" id="ic_property_hydronic_heating_yes" value="yes" <?php if($ic_property_hydronic_heating){ echo 'checked'; } ?>>
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_hydronic_heating_yes">Hydronic Heating</label>
            </span>
        </div>
        <div class="form-field">
            <input type="checkbox" name="ic_property_open_fire_place" id="ic_property_open_fire_place_yes" value="yes" <?php if($ic_property_open_fire_place){ echo 'checked'; } ?>>
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_open_fire_place_yes">Open Fire Place</label>
            </span>
        </div>
        <div class="form-field">
            <input type="checkbox" name="ic_property_reverse_cycle_aircon" id="ic_property_reverse_cycle_aircon_yes" value="yes" <?php if($ic_property_reverse_cycle_aircon){ echo 'checked'; } ?>>
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_reverse_cycle_aircon_yes">Reverse Cycle Aircon</label>
            </span>
        </div>
        <div class="form-field">
            <input type="checkbox" name="ic_property_split_system_aircon" id="ic_property_split_system_aircon_yes" value="yes" <?php if($ic_property_split_system_aircon){ echo 'checked'; } ?>>
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_split_system_aircon_yes">Split System Aircon</label>
            </span>
        </div>
        <div class="form-field">
            <input type="checkbox" name="ic_property_split_system_heating" id="ic_property_split_system_heating_yes" value="yes" <?php if($ic_property_split_system_heating){ echo 'checked'; } ?>>
        </div>
        <div class="form-field">
            <span valign="top" scope="row">
                <label for="ic_property_split_system_heating_yes">Split System Heating</label>
            </span>
        </div>
        <?php
    }
    public static function html4( $post ) {
        $ic_images_input = get_post_meta( $post->ID, 'ic_images_input', true );
        ?>
        <style type="text/css">
            /*.image-list { width: 100%; height: 150px; background-position: center; background-size: cover; background-repeat: no-repeat; -webkit-box-shadow: inset 0 0 15px rgba(0, 0, 0, .1), inset 0 0 0 1px rgba(0, 0, 0, .05); box-shadow: inset 0 0 15px rgba(0, 0, 0, .1), inset 0 0 0 1px rgba(0, 0, 0, .05); background: #eee; cursor: pointer; vertical-align: middle; display: flex; justify-content: center; align-items: center; overflow: hidden; position: relative; }
            .image-list:before { content: ''; position: absolute; display: none; top: 0px; right: 0px; left: 0px; bottom: 0px; box-shadow: inset 0 0 0 1px #fff, inset 0 0 0 5px #c60c31; }
            .image-list:hover:before { display: block; }*/
            ul.images{
                display: flex;
            }
            .image-list img {
                width: 100%;
                height: 150px;
                cursor: pointer;
            }
        </style>
        <div>
            <ul class='images'></ul>
        </div>
        <div class='actions'>
            <a class="button-secondary upload">Add</a>
        </div>
        <input class="wp-editor-area" id="images-input" name="ic_images_input" type="hidden" value="<?php echo $ic_images_input; ?>">
        <?php
    }


}

add_action( 'add_meta_boxes', [ 'WPOrg_Meta_Box', 'add' ] );
add_action( 'save_post', [ 'WPOrg_Meta_Box', 'save' ] );


function ic_myuploadscript() {
    if ( ! did_action( 'wp_enqueue_media' ) ) { wp_enqueue_media(); }
    $dir_url = plugin_dir_url( __FILE__ );
    wp_enqueue_script( 'myuploadscript', $dir_url . '/customscript.js', array('jquery'), null, false );
}
add_action( 'admin_enqueue_scripts', 'ic_myuploadscript' );



function property_listing() { 
    global $wpdb;

    $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

    $property_list = get_posts([
        'post_type' => 'ic_properties',
        'post_status' => 'publish',
        'posts_per_page' => '12',
        'order'    => 'DESC',
        'paged' => $paged
    ]);

    $property_count = wp_count_posts($type = 'ic_properties');

    ?>
    <div class="property_wrap" style="display: flex; gap: 20px;">
        <?php foreach ($property_list as $key => $value) { ?>
            <?php
            $ic_property_price = get_post_meta( $value->ID, $key = 'ic_property_price', $single = true );
            $property_thumb = get_the_post_thumbnail_url( $post = $value->ID, $size = 'post-thumbnail' );
            ?>
            <div class="ic_property_details">
                <div class="ic_property_images">
                    <img src="<?php echo $property_thumb; ?>" style="height: 320px;">
                </div>
                <div class="ic_property_heading_price">
                    <a href="<?php echo get_permalink($value->ID); ?>">
                        <h3><?php echo $value->post_title; ?></h3>
                    </a>
                    <p><?php echo $ic_property_price; ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
    <?php

    $big = 999999999;

    if($property_count->publish > 12){
        echo paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $property_count->publish
        ) );
    }
}
add_shortcode('property_listing', 'property_listing');