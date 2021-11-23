<?php 
define('ATTACHMENTS_SETTINGS_SCREEN',false);
add_filter('attahments_default_instance','__return_false');

function htmltemplate_attachments($attachments){
    $fileds = array(
        array(
            'name' => 'title',
            'type' => 'text',
            'label' => __( 'Title', 'htmltemplate'),
        ),
    );
    $args = array(
            'label' =>'Featured Slider',
            'post_type' => array('post'),
            'filetype' => array("image"),
            'note' => 'Add Slider Images',  
            'button_text' => __('Attach Files', 'htmltemplate'),
            'fields' => $fileds,
    );
    $attachments->register( 'slider', $args);
}

add_action('attachments_register','htmltemplate_attachments');

function htmltemplate_testimonials_attachments($attachments){
    $fileds = array(
        array(
            'name' => 'name',
            'type' => 'text',
            'label' => __( 'Name', 'htmltemplate'),
        ),
        array(
            'name' => 'position',
            'type' => 'text',
            'label' => __( 'Position', 'htmltemplate'),
        ),
        array(
            'name' => 'company',
            'type' => 'text',
            'label' => __( 'Company', 'htmltemplate'),
        ),
        array(
            'name' => 'testimonial',
            'type' => 'textarea',
            'label' => __( 'Testimonial', 'htmltemplate'),
        ),
    );
    $args = array(
            'label' =>'Testimonial',
            'post_type' => array('page'),
            'filetype' => array("image"),
            'note' => 'Add testimonial',
            'button_text' => __('Attach Files', 'htmltemplate'),
            'fields' => $fileds,
    );
    $attachments->register( 'testimonials', $args);
}

add_action('attachments_register','htmltemplate_testimonials_attachments');
?>