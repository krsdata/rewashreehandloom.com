<?php

/**
 * ThemeMove Button Shortcode
 * @version 1.0
 * @package ThemeMove
 */

class WPBakeryShortCode_Thememove_Button extends WPBakeryShortCode {
}

// Mapping shortcode
vc_map( array(
	'name'     => esc_html__( 'Button', 'infinity' ),
	'base'     => 'thememove_button',
	'category' => esc_html__( 'by THEMEMOVE', 'infinity' ),
	'js_view' => 'VcIconElementView_Backend',
	'params'   => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__('Text', 'infinity'),
			'admin_label' => true,
			'param_name'  => 'text',
			'description' => esc_html__( 'Enter text on the button.', 'infinity' )
		),
		array(
			'type' => 'vc_link',
			'heading'     => esc_html__('URL (Link)', 'infinity'),
			'param_name'  => 'link',
			'description' => esc_html__( 'Enter button link', 'infinity' ),
		),
		array(
			'type'        => 'checkbox',
			'param_name'  => 'add_icon',
			'value' => array( esc_html__( 'Add icon?', 'infinity' ) => 'yes' )
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Icon library', 'infinity' ),
			'admin_label' => true,
			'value' => array(
				esc_html__( 'Font Awesome', 'infinity' ) => 'fontawesome',
				esc_html__( 'Open Iconic', 'infinity' ) => 'openiconic',
				esc_html__( 'Typicons', 'infinity' ) => 'typicons',
				esc_html__( 'Entypo', 'infinity' ) => 'entypo',
				esc_html__( 'Linecons', 'infinity' ) => 'linecons',
				esc_html__('P7 Stroke', 'infinity') => 'pe7stroke',
				esc_html__('Renovation', 'infinity') => 'renovation',
			),
			'param_name' => 'type',
			'description' => esc_html__( 'Select icon library.', 'infinity' ),
			'dependency' => array( 'element' => 'add_icon', 'not_empty' => true ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'infinity' ),
			'param_name' => 'icon_fontawesome',
			'value' => 'fa fa-adjust',
			'settings' => array(
				'emptyIcon' => false,
				'iconsPerPage' => 4000,
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'fontawesome',
			),
			'description' => esc_html__( 'Select icon from library.', 'infinity' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'infinity' ),
			'param_name' => 'icon_openiconic',
			'settings' => array(
				'emptyIcon' => false,
				'type' => 'openiconic',
				'iconsPerPage' => 4000,
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'openiconic',
			),
			'description' => esc_html__( 'Select icon from library.', 'infinity' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'infinity' ),
			'param_name' => 'icon_typicons',
			'settings' => array(
				'emptyIcon' => false,
				'type' => 'typicons',
				'iconsPerPage' => 4000,
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'typicons',
			),
			'description' => esc_html__( 'Select icon from library.', 'infinity' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'infinity' ),
			'param_name' => 'icon_entypo',
			'settings' => array(
				'emptyIcon' => false,
				'type' => 'entypo',
				'iconsPerPage' => 4000,
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'entypo',
			),
		),
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'infinity' ),
			'param_name' => 'icon_linecons',
			'settings' => array(
				'emptyIcon' => false,
				'type' => 'linecons',
				'iconsPerPage' => 4000,
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'linecons',
			),
			'description' => esc_html__( 'Select icon from library.', 'infinity' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__('Icon', 'infinity'),
			'param_name' => 'icon_pe7stroke',
			'value' => '',
			'settings' => array(
				'emptyIcon' => false,
				'type' => 'pe7stroke',
				'iconsPerPage' => 4000,
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'pe7stroke',
			),
			'description' => esc_html__('Select icon from library.', 'infinity'),
		),
		array(
			'type' => 'iconpicker',
			'heading' => esc_html__('Icon', 'infinity'),
			'param_name' => 'icon_renovation',
			'value' => '',
			'settings' => array(
				'emptyIcon' => false,
				'type' => 'renovation',
				'iconsPerPage' => 4000,
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'renovation',
			),
			'description' => esc_html__('Select icon from library.', 'infinity'),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Extra class name', 'infinity'),
			'param_name' => 'el_class',
			'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'infinity'),
		),
	)
) );