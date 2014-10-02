<?php get_header(); ?>
    <div class="header">
        <div class="container">
            <div class="promote-layer">

                <div class="column--left sidenav">

                    <div class="left-right">
                        <div class="left">
                            <ul>
                                <li><a href="#">Key Info</a></li>
                                <li><a href="#">Register</a></li>
                                <li><a href="#">Race Day</a></li>
                                <li><a href="#">Rules &amp; Safety</a></li>
                            </ul>
                        </div>
                        <div class="right">
                            <ul>
                                <li><a href="#">Travel</a></li>
                                <li><a href="#">Results</a></li>
                                <li><a href="#">Photos</a></li>
                                <li><a href="#">Volunteer</a></li>
                            </ul>
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
                        <?php
                        $registration = get_field('race_registration_link');
                        if ($registration): ?>
                        <div class="register">

                            <a href="<?php echo $registration ?>" class="button--secondary button">Register</a>
                        </div>
                        <?php endif; ?>

                        <h2><?php the_title(); ?></h2>
                        <h4><?php printf("%s | %s start", get_field( "race_date" ), get_field( "race_time" )); ?></h4>
                        <h4><?php echo get_field("race_location"); ?></h4>

                    </header>

                    <hr>

                    <?php the_content(); ?>

                </article>

            </div>
            <!-- /row -->
        </div>



        <!-- end -->

    </div>
<?php get_footer(); ?>