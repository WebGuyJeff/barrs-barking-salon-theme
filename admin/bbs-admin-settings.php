<?php
/**
 * Settings Admin Page - Barrs Barking Salon Theme
 * Author: Jefferson Real - jeffersonreal.uk
 */

// Move the default posts menu item from 5 to 9
add_action( 'admin_menu', function() {
   global $menu;
   $new_position = 9;
   $cpt_title = 'Posts';
   foreach( $menu as $key => $value )
   {
       if( $cpt_title === $value[0] )
       {
           $copy = $menu[$key];
           unset( $menu[$key] );
           $menu[$new_position] = $copy;
       }
   }
});

class BarrsBarkingSalonThemeSettings {
	private $bbs_theme;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'bbs_theme_add_settings_menu' ) );
		add_action( 'admin_init', array( $this, 'bbs_theme_settings_page_init' ) );
	}

	public function bbs_theme_add_settings_menu() {
		add_menu_page(
			"Barking Salon Theme Settings", // page_title
			'Salon Settings', // menu_title
			'manage_options', // capability
			'bbs-theme-settings', // menu_slug
			array( $this, 'bbs_theme_add_settings_page' ), // function
			'dashicons-pets', // icon_url
			5 // position
		);
	}

	public function bbs_theme_add_settings_page() {
		$this->bbs_theme = get_option( 'bbs_theme_array' ); ?>

		<div class="wrap">

			<h2>Barr's Barking Salon Theme Settings</h2>

			<p>These settings manage content that appears on the front end of the Barr's Barking Salon theme.</p>
            <p>After updating content in these fields, don't forget to click SAVE at the bottom of the page!</strong></p>
            <p>In case of problems, contact Jeff: <a href="mailto:me@jeffersonreal.uk">me@jeffersonreal.uk</a></p>

			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'bbs_theme_group' );
					do_settings_sections( 'bbs_theme_page' );
					submit_button();
				?>
			</form>
		</div>
	<?php }

	public function bbs_theme_settings_page_init() {
		register_setting(
			'bbs_theme_group', // option_group
			'bbs_theme_array', // option_name
			array( $this, 'bbs_theme_sanitize' ) // sanitize_callback
		);

//============================================================= Contact Section
	add_settings_section(
		'bbs_theme_contact_section', // id
		'Contact Information', // title
		array( $this, 'bbs_theme_contact_section_callback' ), // callback
		'bbs_theme_page' // page
	);

    	add_settings_field(
    		'bbs_email_address', // id
    		'Email Address', // title
    		array( $this, 'bbs_email_address_callback' ), // callback
    		'bbs_theme_page', // page
    		'bbs_theme_contact_section' // section
    	);

    	add_settings_field(
    		'bbs_phone_number', // id
    		'Phone Number', // title
    		array( $this, 'bbs_phone_number_callback' ), // callback
    		'bbs_theme_page', // page
    		'bbs_theme_contact_section' // section
    	);

        add_settings_field(
            'bbs_street_address', // id
            'Street Address', // title
            array( $this, 'bbs_street_address_callback' ), // callback
            'bbs_theme_page', // page
            'bbs_theme_contact_section' // section
        );

        add_settings_field(
            'bbs_openstreetmap', // id
            'OpenStreetMap URL', // title
            array( $this, 'bbs_openstreetmap_callback' ), // callback
            'bbs_theme_page', // page
            'bbs_theme_contact_section' // section
        );

//============================================== Social Media and External Links

    add_settings_section(
        'bbs_theme_social_section', // id
        'Social Media and External Links', // title
        array( $this, 'bbs_theme_social_section_section_callback' ), // callback
        'bbs_theme_page' // page
    );

    	add_settings_field(
    		'bbs_social_url_facebook', // id
    		'Social URL - Facebook', // title
    		array( $this, 'bbs_social_url_facebook_callback' ), // callback
    		'bbs_theme_page', // page
    		'bbs_theme_social_section' // section
    	);

        add_settings_field(
    		'bbs_social_url_instagram', // id
    		'Social URL - Instagram', // title
    		array( $this, 'bbs_social_url_instagram_callback' ), // callback
    		'bbs_theme_page', // page
    		'bbs_theme_social_section' // section
    	);

        add_settings_field(
    		'bbs_url_cityguilds', // id
    		'External URL - City & Guilds', // title
    		array( $this, 'bbs_url_cityguilds_callback' ), // callback
    		'bbs_theme_page', // page
    		'bbs_theme_social_section' // section
    	);

//============================================================= Homepage Section

    add_settings_section(
        'bbs_theme_homepage_section', // id
        'Homepage Settings', // title
        array( $this, 'bbs_theme_homepage_section_callback' ), // callback
        'bbs_theme_page' // page
    );

        add_settings_field(
            'bbs_other_services_count', // id
            'Number of Other Services to Display', // title
            array( $this, 'bbs_other_services_count_callback' ), // callback
            'bbs_theme_page', // page
            'bbs_theme_homepage_section' // section
        );

        add_settings_field(
            'bbs_review_count', // id
            'Number of Reviews to Display', // title
            array( $this, 'bbs_review_count_callback' ), // callback
            'bbs_theme_page', // page
            'bbs_theme_homepage_section' // section
        );

        add_settings_field(
			'bbs_title_secondary_services', // id
			'Section Title - Secondary Services Grid', // title
			array( $this, 'bbs_title_secondary_services_callback' ), // callback
			'bbs_theme_page', // page
			'bbs_theme_homepage_section' // section
		);

		add_settings_field(
			'bbs_title_pricelist_cta', // id
			'Section Title - View all Prices Button', // title
			array( $this, 'bbs_title_pricelist_cta_callback' ), // callback
			'bbs_theme_page', // page
			'bbs_theme_homepage_section' // section
		);

		add_settings_field(
			'bbs_title_reviews', // id
			'Section Title - Customer Reviews', // title
			array( $this, 'bbs_title_reviews_callback' ), // callback
			'bbs_theme_page', // page
			'bbs_theme_homepage_section' // section
		);

		add_settings_field(
			'bbs_title_subscribe', // id
			'Section Title - Subscribe Form', // title
			array( $this, 'bbs_title_subscribe_callback' ), // callback
			'bbs_theme_page', // page
			'bbs_theme_homepage_section' // section
		);

		add_settings_field(
			'bbs_title_gallery', // id
			'Section Title - Photo Gallery', // title
			array( $this, 'bbs_title_gallery_callback' ), // callback
			'bbs_theme_page', // page
			'bbs_theme_homepage_section' // section
		);

	}

	public function bbs_theme_sanitize($input) {
		$sanitary_values = array();

		if ( isset( $input['bbs_email_address'] ) ) {
			$sanitary_values['bbs_email_address'] = sanitize_email( $input['bbs_email_address'] );
		}

		if ( isset( $input['bbs_phone_number'] ) ) {
			$sanitary_values['bbs_phone_number'] = sanitize_text_field( $input['bbs_phone_number'] );
		}

        if ( isset( $input['bbs_street_address'] ) ) {
			$sanitary_values['bbs_street_address'] = sanitize_textarea_field( $input['bbs_street_address'] );
		}

		if ( isset( $input['bbs_openstreetmap'] ) ) {
			$sanitary_values['bbs_openstreetmap'] = sanitize_text_field( urldecode ( $input['bbs_openstreetmap'] ) );
		}

        if ( isset( $input['bbs_social_url_facebook'] ) ) {
			$sanitary_values['bbs_social_url_facebook'] = sanitize_text_field( $input['bbs_social_url_facebook'] );
		}

		if ( isset( $input['bbs_social_url_instagram'] ) ) {
			$sanitary_values['bbs_social_url_instagram'] = sanitize_text_field( $input['bbs_social_url_instagram'] );
		}

		if ( isset( $input['bbs_url_cityguilds'] ) ) {
			$sanitary_values['bbs_url_cityguilds'] = sanitize_text_field( $input['bbs_url_cityguilds'] );
		}

        if ( isset( $input['bbs_other_services_count'] ) ) {
			$sanitary_values['bbs_other_services_count'] = sanitize_text_field( $input['bbs_other_services_count'] );
		}

		if ( isset( $input['bbs_review_count'] ) ) {
			$sanitary_values['bbs_review_count'] = sanitize_text_field( $input['bbs_review_count'] );
		}

		if ( isset( $input['bbs_title_secondary_services'] ) ) {
			$sanitary_values['bbs_title_secondary_services'] = sanitize_text_field( $input['bbs_title_secondary_services'] );
		}

		if ( isset( $input['bbs_title_pricelist_cta'] ) ) {
			$sanitary_values['bbs_title_pricelist_cta'] = sanitize_text_field( $input['bbs_title_pricelist_cta'] );
		}

		if ( isset( $input['bbs_title_reviews'] ) ) {
			$sanitary_values['bbs_title_reviews'] = sanitize_text_field( $input['bbs_title_reviews'] );
		}

		if ( isset( $input['bbs_title_subscribe'] ) ) {
			$sanitary_values['bbs_title_subscribe'] = sanitize_text_field( $input['bbs_title_subscribe'] );
		}

		if ( isset( $input['bbs_title_gallery'] ) ) {
			$sanitary_values['bbs_title_gallery'] = sanitize_text_field( $input['bbs_title_gallery'] );
		}

		return $sanitary_values;
	}

