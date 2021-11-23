<?php get_header(); ?>
<body <?php body_class(array("first","second","third")); ?>>
    <?php get_template_part('/template-parts/common/hero'); ?>
    <div class="posts text-center">
        <h1>
            posts In <?php 
                if(is_month()){
                    $month = get_query_var("monthnum");
                    $dateobj = DateTime::createFromFormat("!m",$month);
                    echo $dateobj->format("F");
                }elseif(is_year()){
                    echo esc_html(get_query_var("year"));
                }elseif(is_day()){
                    $day = esc_html(get_query_var("day"));
                    $month = esc_html(get_query_var("monthnum"));
                    $year = esc_html(get_query_var("year"));
                    printf("%s%s%s",$day,$month,$year);
                    //echo get_query_var("day")."/".get_query_var("monthnum")."/".get_query_var("year");
                }
            ?>
        </h1>
        <?php 
        while(have_posts()) {
            the_post();
         ?>
         <h2>
             <a href="<?php get_the_permalink();?>"><?php the_title();?></a>
         </h2>
         <?php    
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