<?php
/**
 * Testimonials shortcode
 * @version 1.0
 * @package ThemeMove
 */
class WPBakeryShortCode_Thememove_Testimonials extends WPBakeryShortCode {
}

// Mapping shortcode
vc_map( array(
	"name"                      => "Testimonials",
	"base"                      => "thememove_testimonials",
	"category"                  => 'by THEMEMOVE',
	"allowed_container_element" => 'vc_row',
	"params"                    => array(
		array(
			'type'        => 'checkbox',
			'heading'    => esc_html__('Enable Carousel', 'infinity'),
			'param_name' => 'enable_carousel',
			'value' => array( esc_html__( 'Yes', 'infinity' ) => 'yes' ),
		),
		array(
			'type'       => 'checkbox',
			'heading'    => esc_html__('Show Bullets', 'infinity'),
			'param_name' => 'display_bullets',
			'value'      => array( esc_html__('Yes', 'infinity') => 'yes' ),
			'dependency' => Array( 'element' => 'enable_carousel', 'not_empty' => true )
		),
		array(
			'type'       => 'checkbox',
			'heading'    => esc_html__('Enable Autoplay', 'infinity'),
			'param_name' => "enable_autoplay",
			'value'      => array(esc_html__('Yes', 'infinity') => 'yes'),
			'dependency' => Array( 'element' => 'enable_carousel', 'not_empty' => true )
		),
		array(
			'type'        => "textfield",
			'heading'     => esc_html__('Number', 'infinity'),
			'param_name'  => "number",
			'value'       => "",
			"description" => esc_html__('Number of Testimonials', 'infinity')
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__('Order by', 'infinity'),
			'param_name'  => "orderby",
			'value'       => array(
				esc_html__('None', 'infinity')       => "none",
				esc_html__('ID', 'infinity')         => "ID",
				esc_html__('Title', 'infinity')      => "title",
				esc_html__('Date', 'infinity')       => "date",
				esc_html__('Menu Order', 'infinity') => "menu_order",
			),
			"description" => esc_html__('How to order the items ?', 'infinity')
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__('Order', 'infinity'),
			'param_name'  => "order",
			'value'       => array(
				esc_html__('DESC', 'infinity') => "DESC",
				esc_html__('ASC', 'infinity')  => "ASC",
			),
			"description" => esc_html__('How to order the items', 'infinity')
		),
		array(
			'type'        => 'checkbox',
			'heading'     => esc_html__('Show Author Info', 'infinity'),
			'param_name'  => "display_author",
			'value'       => array(esc_html__('Yes', 'infinity') => 'yes'),
			"description" =>esc_html__('Choose yes to show author name and byline', 'infinity')
		),
		array(
			'type'        => 'checkbox',
			'heading'     => esc_html__('Show URL', 'infinity'),
			'param_name'  => "display_url",
			'value'       => array(esc_html__('Yes', 'infinity') => 'yes'),
			"description" => esc_html__('Choose yes to show author url', 'infinity'),
			'dependency' => array( 'element' => 'display_author', 'not_empty' => true ),
		),
		array(
			'type'        => 'checkbox',
			'heading'     => esc_html__('Show Author Image', 'infinity'),
			'param_name'  => "display_avatar",
			'value'       => array(esc_html__('Yes', 'infinity') => 'yes'),
			"description" => esc_html__('Choose yes to show author avatar', 'infinity'),
		),
		array(
			'type'        => "textfield",
			'heading'     => esc_html__('Avatar Size', 'infinity'),
			'param_name'  => "size",
			'value'       => "70",
			"description" => esc_html__('Size of Avatar', 'infinity'),
			'dependency' => array( 'element' => 'display_avatar', 'not_empty' => true ),
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__('Extra class name', 'infinity'),
			'param_name' => 'el_class',
		)
	)
) );