//========================================================= Section Descriptions

	public function bbs_theme_contact_section_callback() {
        echo '<p>Contact Information displayed across the website. Put each line
                 of the street address on a new line as it will appear this way
                 on the front end.</p>';
	}

    public function bbs_theme_social_section_section_callback() {
        echo '<p>Configure external links for social accounts and accreditations.</p>';
	}

    public function bbs_theme_homepage_section_callback() {
        echo '<p>Set the quantity of services and reviews to be displayed. Note
                 that if the quantity is greater than the number available, it
                 will simply display all. Set the order of the content using the
                 position setting in the individual posts.</p>
              <p>The section titles appear on the homepage. After updating a
                 title, check how it appears on the website to make sure it fits
                 the space.</p>';
	}

	public function bbs_email_address_callback() {
		printf(
			'<input class="regular-text" type="email" name="bbs_theme_array[bbs_email_address]" id="bbs_email_address" value="%s">',
			isset( $this->bbs_theme['bbs_email_address'] ) ? esc_attr( $this->bbs_theme['bbs_email_address']) : ''
		);
	}

	public function bbs_phone_number_callback() {
		printf(
			'<input class="regular-text" type="tel" pattern="[0-9 ]+" name="bbs_theme_array[bbs_phone_number]" id="bbs_phone_number" value="%s">',
			isset( $this->bbs_theme['bbs_phone_number'] ) ? esc_attr( $this->bbs_theme['bbs_phone_number']) : ''
		);
	}

    public function bbs_street_address_callback() {
		printf(
			'<textarea class="large-text" rows="4" cols="50" name="bbs_theme_array[bbs_street_address]" id="bbs_street_address">%s</textarea>',
			isset( $this->bbs_theme['bbs_street_address'] ) ? esc_textarea( $this->bbs_theme['bbs_street_address']) : ''
		);
	}

    public function bbs_openstreetmap_callback() {
		printf(
			'<input class="regular-text" type="url" name="bbs_theme_array[bbs_openstreetmap]" id="bbs_openstreetmap" value="%s">',
			isset( $this->bbs_theme['bbs_openstreetmap'] ) ? esc_url_raw( $this->bbs_theme['bbs_openstreetmap']) : ''
		);
	}

    public function bbs_social_url_facebook_callback() {
		printf(
			'<input class="regular-text" type="url" name="bbs_theme_array[bbs_social_url_facebook]" id="bbs_social_url_facebook" value="%s">',
			isset( $this->bbs_theme['bbs_social_url_facebook'] ) ? esc_url( $this->bbs_theme['bbs_social_url_facebook']) : ''
		);
	}

	public function bbs_social_url_instagram_callback() {
		printf(
			'<input class="regular-text" type="url" name="bbs_theme_array[bbs_social_url_instagram]" id="bbs_social_url_instagram" value="%s">',
			isset( $this->bbs_theme['bbs_social_url_instagram'] ) ? esc_url( $this->bbs_theme['bbs_social_url_instagram']) : ''
		);
	}

	public function bbs_url_cityguilds_callback() {
		printf(
			'<input class="regular-text" type="url" name="bbs_theme_array[bbs_url_cityguilds]" id="bbs_url_cityguilds" value="%s">',
			isset( $this->bbs_theme['bbs_url_cityguilds'] ) ? esc_url( $this->bbs_theme['bbs_url_cityguilds']) : ''
		);
	}

    public function bbs_other_services_count_callback() {
		printf(
			'<input class="small-text" type="number" min="0" max="20" name="bbs_theme_array[bbs_other_services_count]" id="bbs_other_services_count" value="%s">',
			isset( $this->bbs_theme['bbs_other_services_count'] ) ? esc_attr( $this->bbs_theme['bbs_other_services_count']) : ''
		);
	}

    public function bbs_review_count_callback() {
        printf(
            '<input class="small-text" type="number" min="0" max="20" name="bbs_theme_array[bbs_review_count]" id="bbs_review_count" value="%s">',
            isset( $this->bbs_theme['bbs_review_count'] ) ? esc_attr( $this->bbs_theme['bbs_review_count']) : ''
        );
    }

	public function bbs_title_secondary_services_callback() {
		printf(
			'<input class="regular-text" type="text" name="bbs_theme_array[bbs_title_secondary_services]" id="bbs_title_secondary_services" value="%s">',
			isset( $this->bbs_theme['bbs_title_secondary_services'] ) ? esc_attr( $this->bbs_theme['bbs_title_secondary_services']) : ''
		);
	}

	public function bbs_title_pricelist_cta_callback() {
		printf(
			'<input class="regular-text" type="text" name="bbs_theme_array[bbs_title_pricelist_cta]" id="bbs_title_pricelist_cta" value="%s">',
			isset( $this->bbs_theme['bbs_title_pricelist_cta'] ) ? esc_attr( $this->bbs_theme['bbs_title_pricelist_cta']) : ''
		);
	}

	public function bbs_title_reviews_callback() {
		printf(
			'<input class="regular-text" type="text" name="bbs_theme_array[bbs_title_reviews]" id="bbs_title_reviews" value="%s">',
			isset( $this->bbs_theme['bbs_title_reviews'] ) ? esc_attr( $this->bbs_theme['bbs_title_reviews']) : ''
		);
	}

	public function bbs_title_subscribe_callback() {
		printf(
			'<input class="regular-text" type="text" name="bbs_theme_array[bbs_title_subscribe]" id="bbs_title_subscribe" value="%s">',
			isset( $this->bbs_theme['bbs_title_subscribe'] ) ? esc_attr( $this->bbs_theme['bbs_title_subscribe']) : ''
		);
	}

	public function bbs_title_gallery_callback() {
		printf(
			'<input class="regular-text" type="text" name="bbs_theme_array[bbs_title_gallery]" id="bbs_title_gallery" value="%s">',
			isset( $this->bbs_theme['bbs_title_gallery'] ) ? esc_attr( $this->bbs_theme['bbs_title_gallery']) : ''
		);
	}

}
if ( is_admin() )
	$barr_s_barking_salon_theme_settings = new BarrsBarkingSalonThemeSettings();

