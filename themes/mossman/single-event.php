<?php get_header(); ?>
    <?php $registration = get_field('race_registration_link'); ?>
    <div class="header">
        <div class="container">
            <div class="promote-layer">

                <div class="column--left sidenav">

                    <div class="left-right">
                        <div class="left">
                            <ul>
                                <li><a id="nav-key-info" href="#keyinfo">Key Info</a></li>
                                <li><a target="_blank" href="<?php echo $registration ? $registration : 'javascript:void(0);'; ?>">Register</a></li>
                                <li><a id="nav-race-day" href="#raceday">Race Day</a></li>
                                <li><a id="nav-rules-safety" href="#rules">Rules &amp; Safety</a></li>
                            </ul>
                        </div>
                        <div class="right">
                            <ul>
                                <li><a id="nav-travel" href="#travel">Travel</a></li>
                                <li><a target="_blank" href="<?php the_field('event_results_link'); ?>">Results</a></li>
                                <li><a id="nav-photos-show" href="#photos">Photos</a></li>
                                <li><a <?php $x = get_field('event_volunteer_link'); if ($x && !stristr($x, 'mailto')) echo 'target="_blank" '; ?>href="<?php the_field('event_volunteer_link'); ?>">Volunteer</a></li>
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="column--right image">
                    <img src="<?php print MOSSMAN_THEME_URI ?>/public/images/headers/triathlon.png" alt="">
                </div>

                <div class="mobile--header">
                    <div class="mobile--image" style="background-image: url('<?php print MOSSMAN_THEME_URI ?>/public/images/headers/triathlon.png');">

                    </div>
                    <div class="menu">
                        <ul>
                            <li><a id="nav-key-info" href="#keyinfo">Key Info</a></li>
                            <li><a target="_blank" href="<?php echo $registration ? $registration : 'javascript:void(0);'; ?>">Register</a></li>
                            <li><a id="nav-race-day" href="#raceday">Race Day</a></li>
                            <li><a id="nav-rules-safety" href="#rules">Rules &amp; Safety</a></li>
                            <li><a id="nav-travel" href="#travel">Travel</a></li>
                            <li><a target="_blank" href="<?php the_field('event_results_link'); ?>">Results</a></li>
                            <li><a id="nav-photos-show" href="#photos">Photos</a></li>
                            <li><a <?php $x = get_field('event_volunteer_link'); if ($x && !stristr($x, 'mailto')) echo 'target="_blank" '; ?>href="<?php the_field('event_volunteer_link'); ?>">Volunteer</a></li>
                        </ul>
                    </div>
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
                <?php the_post(); ?>
                <article class="pad key-info panel">

                    <header>
                        <?php


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

                    <section class="subsection info">

                        <h3>Key Info</h3>
                        <?php the_field('event_key_info_content'); ?>

                        <?php if (have_rows('event_key_info_fees')): ?>
                        <h4>Fees</h4>
                        <div class="stackable-grid">

                            <?php while ( have_rows('event_key_info_fees') ) : the_row(); ?>
                                <div class="grid-item grid-item-4">
                                    <h5><?php the_sub_field('event_key_info_fees_title'); ?></h5>
                                    <?php echo (get_sub_field('event_key_info_fees_content')); ?>
                                </div>

                            <?php endwhile; ?>

                        </div>

                        <?php the_field('event_key_info_under_fees'); ?>

                        <?php endif; ?>

                        <section class="maps">
                            <?php if (have_rows('event_map_my_run_section')): $i = 0; ?>
                                <div class="keys">
                                    <ul class="navtabs">
                                        <?php while (have_rows('event_map_my_run_section')): the_row(); ?>
                                            <li<?php if ($i == 0) echo ' class="active"' ?>><a href="javascript: void(0);" data-shows="<?php echo $i; ?>"><?php the_sub_field('event_map_my_run_title'); ?></a></li>
                                            <?php $i++; ?>
                                        <?php endwhile; ?>
                                    </ul>
                                </div>
                                <div class="viewport">
                                    <div class="viewport-wrapper">
                                        <ul class="views">
                                            <?php $i = 0; ?>
                                            <?php while (have_rows('event_map_my_run_section')): the_row(); ?>
                                                <li class="view view-<?php echo $i++; ?>">
                                                    <p><?php the_sub_field('event_map_my_run_content'); ?></p>
                                                    <div class="clearfix">
                                                        <?php the_sub_field('event_map_my_run_gallery'); ?>
                                                    </div>
                                                </li>
                                            <?php endwhile; ?>
                                        </ul>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </section>
                        <!-- .maps -->

                    </section> <!-- info -->

                    <?php
                        $fields = array('event_race_day', 'event_rules_safety', 'event_travel');
                        $classes = array('race-day', 'rules-safety', 'travel');
                        $titles = array('Race Day', 'Rules &amp; Safety', 'Travel');
                        foreach($fields as $k=>$name):
                            if ($x = get_field($name)): ?>
                            <section class="subsection <?php echo $name; ?> <?php echo $classes[$k] ? $classes[$k] : ''?>">
                            <h3><?php echo $titles[$k]; ?></h3>
                            <?php echo $x; ?>
                            </section>
                            <?php endif;
                        endforeach;
                    ?>
                    <?php $gallery = get_field('event_gallery'); ?>

                    <section class="subsection gallery panel">
                        <h3>Event Photos</h3>
                        <?php if ($gallery): ?>
                            <!-- Place somewhere in the <body> of your page -->
                            <div class="flexslider gallery" style="margin-top: 15px;">
                                <ul class="slides">
                                    <?php foreach($gallery as $image): ?>
                                        <li data-thumb="<?php echo $image['url']; ?>">
                                            <img src="<?php echo $image['url']; ?>" />
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php else: ?>
                            <p>There are no photos to display.</p>
                        <?php endif; ?>
                    </section>

                    <?php if (get_field('event_show_usa_tri_logo')): ?>
                    <section class="triathlon-logo">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/public/images/usa.jpg" alt="USA Tri" />
                    </section>
                    <?php endif; ?>

                    <hr />

                    <?php
                    $sponsors = get_field('event_sponsors');
                    ?>

                    <section class="sponsors">
                        <h3>Thanks to our sponsors</h3>
                        <div class="grid--5">
                        <?php
                        foreach($sponsors as $k => $sponsor):
                            $src = get_stylesheet_directory_uri() . '/public/images/sponsors/' . mossman_nicify_sponsor($sponsor, '.png');
                            ?><div class="grid--item-1">
                            <img src="<?php echo $src; ?>" alt="<?php echo $sponsor; ?>">
                            </div><?php
                        endforeach;
                        ?>
                        </div> <!-- /grid--5 -->

                    </section>

                </article>


            </div>
            <!-- /row -->
        </div>



        <!-- end -->

    </div>
<?php get_footer(); ?>