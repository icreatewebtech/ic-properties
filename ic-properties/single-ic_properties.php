<?php get_header(); ?>
<?php
    $post_Data = get_post(get_the_id());
    $thumb = get_the_post_thumbnail_url( get_the_id(), $size = 'full' );

    $ic_property_heading = get_post_meta( get_the_id(), 'ic_property_heading', true );
    $ic_property_status = get_post_meta( get_the_id(), 'ic_property_status', true );
    $ic_property_category = get_post_meta( get_the_id(), 'ic_property_category', true );
    $ic_property_list_date = get_post_meta( get_the_id(), 'ic_property_list_date', true );
    $ic_property_unique_id = get_post_meta( get_the_id(), 'ic_property_unique_id', true );
    $ic_property_featured = get_post_meta( get_the_id(), 'ic_property_featured', true );
    $ic_property_price = get_post_meta( get_the_id(), 'ic_property_price', true );
    $ic_property_bedrooms = get_post_meta( get_the_id(), 'ic_property_bedrooms', true );
    $ic_property_bathrooms = get_post_meta( get_the_id(), 'ic_property_bathrooms', true );
    $ic_property_toilet = get_post_meta( get_the_id(), 'ic_property_toilet', true );
    $ic_property_ensuite = get_post_meta( get_the_id(), 'ic_property_ensuite', true );
    $ic_property_garage = get_post_meta( get_the_id(), 'ic_property_garage', true );
    $ic_property_carport = get_post_meta( get_the_id(), 'ic_property_carport', true );
    $ic_property_open_spaces = get_post_meta( get_the_id(), 'ic_property_open_spaces', true );
    $ic_property_rooms = get_post_meta( get_the_id(), 'ic_property_rooms', true );
    $ic_property_year_built = get_post_meta( get_the_id(), 'ic_property_year_built', true );
    $ic_property_new_construction = get_post_meta( get_the_id(), 'ic_property_new_construction', true );
    $ic_property_air_conditioning = get_post_meta( get_the_id(), 'ic_property_air_conditioning', true );
    $ic_property_pool = get_post_meta( get_the_id(), 'ic_property_pool', true );
    $ic_property_security_system = get_post_meta( get_the_id(), 'ic_property_security_system', true );
    $ic_property_land_area = get_post_meta( get_the_id(), 'ic_property_land_area', true );
    $ic_property_land_area_unit = get_post_meta( get_the_id(), 'ic_property_land_area_unit', true );
    $ic_property_building_area = get_post_meta( get_the_id(), 'ic_property_building_area', true );
    $ic_property_building_area_unit = get_post_meta( get_the_id(), 'ic_property_building_area_unit', true );
    $ic_property_energy_rating = get_post_meta( get_the_id(), 'ic_property_energy_rating', true );
    $ic_property_land_fully_fenced = get_post_meta( get_the_id(), 'ic_property_land_fully_fenced', true );
    $ic_property_broadband = get_post_meta( get_the_id(), 'ic_property_broadband', true );
    $ic_property_built_in_robes = get_post_meta( get_the_id(), 'ic_property_built_in_robes', true );
    $ic_property_dishwasher = get_post_meta( get_the_id(), 'ic_property_dishwasher', true );
    $ic_property_floor_boards = get_post_meta( get_the_id(), 'ic_property_floor_boards', true );
    $ic_property_gym = get_post_meta( get_the_id(), 'ic_property_gym', true );
    $ic_property_intercom = get_post_meta( get_the_id(), 'ic_property_intercom', true );
    $ic_property_pay_tv = get_post_meta( get_the_id(), 'ic_property_pay_tv', true );
    $ic_property_remote_garage = get_post_meta( get_the_id(), 'ic_property_remote_garage', true );
    $ic_property_rumpus_room = get_post_meta( get_the_id(), 'ic_property_rumpus_room', true );
    $ic_property_secure_parking = get_post_meta( get_the_id(), 'ic_property_secure_parking', true );
    $ic_property_spa = get_post_meta( get_the_id(), 'ic_property_spa', true );
    $ic_property_study = get_post_meta( get_the_id(), 'ic_property_study', true );
    $ic_property_vacuum_system = get_post_meta( get_the_id(), 'ic_property_vacuum_system', true );
    $ic_property_workshop = get_post_meta( get_the_id(), 'ic_property_workshop', true );
    $ic_property_balcony = get_post_meta( get_the_id(), 'ic_property_balcony', true );
    $ic_property_courtyard = get_post_meta( get_the_id(), 'ic_property_courtyard', true );
    $ic_property_deck = get_post_meta( get_the_id(), 'ic_property_deck', true );
    $ic_property_outdoor_entertaining = get_post_meta( get_the_id(), 'ic_property_outdoor_entertaining', true );
    $ic_property_shed = get_post_meta( get_the_id(), 'ic_property_shed', true );
    $ic_property_tennis_court = get_post_meta( get_the_id(), 'ic_property_tennis_court', true );
    $ic_property_ducted_cooling = get_post_meta( get_the_id(), 'ic_property_ducted_cooling', true );
    $ic_property_ducted_heating = get_post_meta( get_the_id(), 'ic_property_ducted_heating', true );
    $ic_property_evaporative_cooling = get_post_meta( get_the_id(), 'ic_property_evaporative_cooling', true );
    $ic_property_gas_heating = get_post_meta( get_the_id(), 'ic_property_gas_heating', true );
    $ic_property_hydronic_heating = get_post_meta( get_the_id(), 'ic_property_hydronic_heating', true );
    $ic_property_open_fire_place = get_post_meta( get_the_id(), 'ic_property_open_fire_place', true );
    $ic_property_reverse_cycle_aircon = get_post_meta( get_the_id(), 'ic_property_reverse_cycle_aircon', true );
    $ic_property_split_system_aircon = get_post_meta( get_the_id(), 'ic_property_split_system_aircon', true );
    $ic_property_split_system_heating = get_post_meta( get_the_id(), 'ic_property_split_system_heating', true );
    $ic_images_input = get_post_meta( get_the_id(), 'ic_images_input', true );
