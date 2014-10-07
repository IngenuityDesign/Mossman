<?php get_header(); ?>

<div class="container">
    <div class="promote-layer jumbo flexslider">

        <ul class="slides">

            <li class="slider-item">
                <legend>Triathlon 1</legend>
                <div class="bottom">
                    <div class="content">
                        <h3>Park City Mossman Triathlon</h3>
                        <h5>08.04.14 | 6:00a start</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla consectetur mi eu leo consequat, in aliquam nisl molestie. Sed pulvinar orci hendrerit ipsum molestie, ac ultricies ipsum tempus. Donec ac eros ac mauris imperdiet ictum.</p>
                    </div>
                </div>
            </li>

            <!-- start template -->
            <li class="slider-item">
                <legend>Triathlon 2</legend>
                <div class="bottom">
                    <div class="content">
                        <h3>Park City Mossman Triathlon</h3>
                        <h5>08.04.14 | 6:00a start</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla consectetur mi eu leo consequat, in aliquam nisl molestie. Sed pulvinar orci hendrerit ipsum molestie, ac ultricies ipsum tempus. Donec ac eros ac mauris imperdiet ictum.</p>
                    </div>
                </div>
            </li>
            <!-- end template -->

            <li class="slider-item">
                <legend>Triathlon 3</legend>
                <div class="bottom">
                    <div class="content">
                        <h3>Park City Mossman Triathlon</h3>
                        <h5>08.04.14 | 6:00a start</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla consectetur mi eu leo consequat, in aliquam nisl molestie. Sed pulvinar orci hendrerit ipsum molestie, ac ultricies ipsum tempus. Donec ac eros ac mauris imperdiet ictum.</p>
                    </div>
                </div>
            </li>

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
            <div><span class="legend">Events</span></div>
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