<?php

// Load Barrs Barking Salon Theme settings

// They must be loaded from the serialized array string, deserialized, then
// assigned to variables for ease of retrieval throughout templates. This file
// must be loaded on each page the settings are required.


$bbs_settings = get_option( 'bbs_theme_array' ); // Serialized array of all Options
$bbs_email_address = $bbs_settings['bbs_email_address']; // Email Address
$bbs_phone_number = $bbs_settings['bbs_phone_number']; // Phone Number

$bbs_street_address = $bbs_settings['bbs_street_address']; // Business Address
$bbs_openstreetmap = $bbs_settings['bbs_openstreetmap']; // OSM URL

$bbs_social_url_facebook = $bbs_settings['bbs_social_url_facebook']; // Facebook URL
$bbs_social_url_instagram = $bbs_settings['bbs_social_url_instagram']; // Instagram URL
$bbs_url_cityguilds = $bbs_settings['bbs_url_cityguilds']; // City and Guilds URL

$bbs_other_services_count = $bbs_settings['bbs_other_services_count']; // Other Services Count
$bbs_review_count = $bbs_settings['bbs_review_count']; // Review Count

$bbs_title_secondary_services = $bbs_settings['bbs_title_secondary_services']; // Secondary Services Title
$bbs_title_pricelist_cta = $bbs_settings['bbs_title_pricelist_cta']; // Pricelist CTA Title
$bbs_title_reviews = $bbs_settings['bbs_title_reviews']; // Reviews Title
$bbs_title_subscribe = $bbs_settings['bbs_title_subscribe']; // Subscribe Form Title
$bbs_title_gallery = $bbs_settings['bbs_title_gallery']; // Gallery Title
