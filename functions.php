<?php 
if(site_url()=="http://localhost/projecthasin"){
    define("VERSION",time());
}else{
    define("VERSION",wp_get_theme()->get("Version"));
}

function htmltemplate_bootstrapping(){
    load_theme_textdomain("htmltemplate");
    add_theme_support("post-thumbnails");
    add_theme_support("title-tag");
    add_theme_support("custom-background");
    $htmltemplate_custom_header_details=array(
        'header-text' =>true,
        'default-text-color'=>'#222',
    );
    add_theme_support("custom-header",$htmltemplate_custom_header_details);
    add_theme_support("custom-logo", array(
        "width" =>100,
        "height" =>100
        ));
    register_nav_menu('primary_menu',__('Main Menu','htmltemplate'));
}
    add_action("after_setup_theme", "htmltemplate_bootstrapping");

    function htmltemplate_assets(){
        wp_enqueue_style("htmltemplate",get_stylesheet_uri(),null,VERSION);
        wp_enqueue_style("bootstrap-min","//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css");
        wp_enqueue_style("featherlight-min","//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.css");
        wp_enqueue_script("fontawesome","//kit.fontawesome.com/476a55ebf9.js");
        wp_enqueue_script("featherlight-js","//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.js",array("jquery"),"1.0.0",true);
        wp_enqueue_script("htmltemplate-main",get_template_directory_uri()."/assets/js/main.js",null,"0.1.1",true);
        //wp_enqueue_script("htmltemplate-main",get_theme_file_uri()."/assets/js/main.js",null,VERSION,true);
        //wp_enqueue_script("htmltemplate-main",get_theme_file_uri()."/assets/js/main.js",array("jquery","featherlight-js"),"0.1.1",true);
    }
    add_action("wp_enqueue_scripts","htmltemplate_assets");

    
function htmltemplate_sidebars() {
    register_sidebar(
        array(
            'id'            => 'sidebar-1',
            'name'          => __( 'Single Post Sidebar', 'htmltemplate' ),
            'description'   => __( 'Right Sidebar.' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

    register_sidebar(
        array(
            'id'            => 'footer-left',
            'name'          => __( 'Footer Left', 'htmltemplate' ),
            'description'   => __( 'Footer Left Sidebar.' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '',
            'after_title'   => '',
        )
    );

    register_sidebar(
        array(
            'id'            => 'footer-right',
            'name'          => __( 'Footer Right', 'htmltemplate' ),
            'description'   => __( 'Footer Right Sidebar.' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'htmltemplate_sidebars' );


function htmltemplate_the_excerpt($excerpt){
    if(!post_password_required()){
        return $excerpt;
    }else{
        echo get_the_password_form();
    }
}

add_filter('the_excerpt','htmltemplate_the_excerpt');

function htmltemplate_protected_title_change(){
    return "%s";
}
add_filter('protected_title_format','htmltemplate_protected_title_change');

function htmltemplate_about_page_template_banner(){
  if(is_page()){
    $feature_img = get_the_post_thumbnail_url(null,"large");
    ?>
    <style>
       .page-header{background-image:url(<?php echo $feature_img;?>);} 
    </style>
    <?php 
  } 
  if(is_front_page()){
      if(current_theme_supports("custom-header")){
          ?>
            <style>
                .header{
                    bacground-image: url(<?php echo header_image();?>);
                    background-size:cover;
                    margin-bottom:20px;
                }
                .header h1.heading a, h3.tagline{
                    color: #<?php echo get_header_textcolor();?>;
                    <?php 
                    if(!display_header_text()){
                        echo "display:none;";
                    }
                    ?>
                }
            </style>
          <?php
      }
  }
}

add_action('wp_head','htmltemplate_about_page_template_banner');
?>