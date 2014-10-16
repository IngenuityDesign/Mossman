<?php get_header(); ?>
    <div class="header">
        <div class="container">
            <div class="promote-layer">

                <div class="column--left sidenav page--sidenav">

                    <div class="left-right">
                        <div class="left">
                            <?php wp_nav_menu( array(
                                'theme_location' => 'page_left',
                                'container' => ''
                            ) ); ?>
                        </div>
                        <div class="right">
                            <?php wp_nav_menu( array(
                                'theme_location' => 'page_right',
                                'container' => ''
                            ) ); ?>
                        </div>
                    </div>

                </div>

                <div class="column--right image">
                    <img src="<?php print MOSSMAN_THEME_URI ?>/public/images/headers/triathlon.png" alt="">
                </div>


            </div>
        </div>
    </div>

    <div class="container main-container event">
        <div class="row">
            <!-- rows -->
            <div class="column--thirds first--column column">
                <?php get_sidebar(); ?>
            </div>

            <div class="column--right main-content event">
                <article class="pad">
                    <?php the_post(); ?>

                    <header>
                        <div><span class="legend"><?php the_title(); ?></span></div>
                    </header>

                    <?php the_content(); ?>

                </article>

            </div>
            <!-- /row -->
        </div>



        <!-- end -->

    </div>
<?php get_footer(); ?>