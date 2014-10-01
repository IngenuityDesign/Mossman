<?php get_header(); ?>

<div class="container">
    <div class="promote-layer jumbo">

        <div class="slider-item">
            <legend>Triathlon</legend>
            <div class="bottom">
                <div class="content">
                    <h3>Park City Mossman Triathlon</h3>
                    <h5>08.04.14 | 6:00a start</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla consectetur mi eu leo consequat, in aliquam nisl molestie. Sed pulvinar orci hendrerit ipsum molestie, ac ultricies ipsum tempus. Donec ac eros ac mauris imperdiet ictum.</p>
                </div>
            </div>
        </div>

        <!-- start template -->
        <div class="slider-item active">
            <legend>Triathlon</legend>
            <div class="bottom">
                <div class="content">
                    <h3>Park City Mossman Triathlon</h3>
                    <h5>08.04.14 | 6:00a start</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla consectetur mi eu leo consequat, in aliquam nisl molestie. Sed pulvinar orci hendrerit ipsum molestie, ac ultricies ipsum tempus. Donec ac eros ac mauris imperdiet ictum.</p>
                </div>
            </div>
        </div>
        <!-- end template -->

        <div class="slider-item">
            <legend>Triathlon</legend>
            <div class="bottom">
                <div class="content">
                    <h3>Park City Mossman Triathlon</h3>
                    <h5>08.04.14 | 6:00a start</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla consectetur mi eu leo consequat, in aliquam nisl molestie. Sed pulvinar orci hendrerit ipsum molestie, ac ultricies ipsum tempus. Donec ac eros ac mauris imperdiet ictum.</p>
                </div>
            </div>
        </div>


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
                    <?php for ($i = 0; $i < 3; $i++): ?>
                    <div class="column--thirds">
                        <?php mossman_make_calendar($i+1, 2014); ?>
                    </div>
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