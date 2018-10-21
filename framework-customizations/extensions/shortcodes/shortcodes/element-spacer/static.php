<?php if (!defined('FW')) die('Forbidden');


if ( !function_exists('slabb_add_spacer_style') ){

	function slabb_add_spacer_style( $hash = 0, $w_height = 0, $m_height = 0, $s_height = 0 ){

		$uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/element-spacer');

		wp_enqueue_style( 'spacer-style', $uri . '/static/css/style.css' );
		$slabb_spacer_style = slabb_str( $hash, $w_height );
		$slabb_spacer_style .= '@media screen and (max-width: 1439px) {' . slabb_str( $hash, $m_height ) . '}';
		$slabb_spacer_style .= '@media screen and (max-width: 1119px) {' . slabb_str( $hash, $s_height ) . '}';
				
		wp_add_inline_style( 'spacer-style', $slabb_spacer_style );

	};

	add_action( 'wp_enqueue_scripts', 'slabb_add_spacer_style' );

	function slabb_str( $hs, $ht ){
		return '.spacer-' . $hs . '{ height: ' . $ht . 'px; }';
	};		

};








