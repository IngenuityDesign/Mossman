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
                <img src="/images/headers/triathlon.png" alt="">
            </div>


        </div>
    </div>
</div>

<div class="container main-container">
    <div class="row">
        <!-- rows -->
        <?php get_sidebar(); ?>
        <div class="column--right main-content event">
            <article class="pad">

                <?php the_content(); ?>

            </article>

        </div>
        <!-- /row -->
    </div>



    <!-- end -->

</div>
<?php get_footer(); ?>