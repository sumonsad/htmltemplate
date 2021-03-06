<?php get_header(); ?>
<body <?php body_class(array("first","second","third")); ?>>
    <?php get_template_part('/template-parts/common/hero'); ?>
    <div class="posts">
        <?php 
        while(have_posts()) {
            the_post();
         get_template_part("post-formats/content",get_post_format());   
        }
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