?>
    <main id="main">
        <h1><?php echo $post_Data->post_title; ?></h1>
        <img src="<?php echo $thumb; ?>">
        <div><?php echo $post_Data->post_content; ?></div>
        <?php if($ic_property_heading){ ?>
            <p>property heading : <?php echo $ic_property_heading; ?></p>
        <?php } ?>
        <?php if($ic_property_status){ ?>
            <p>property status : <?php echo $ic_property_status; ?></p>
        <?php } ?>
        <?php if($ic_property_category){ ?>
            <p>property category : <?php echo $ic_property_category; ?></p>
        <?php } ?>
        <?php if($ic_property_list_date){ ?>
            <p>property list_date : <?php echo $ic_property_list_date; ?></p>
        <?php } ?>
        <?php if($ic_property_unique_id){ ?>
            <p>property unique_id : <?php echo $ic_property_unique_id; ?></p>
        <?php } ?>
        <?php if($ic_property_featured){ ?>
            <p>property featured : <?php echo $ic_property_featured; ?></p>
        <?php } ?>
        <?php if($ic_property_price){ ?>
            <p>property price : <?php echo $ic_property_price; ?></p>
        <?php } ?>
        <?php if($ic_property_bedrooms){ ?>
            <p>property bedrooms : <?php echo $ic_property_bedrooms; ?></p>
        <?php } ?>
        <?php if($ic_property_bathrooms){ ?>
            <p>property bathrooms : <?php echo $ic_property_bathrooms; ?></p>
        <?php } ?>
        <?php if($ic_property_toilet){ ?>
            <p>property toilet : <?php echo $ic_property_toilet; ?></p>
        <?php } ?>
        <?php if($ic_property_ensuite){ ?>
            <p>property ensuite : <?php echo $ic_property_ensuite; ?></p>
        <?php } ?>
        <?php if($ic_property_garage){ ?>
            <p>property garage : <?php echo $ic_property_garage; ?></p>
        <?php } ?>
        <?php if($ic_property_carport){ ?>
            <p>property carport : <?php echo $ic_property_carport; ?></p>
        <?php } ?>
        <?php if($ic_property_open_spaces){ ?>
            <p>property open_spaces : <?php echo $ic_property_open_spaces; ?></p>
        <?php } ?>
        <?php if($ic_property_rooms){ ?>
            <p>property rooms : <?php echo $ic_property_rooms; ?></p>
        <?php } ?>
        <?php if($ic_property_year_built){ ?>
            <p>property year built : <?php echo $ic_property_year_built; ?></p>
        <?php } ?>
        <?php if($ic_property_new_construction){ ?>
            <p>property new construction : <?php echo $ic_property_new_construction; ?></p>
        <?php } ?>
        <?php if($ic_property_air_conditioning){ ?>
            <p>property air conditioning : <?php echo $ic_property_air_conditioning; ?></p>
        <?php } ?>
        <?php if($ic_property_pool){ ?>
            <p>property pool : <?php echo $ic_property_pool; ?></p>
        <?php } ?>
        <?php if($ic_property_security_system){ ?>
            <p>property security system : <?php echo $ic_property_security_system; ?></p>
        <?php } ?>
        <?php if($ic_property_land_area){ ?>
            <p>property land area : <?php echo $ic_property_land_area; ?></p>
        <?php } ?>
        <?php if($ic_property_land_area_unit){ ?>
            <p>property land areaunit : <?php echo $ic_property_land_area_unit; ?></p>
        <?php } ?>
        <?php if($ic_property_building_area){ ?>
            <p>property building area : <?php echo $ic_property_building_area; ?></p>
        <?php } ?>
        <?php if($ic_property_building_area_unit){ ?>
            <p>property building area unit : <?php echo $ic_property_building_area_unit; ?></p>
        <?php } ?>
        <?php if($ic_property_energy_rating){ ?>
            <p>property energy rating : <?php echo $ic_property_energy_rating; ?></p>
        <?php } ?>
        <?php if($ic_property_land_fully_fenced){ ?>
            <p>property land fully fenced : <?php echo $ic_property_land_fully_fenced; ?></p>
        <?php } ?>
        <?php if($ic_property_broadband){ ?>
            <p>property broadband : <?php echo $ic_property_broadband; ?></p>
        <?php } ?>
        <?php if($ic_property_built_in_robes){ ?>
            <p>property built in robes : <?php echo $ic_property_built_in_robes; ?></p>
        <?php } ?>
        <?php if($ic_property_dishwasher){ ?>
            <p>property dishwasher : <?php echo $ic_property_dishwasher; ?></p>
        <?php } ?>
        <?php if($ic_property_floor_boards){ ?>
            <p>property floor boards : <?php echo $ic_property_floor_boards; ?></p>
        <?php } ?>
        <?php if($ic_property_gym){ ?>
            <p>property gym : <?php echo $ic_property_gym; ?></p>
        <?php } ?>
        <?php if($ic_property_intercom){ ?>
            <p>property intercom : <?php echo $ic_property_intercom; ?></p>
        <?php } ?>
        <?php if($ic_property_pay_tv){ ?>
            <p>property pay tv : <?php echo $ic_property_pay_tv; ?></p>
        <?php } ?>
        <?php if($ic_property_remote_garage){ ?>
            <p>property remote garage : <?php echo $ic_property_remote_garage; ?></p>
        <?php } ?>
        <?php if($ic_property_rumpus_room){ ?>
            <p>property rumpus room : <?php echo $ic_property_rumpus_room; ?></p>
        <?php } ?>
        <?php if($ic_property_secure_parking){ ?>
            <p>property secure parking : <?php echo $ic_property_secure_parking; ?></p>
        <?php } ?>
        <?php if($ic_property_spa){ ?>
            <p>property spa : <?php echo $ic_property_spa; ?></p>
        <?php } ?>
        <?php if($ic_property_study){ ?>
            <p>property study : <?php echo $ic_property_study; ?></p>
        <?php } ?>
        <?php if($ic_property_vacuum_system){ ?>
            <p>property vacuum system : <?php echo $ic_property_vacuum_system; ?></p>
        <?php } ?>
        <?php if($ic_property_workshop){ ?>
            <p>property workshop : <?php echo $ic_property_workshop; ?></p>
        <?php } ?>
        <?php if($ic_property_balcony){ ?>
            <p>property balcony : <?php echo $ic_property_balcony; ?></p>
        <?php } ?>
        <?php if($ic_property_courtyard){ ?>
            <p>property courtyard : <?php echo $ic_property_courtyard; ?></p>
        <?php } ?>
        <?php if($ic_property_deck){ ?>
            <p>property deck : <?php echo $ic_property_deck; ?></p>
        <?php } ?>
        <?php if($ic_property_outdoor_entertaining){ ?>
            <p>property outdoorentertaining : <?php echo $ic_property_outdoor_entertaining; ?></p>
        <?php } ?>
        <?php if($ic_property_shed){ ?>
            <p>property shed : <?php echo $ic_property_shed; ?></p>
        <?php } ?>
        <?php if($ic_property_tennis_court){ ?>
            <p>property tennis court : <?php echo $ic_property_tennis_court; ?></p>
        <?php } ?>
        <?php if($ic_property_ducted_cooling){ ?>
            <p>property ducted cooling : <?php echo $ic_property_ducted_cooling; ?></p>
        <?php } ?>
        <?php if($ic_property_ducted_heating){ ?>
            <p>property ducted heating : <?php echo $ic_property_ducted_heating; ?></p>
        <?php } ?>
        <?php if($ic_property_evaporative_cooling){ ?>
            <p>property evaporative cooling : <?php echo $ic_property_evaporative_cooling; ?></p>
        <?php } ?>
        <?php if($ic_property_gas_heating){ ?>
            <p>property gas heating : <?php echo $ic_property_gas_heating; ?></p>
        <?php } ?>
        <?php if($ic_property_hydronic_heating){ ?>
            <p>property hydronic heating : <?php echo $ic_property_hydronic_heating; ?></p>
        <?php } ?>
        <?php if($ic_property_open_fire_place){ ?>
            <p>property open fire place : <?php echo $ic_property_open_fire_place; ?></p>
        <?php } ?>
        <?php if($ic_property_reverse_cycle_aircon){ ?>
            <p>property reverse cycle aircon : <?php echo $ic_property_reverse_cycle_aircon; ?></p>
        <?php } ?>
        <?php if($ic_property_split_system_aircon){ ?>
            <p>property split system aircon : <?php echo $ic_property_split_system_aircon; ?></p>
        <?php } ?>
        <?php if($ic_property_split_system_heating){ ?>
            <p>property split system heating : <?php echo $ic_property_split_system_heating; ?></p>
        <?php } ?>
        <?php if($ic_images_input){
            foreach (explode(',', $ic_images_input) as $key => $value) {
                if($value){
                    echo '<img src="'.$value.'" height="150" width="150">';
                }
            }
        } ?>
    </main>
<?php get_footer(); ?>