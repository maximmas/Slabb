(function( $ ) {
    "use strict";

     wp.customize( 'main_color', function( value ) {
        value.bind( function( to ) {
            $( '.cta' )
            .add( '.bg_yellow' )
            .add('.heading_marked-outside')
			.add('.heading_marked')
			.add('.popup__title')
			.add('.header__menu-wrap')
			.add('.intro_main')
			.add('.cta__heading-wrap')
			.add('.intro__bg')
			.add('.blog__date')
			.add('.mark')
			// elements below aren't available for manipulation
            // .add('.list_yellow li::before')
            // .add('.pricing-table_yellow tr:first-child')
            // .add('.fact__text::before')
            // .add('.heading_marked-part::after')
            .css( 'background-color', to );

            $( '.text_yellow' )
			.add('.project-details__title')
			.add('.label_required::after')
		    .css('color', to );

            $( '.services__item-img_bordered' )
            .css('border-color', to );


        } );
    });

    wp.customize( 'secondary_color', function( value ) {
        value.bind( function( to ) {
            $( '.bg_blue' )
                .add('blog-post_text')
                .add('.filter__toggle.opened')
                .css( 'background-color', to );
            $( '.contacts__list a' )
				.add('.filter__item.opened')
				.add('.filter__item:hover')
				.add('.index-pages__item-title')
                .css( 'color', to );
            $('.video')
                .css( 'border-color', to );
            $('div.sidebar__item a')
				.add('.link_underline')
                .css( 'box-shadow', '0 1px 0 0 ' + to );

        } );
    });

    wp.customize( 'background_m_color', function( value ) {
        value.bind( function( to ) {
            $( 'body' )
                .add('section')
                .add('#page-wrap')
                .css( 'background-color', to );
        } );
    });

    wp.customize( 'background_sp_color', function( value ) {
        value.bind( function( to ) {
            $( '.section-bg' )
            .add('.testimonials__heading-text')
            .css( 'background-color', to );
        } );
    });

    wp.customize( 'background_p_color', function( value ) {
        value.bind( function( to ) {
            $( '.footer' ).css( 'background-color', to );
        } );
    });

    wp.customize( 'form_bg_color', function( value ) {
        value.bind( function( to ) {
            $( '.contacts__form' )
            .add('.popup')
            .css( 'background-color', to );
        } );
    });
    wp.customize( 'form_in_color', function( value ) {
        value.bind( function( to ) {
            $( '.input' ).css( 'background-color', to );
        } );
    });
    wp.customize( 'cta_bg_color', function( value ) {
        value.bind( function( to ) {
            $( '.btn.btn_cta' ).css( 'background-color', to );
        } );
    });
    wp.customize( 'btn_bg_color', function( value ) {
        value.bind( function( to ) {
            $( '.btn' ).css( 'background-color', to );
        } );
    });

    /* Elements */
    wp.customize( 'el_p5_color', function( value ) {
        value.bind( function( to ) {
            $( '.project_type-5 .project__content' ).css( 'background-color', to );
        } );
    });

    wp.customize( 'el_desc_color', function( value ) {
        value.bind( function( to ) {
            var rgba_color = convert_to_rgba( to );
            $( '.project_type-6 .project__desc' ).css( 'background-color', rgba_color );
        } );
    });

    wp.customize( 'el_quote_color', function( value ) {
        value.bind( function( to ) {
            $( '.blockquote' ).css( 'background-color', to );
        } );
    });

    wp.customize( 'el_pack_bg_color', function( value ) {
        value.bind( function( to ) {
            $( '.pricing-table' ).css( 'background-color', to );
        } );
    });
    wp.customize( 'el_pack_hd_color', function( value ) {
        value.bind( function( to ) {
            $( '.pricing-table tr:first-child' ).css( 'background-color', to );
        } );
    });
    wp.customize( 'el_pack_sale_color', function( value ) {
        value.bind( function( to ) {
            $( '.pricing-table.pricing-table_yellow' ).css( 'background-color', to );
        } );
    });
    wp.customize( 'el_pack_sale_hd_color', function( value ) {
        value.bind( function( to ) {
            $( '.pricing-table_yellow tr:first-child' ).css( 'background-color', to );
        } );
    });

    wp.customize( 'black_font', function( value ) {
        value.bind( function( to ) {
            $( 'body' )
                .add( '.pricing-table_yellow' )
                .add( '.pricing-table_yellow .pricing-table__price' )
                .add( '.blockquote__author' )
                .css( 'color', to );
        } );
    });

    wp.customize( 'white_font', function( value ) {
        value.bind( function( to ) {
            $( '.text_white' )
                .add( '.project_type-6 .project__desc' )
                .add( '.pricing-table:not(.pricing-table_yellow)' )
                .add( '.cta__heading-icon' )
                .add( '.copyright' )
                .css( 'color', to );
        } );
    });

    wp.customize( 'gray_font', function( value ) {
        value.bind( function( to ) {
            $( 'blockquote' )
                .add( '.text_gray' )
                .add( '.category-text' )
                .add( '.project_type-5 .project__content' )
                .add( '.label_placeholder' )
                .css( 'color', to );
        } );
    });
    wp.customize( 'dhead_font', function( value ) {
        value.bind( function( to ) {
            $( '.heading_double__duplicate' ).css( 'color', to );
        } );
    });
    wp.customize( 'vhead_font', function( value ) {
        value.bind( function( to ) {
            $( '.heading_rotated' ).css( 'color', to );
        } );
    });
    wp.customize( 'btn_font', function( value ) {
        value.bind( function( to ) {
            $( '.btn:not(.btn_cta)' ).css( 'color', to );
        } );
    });
    wp.customize( 'cta_btn_font', function( value ) {
        console.log(value);
        value.bind( function( to ) {
            $( '.btn.btn_cta' ).css( 'color', to );
        } );
    });

    function convert_to_rgba( hex_color ){
        var hex = hex_color.substring(1);
        var r = parseInt(hex.substring(0,2), 16);
        var g = parseInt(hex.substring(2,4), 16);
        var b = parseInt(hex.substring(4,6), 16);
        return 'rgba( '+r+','+g+','+b+','+0.6+' )';
    };

})( jQuery );