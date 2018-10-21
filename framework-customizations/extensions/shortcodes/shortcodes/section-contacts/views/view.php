<?php if (!defined('FW')) die('Forbidden');


if ( $atts['contact_is_wide_title'] == 'yes' ){
    require_once('view-page.php');
} else {
    require_once('view-section.php');

};

?>
