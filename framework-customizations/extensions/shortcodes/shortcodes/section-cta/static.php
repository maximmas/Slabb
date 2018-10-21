<?php if (!defined('FW')) die('Forbidden');

if ( !function_exists('slabb_add_cta_style') ){

	function slabb_add_cta_style( $hash = 0, $top_color = '#fff', $bottom_color = '#fff' ){

		$uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/section-cta');
		wp_enqueue_style( 'cta-style', $uri . '/static/css/style.css' );
		$cta_hash = '.cta-' . $hash;

    	$slabb_cta_top  = $cta_hash . '.section-border-top_cta::before{background-image: url("data:image/svg+xml;utf-8,' . get_top_border( $top_color ) . '");}';

        $slabb_cta_bottom = $cta_hash . '.section-border-bottom_cta::after{background-image: url("data:image/svg+xml;utf-8,' . get_bottom_border( $bottom_color ) . '");}';

		wp_add_inline_style( 'cta-style', $slabb_cta_top );
        wp_add_inline_style( 'cta-style', $slabb_cta_bottom );
	};
	add_action( 'wp_enqueue_scripts', 'slabb_add_spacer_style' );

    

    function get_top_border($color){
        $svg = "<svg version='1.0' id='Layer_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 170.3 5.8' style='enable-background:new 0 0 170.3 5.8;' xml:space='preserve'><path fill='$color' d='M0.7,5.6c0.9,0,3-0.5,3.1-1C4.5,4.7,6.6,3.8,8.3,3c3.5,1.3,10,1.3,12,0.1c0.7,0.6,1.3,1.1,1.6,1.4 C23.4,4.3,24.6,4,25.8,4c2.3,0.1,4.2-0.4,6.1-1.6c1.3-0.8,3-1,4.4-1.4c1.5,2.9,2.9,3.3,5.8,2.2c1.6-0.6,3.4-0.8,5.2-1.2 c1.5-0.4,3-1.4,4.7-1c1.6,0.3,4.8,1.6,4.8,1.6s2.9-1.4,4.4-1.5c1.7-0.2,3.5,0,5.4,0C66.8,1.7,67,2.3,67.2,3c0.4,0,0.7,0.1,1,0.1 c4.2-0.3,8.3,1.5,12.6,0.8c0.3,0,0.7,0.1,0.9,0.3C82.5,5.1,83.1,5,84,4.3c0.6-0.5,1.4-0.8,2.1-1.1c0.4-0.2,1.1-0.3,1.4-0.1 c1.9,1.2,3.7,1.1,5.6,0c0.6-0.3,1.8-0.3,2.4,0.2c2.4,1.8,4.4,0.6,7,0.8c0.3,0,1.2-1.1,1.7-1.1c0.8,0.4-0.1,1.5,3,0.7 c3.2-0.9,3.9,2.2,8.7-1.3c1-0.8,2.4-1,3.7-1.4c0.3-0.1,0.9,0.3,1.2,0.5c1.2,0.8,2.4,1.6,3.5,2.4c2.3-0.8,4.3-1.9,6.6-2.2 c1.5-0.2,3.1-0.8,4.7-0.8c0.9,0.1,1.8,0.5,2.8,0.6c2.7,0.3,2.1,1,3.6,0.1c2.5-1.5,5-0.4,7.5-0.8c0.2,0.7,0.3,1.3,0.5,1.8 c0.3,0.2,0.8,0.5,1.1,0.5c1.2,0,2.2-0.3,3.4-0.2c1.4,0,2.7,0.4,4,0.7c4.9,1.2,4.9,0.4,7.1-0.2c2.4-0.6,3.3-0.6,4.3,1.7 c0.1,0.2,0.2,0.4,0.4,0.7V0H0v5.8C0,5.8,0.5,5.4,0.7,5.6z'/></svg>";
        return $svg;
    };
    function get_bottom_border($color){
        $svg = "<svg version='1.0' id='Layer_1' xmlns='http://www.w3.org/2000/svg\' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 170.3 5.8' style='enable-background:new 0 0 170.3 5.8;' xml:space='preserve'><path fill='$color' d='M169.6,0.2c-0.9,0-3,0.5-3.1,1c-0.7-0.1-2.8,0.8-4.5,1.6c-3.5-1.3-10-1.3-12-0.1c-0.7-0.6-1.3-1.1-1.6-1.4 c-1.5,0.2-2.7,0.5-3.9,0.5c-2.3-0.1-4.2,0.4-6.1,1.6c-1.3,0.8-3,1-4.4,1.4c-1.5-2.9-2.9-3.3-5.8-2.2c-1.6,0.6-3.4,0.8-5.2,1.2 c-1.5,0.4-3,1.4-4.7,1c-1.6-0.3-4.8-1.6-4.8-1.6s-2.9,1.4-4.4,1.5c-1.7,0.2-3.5,0-5.4,0c-0.2-0.6-0.4-1.2-0.6-1.9 c-0.4,0-0.7-0.1-1-0.1C97.9,3,93.8,1.2,89.5,1.9c-0.3,0-0.7-0.1-0.9-0.3c-0.8-0.9-1.4-0.8-2.3-0.1c-0.6,0.5-1.4,0.8-2.1,1.1 c-0.4,0.2-1.1,0.3-1.4,0.1c-1.9-1.2-3.7-1.1-5.6,0C76.6,3,75.4,3,74.8,2.5c-2.4-1.8-4.4-0.6-7-0.8c-0.3,0-1.2,1.1-1.7,1.1 c-0.8-0.4,0.1-1.5-3-0.7c-3.2,0.9-3.9-2.2-8.7,1.3c-1,0.8-2.4,1-3.7,1.4c-0.3,0.1-0.9-0.3-1.2-0.5c-1.2-0.8-2.4-1.6-3.5-2.4 c-2.3,0.8-4.3,1.9-6.6,2.2c-1.5,0.2-3.1,0.8-4.7,0.8c-0.9-0.1-1.8-0.5-2.8-0.6c-2.7-0.3-2.1-1-3.6-0.1c-2.5,1.5-5,0.4-7.5,0.8 c-0.2-0.7-0.3-1.3-0.5-1.8C20,3,19.5,2.7,19.2,2.7C18,2.7,17,3,15.8,2.9c-1.4,0-2.7-0.4-4-0.7C6.9,1,6.9,1.8,4.7,2.4 C2.3,3,1.4,3,0.4,0.7C0.3,0.5,0.2,0.3,0,0v5.8h170.3V0C170.3,0,169.8,0.4,169.6,0.2z'/></svg>";
        return $svg;
    };


};






    




