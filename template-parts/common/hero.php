<div class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php if(current_theme_supports("custom-logo")):?>
                    <div class="header-logo text-center">
                        <?php the_custom_logo();?>
                    </div>
                    <?php endif;?>
                    <h3 class="tagline"><?php bloginfo("description");?></h3>
                    <h1 class="align-self-center text-center display-2 heading">
                        <a href="<?php echo site_url(); ?>"><?php bloginfo("name");?></a>
                    </h1>
                </div>
                <div id= "main-nav" class="col-md-12  offset-md-4">
                    <?php wp_nav_menu(array(
                        'theme_location'=>'primary_menu',
                        'menu_id'=>'main-nav'
                    ));?>
                </div>
    <!-- <nav id="main-nav">
    <div class="container">
        <div class="logo-holder">
            <a href="#"><img src="img/100-logo.png" alt="" ></a>
        </div>
        <i id="menu-toggle" class="fas fa-bars"></i>
        <ul class="menu">
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Portfolio</a></li>
            <li class="menu-item-has-children">
            <a href="#">Elements</a>
                <ul class="sub-menu">
                    <li><a href="#">Text Formating</a></li>
                    <li><a href="#">Text Formating</a></li>
                    <li><a href="#">Text Formating</a></li>
                    <li><a href="#">Text Formating</a></li>
                    <li><a href="#">Text Formating</a></li>
                </ul>
            </li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Jquery</a></li>
        </ul>
    </div>
</nav> -->
            </div>
        </div>
    </div>