/*
 * Retrieve this value with:
 *
 * $bbs_settings = get_option( 'bbs_theme_array' ); // Serialized array of all Options
 * $bbs_email_address = $bbs_settings['bbs_email_address']; // Email Address
 * $bbs_phone_number = $bbs_settings['bbs_phone_number']; // Phone Number

 * $bbs_street_address = $bbs_settings['bbs_street_address']; // Business Address
 * $bbs_openstreetmap = $bbs_settings['bbs_openstreetmap']; // OSM URL

 * $bbs_social_url_facebook = $bbs_settings['bbs_social_url_facebook']; // Facebook URL
 * $bbs_social_url_instagram = $bbs_settings['bbs_social_url_instagram']; // Instagram URL
 * $bbs_url_cityguilds = $bbs_settings['bbs_url_cityguilds']; // City and Guilds URL

 * $bbs_other_services_count = $bbs_settings['bbs_other_services_count']; // Other Services Count
 * $bbs_review_count = $bbs_settings['bbs_review_count']; // Review Count

 * $bbs_title_secondary_services = $bbs_settings['bbs_title_secondary_services']; // Secondary Services Title
 * $bbs_title_pricelist_cta = $bbs_settings['bbs_title_pricelist_cta']; // Pricelist CTA Title
 * $bbs_title_reviews = $bbs_settings['bbs_title_reviews']; // Reviews Title
 * $bbs_title_subscribe = $bbs_settings['bbs_title_subscribe']; // Subscribe Form Title
 * $bbs_title_gallery = $bbs_settings['bbs_title_gallery']; // Gallery Title

 */
