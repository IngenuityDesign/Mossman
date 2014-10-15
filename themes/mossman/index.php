<?php get_header(); ?>

<div class="container">
    <div class="promote-layer jumbo flexslider">

        <ul class="slides">
            <?php
            $types = array('triathlons','runs','swims');
            $args = array(
                'posts_per_page'   => 1,
                'event_type'       => 'triathlons',
                'orderby'          => 'post_date',
                'post_type'        => 'event',
                'post_status'      => 'publish',
                'suppress_filters' => true );
            foreach ($types as $type) {
                $args['event_type'] = $type;
                $posts = get_posts($args);
                if ($posts[0]): $post = $posts[0]; ?>
                    <li class="slider-item">
                        <a href="<?php the_permalink($post->ID); ?>">
                        <legend><?php echo rtrim(ucwords($type), 's'); ?></legend>
                        <div class="bottom">
                            <div class="content">
                                <h3><?php echo $post->post_title; ?></h3>
                                <h5><?php printf("%s | %s start", get_field( "race_date", $post->ID ), get_field( "race_time", $post->ID )) ?></h5>
                                <p><?php echo $post->post_excerpt ? $post->post_excerpt : $post->post_content; ?></p>
                            </div>
                        </div>
                        </a>
                    </li>
                <?php endif;
            }
            ?>

        </ul> <!-- /slides -->

    </div>
</div>

<div class="container">
<div class="row">
<!-- rows -->
    <div class="column--thirds first--column column">
        <?php get_sidebar('left'); ?>
    </div>

    <div class="column--thirds second--column column main-content events">

        <article class="pad">
            <div><h2 class="legend"><span>Events</span></h2></div>
                <!-- we could use google scaffolding here but i dont know if theres much of a reason -->

                <div class="row flow">
                    <?php for ($i = 1; $i <= 12; $i++): ?>
                    <div class="column--thirds">
                        <?php mossman_make_calendar($i, 2014, mossman_get_events()); ?>
                    </div>
                    <?php if ($i%3 == 0): ?>
                    </div><div class="row flow">
                    <?php endif; ?>

                    <?php endfor; ?>
                </div>

        </article>
    <!-- calendar template -->

    </div>

    <div class="column--thirds last third--column column">
        <?php get_sidebar('right'); ?>
    </div>
<!-- /row -->
</div>



<!-- end -->

</div>

<?php get_footer(); ?>