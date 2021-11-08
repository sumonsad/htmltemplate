<?php get_header(); ?>
<body <?php body_class();?>>
    <?php get_template_part('/template-parts/common/hero'); ?>
    <div class="posts">
        <?php 
        while(have_posts()) :
            the_post();
            ?>
<div class="post <?php post_class(); ?>">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="post-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <p>
                            <strong><?php the_author();?></strong><br>
                            <?php echo get_the_date(); ?>
                        </p>
                        
                        <div class="tags">
                        <?php echo get_the_tag_list('<ul class="list-unstyled"><li>','</li><li>','</li></ul>');?>
                        </div>
                    </div>
                    <div class="col-md-8">
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
                            // if(post_password_required()){
                            //     the_excerpt();
                            // }else{
                            //     echo get_the_password_form();
                            // }
                            the_excerpt();
                             ?>
                        </p>
                    </div>
                </div>
            </div>
        </div> 

            <?php 
        endwhile;
        ?>
        <div class="container post-pagination">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8">
                    <?php the_posts_pagination(array(
                        'prev_text'=>'new post',
                        'next_text'=>'old post'
                    ));?>
                </div>
            </div>
        </div>
    </div>
    <?php get_footer(); ?>