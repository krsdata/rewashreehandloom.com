<?php

add_filter( 'thememove_import_demos', 'tm_renovation_import_demos' );
function tm_renovation_import_demos() {
	return array(
		'thememove01' => array(
			'screenshot' => 'http://renovation.thememove.com/data/images/demo.jpg',
			'name'       => esc_html__( 'Renovation', 'infinity' ),
			'url'        => 'http://renovation.thememove.com/packages/tm-renovation-thememove01.zip'
		)
	);
}

add_filter( 'thememove_import_style', 'tm_renovation_import_style' );
function tm_renovation_import_style() {
	return array(
		'title_color'  => '#222222',
		'link_color'   => '#FBD232',
		'notice_color' => '#FBD232',
		'logo'         => 'http://renovation.thememove.com/data/images/logo.png'
	);
}

add_filter( 'thememove_import_generate_thumb', 'tm_renovation_import_generate_thumb' );
function tm_renovation_import_generate_thumb() {
	return true;
}