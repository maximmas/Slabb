<?php if (!defined( 'FW' )) die( 'Forbidden' );


$options = array(
    'personal_settings'=> array(
        'title' => esc_html__( 'Personal information', 'slabb' ),
        'type' => 'tab',
        'options' => array(
            'person_name' => array( 
                'type'  => 'text', 
                'label' => esc_html__( 'Your name' , 'slabb' ),
             ),
            'person_email' => array( 
                'type'  => 'text', 
                'label' => esc_html__( 'Your email' , 'slabb' ),
             ),
        ),
    ),
    'social_settings' => array(
        'title' => esc_html__( 'Social Links', 'slabb' ),
        'type' => 'tab',
        'options' => array(
            'social_links' => array(
                'type' => 'addable-box',
                'label' => esc_html__( 'Social networks', 'slabb' ),
                'box-options' => array(
                    'link_title' => array(
                        'type' => 'text',
                        'value' => '',
                        'label' => esc_html__( 'Network title', 'slabb' ),
                    ),
                    'profile_title' => array(
                        'type' => 'text',
                        'value' => '',
                        'label' => esc_html__( 'Profile title', 'slabb' ),
                    ),
                    'profile_url' => array(
                        'type' => 'text',
                        'value' => '',
                        'label' => esc_html__( 'Full profile URL', 'slabb' ),
                    ),
                    'link_icon' => array(
                        'type' => 'icon-v2',
                        'preview_size' => 'small',
                        'modal_size' => 'medium',
                        'label' => esc_html__( 'Choose icon', 'slabb' ),
                    ),
                    'is_menu_display' => array(
                        'type' => 'switch',
                        'value' => 'yes',
                        'label' => esc_html__( 'Display this link in the main menu?', 'slabb' ),
                        'left-choice' => array(
                            'value' => 'yes',
                            'label' => esc_html__( 'Yes', 'slabb' ),
                        ),
                        'right-choice' => array(
                            'value' => 'no',
                            'label' => esc_html__( 'No', 'slabb' ),
                        ),
                    ),
                    'is_contact_display' => array(
                        'type' => 'switch',
                        'value' => 'yes',
                        'label' => esc_html__( 'Display this link in the contact section?', 'slabb' ),
                        'left-choice' => array(
                            'value' => 'yes',
                            'label' => esc_html__( 'Yes', 'slabb' ),
                        ),
                        'right-choice' => array(
                            'value' => 'no',
                            'label' => esc_html__( 'No', 'slabb' ),
                        ),
                    ),
                ),
                'template' => '{{- link_title }}',
                'limit' => 0,
                'add-button-text' => esc_html__( 'Add link', 'slabb' ),
                'sortable' => true,
            ),
        ),
    ),
    'footer_settings' => array(
        'title' => esc_html__( 'Footer', 'slabb' ),
        'type' => 'tab',
        'options' => array(
            'copyright_text' => array( 'type' => 'text', 'label' => esc_html__( 'Copyright text string', 'slabb' ) ),
        ),
    ),
    'blog_settings' => array(
        'title' => esc_html__( 'Blog', 'slabb' ),
        'type' => 'tab',
        'options' => array(
            'share_buttons'=>array(
                'type'             => 'box',
                'title'            => esc_html__( 'Sharing buttons', 'slabb' ),
                    'options' => array(
                        'is_blog_facebook' => array(
                            'type' => 'switch',
                            'value' => 'yes',
                            'label' => esc_html__('Display Facebook button?', 'slabb'),
                            'left-choice' => array(
                                'value' => 'yes',
                                'label' => esc_html__('Yes', 'slabb'),
                            ),
                            'right-choice' => array(
                                'value' => 'no',
                                'label' => esc_html__('No', 'slabb'),
                            ),
                        ),
                        'is_blog_twitter' => array(
                            'type' => 'switch',
                            'value' => 'yes',
                            'label' => esc_html__('Display Twitter button?', 'slabb'),
                            'left-choice' => array(
                                'value' => 'yes',
                                'label' => esc_html__('Yes', 'slabb'),
                            ),
                            'right-choice' => array(
                                'value' => 'no',
                                'label' => esc_html__('No', 'slabb'),
                            ),
                        ),
                        'is_blog_gplus' => array(
                            'type' => 'switch',
                            'value' => 'yes',
                            'label' => esc_html__('Display Google Plus button?', 'slabb'),
                            'left-choice' => array(
                                'value' => 'yes',
                                'label' => esc_html__('Yes', 'slabb'),
                            ),
                            'right-choice' => array(
                                'value' => 'no',
                                'label' => esc_html__('No', 'slabb'),
                            ),
                        ),
                    ),
            ),
            'blog_form_placeholders' => array(
                'type' => 'box',
                'title' => esc_html__( 'Comment form placeholders', 'slabb' ),
                'options' => array(
                    'blog_name_placeholder' => array(
                        'label' => esc_html__( 'Name field placeholder', 'slabb' ),
                        'type'  => 'text',
                        'value' => esc_html__( 'Your name', 'slabb' ),
                    ),
                    'blog_email_placeholder' => array(
                        'label' => esc_html__( 'Email field placeholder', 'slabb' ),
                        'type'  => 'text',
                        'value' => esc_html__( 'Your E-mail', 'slabb' ),
                    ),
                    'blog_message_placeholder' => array(
                        'label' => esc_html__( 'Message field placeholder', 'slabb' ),
                        'type'  => 'text',
                        'value' => esc_html__( 'Message', 'slabb' ),
                    ),
                    'blog_button_text' => array(
                        'label' => esc_html__( 'Button text', 'slabb' ),
                        'type'  => 'text',
                        'value' => esc_html__( 'Add comment', 'slabb' ),
                    ),
                ),
            ),
        ),
    ),
    'contact_settings' => array(
        'title' => esc_html__( 'Contact form', 'slabb' ),
        'type' => 'tab',
        'options' => array(
            'contact_form' => array(
                'type' => 'popup',
                'label' => esc_html__( 'Contact form settings', 'slabb' ),
                'popup-title' => esc_html__( 'Contact form', 'slabb' ),
                'button' => esc_html__( 'Edit', 'slabb' ),
                'size' => 'small', 
                'popup-options' => array(
                    'name_placeholder' => array(
                        'label' => esc_html__( 'Name field placeholder', 'slabb' ),
                        'type'  => 'text',
                        'value' => esc_html__( 'Your Name', 'slabb' ),
                        ),
                    'email_placeholder' => array(
                        'label' => esc_html__( 'Email field placeholder', 'slabb' ),
                        'type'  => 'text',
                        'value' => esc_html__( 'Your E-mail', 'slabb' ),
                        ),
                    'message_placeholder' => array(
                        'label' => esc_html__( 'Message field placeholder', 'slabb' ),
                        'type'  => 'text',
                        'value' => esc_html__( 'Message', 'slabb' ),
                        ),
                    'button_text' => array(
                        'label' => esc_html__( 'Button text', 'slabb' ),
                        'type'  => 'text',
                        'value' => esc_html__( 'Send message', 'slabb' ),
                        ),
                ),
            ),
        ),
    ),
    'popup_settings' => array(
        'title' => esc_html__( 'Popup form', 'slabb' ),
        'type' => 'tab',
        'options' => array(
            'popup_title' => array( 
                'type'  => 'text', 
                'label' => esc_html__( 'Form title', 'slabb' ),
                'value' => esc_html__( 'Get a FREE quote', 'slabb' )
             ),
            'popup_name' => array( 
                'type'  => 'text', 
                'label' => esc_html__( 'Name field label' , 'slabb' ),
                'value' => esc_html__( 'Your Name', 'slabb' )
             ),
            'popup_email' => array( 
                'type'  => 'text', 
                'label' => esc_html__( 'Email field label' , 'slabb' ),
                'value' => esc_html__( 'Your E-mail', 'slabb' )
             ),
            'popup_subject' => array( 
                'type'  => 'text', 
                'label' => esc_html__( 'Subject field label' , 'slabb' ),
                'value' => esc_html__( 'Subject', 'slabb' )
             ),
            'popup_message' => array( 
                'type'  => 'text', 
                'label' => esc_html__( 'Message field label' , 'slabb' ),
                'value' => esc_html__( 'Message', 'slabb' )
             ),
            'popup_button' => array( 
                'type'  => 'text', 
                'label' => esc_html__( 'Send button text' , 'slabb' ),
                'value' => esc_html__( 'Send message', 'slabb' )
             ),
            'popup_success_title' => array( 
                'type'  => 'text', 
                'label' => esc_html__( 'Success response title' , 'slabb' ),
                'value' => esc_html__( 'Thank you!', 'slabb' )
             ),
            'popup_success_text' => array( 
                'type'  => 'text', 
                'label' => esc_html__( 'Success response message' , 'slabb' ),
                'value' => esc_html__( 'Your message has been successfully sent.', 'slabb' )
             ),
            'popup_error_title' => array( 
                'type'  => 'text', 
                'label' => esc_html__( 'Error response title' , 'slabb' ),
                'value' => esc_html__( 'Sorry', 'slabb' )
             ),
            'popup_error_text' => array( 
                'type'  => 'text', 
                'label' => esc_html__( 'Error response message' , 'slabb' ),
                'value' => esc_html__( 'Something went wrong. Please try again.', 'slabb' )
             ),
        ),
    ),

);
			