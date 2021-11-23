<?php 
$htmltemplate_layout_class = "col-md-8";
if(!(is_active_sidebar('sidebar-1'))){
    $htmltemplate_layout_class = "col-md-10 offset-md-1"; 
}
?>
<?php get_header(); ?>
<body <?php body_class();?>>
    <?php get_template_part('/template-parts/common/hero');?>
    <div class="container">
        <div class="row">
            <div class="<?php echo $htmltemplate_layout_class;?>">
            <div class="posts">
            <?php 
            while(have_posts()) :
                the_post();
                ?>
    <div class="post <?php post_class(); ?>">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="post-title text-center">
                            <?php the_title(); ?>
                        </h2>
                        <p class="text-center">
                            <strong><?php the_author_posts_link();?></strong><br>
                            <?php echo get_the_date(); ?>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>
                            <?php 
                            if(has_post_thumbnail()):
                                $thumbnail_url = get_the_post_thumbnail_url(null, "medium-large");
                                echo '<a href="'.$thumbnail_url.'" data-featherlight="image">';
                                the_post_thumbnail("medium_large", array("class"=>"img-fluid"));
                                echo '</a>';
                            endif;
                            ?>
                        </p>
                        <p>
                            <?php 
                            the_content();
                            wp_link_pages();
                            // next_post_link();
                            // echo "</br>";
                            // previous_post_link();
                             ?>
                        </p>
                    </div>
                    <div class="authorsection">
                        <div class="row">
                            <div class="col-md-2 authorimage">
                                <?php echo get_avatar(get_the_author_meta("ID")); ?>
                            </div>
                            <div class="col-md-10">
                                <h4>
                                    <?php echo get_the_author_meta("display_name"); ?>
                                </h4>
                                <p>
                                    <?php echo get_the_author_meta("description"); ?>  
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php if(comments_open()):?>
                    <div class="col-md-10 offset-md-1">
                        <?php comments_template(); ?>
                    </div>
                    <?php endif;?>
                </div>
            </div>
        </div> 
            <?php 
        endwhile;
        ?>
    </div> 
            </div>
            <?php if(is_active_sidebar('sidebar-1')): ?>
            <div class="col-md-4">
                <?php 
                if(is_active_sidebar('sidebar-1')){
                    dynamic_sidebar('sidebar-1');
                }
                ?>
            </div>
            <?php endif;?>
        </div>
    </div>
    
    <?php get_footer();?>
    