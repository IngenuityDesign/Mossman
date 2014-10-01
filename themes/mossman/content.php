<?php if (is_single()): ?>

    <h4 class="post-meta-date"><?php the_date(); ?></h4>
    <h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
    <div class="post-meta-wrapper clearfix">

        <?php paypal_get_likes_and_author() ?>

    </div>
    <?php the_content('', TRUE); ?>

<?php else: ?>

    <?php if (is_main_query()): ?>

        <?php if (has_post_thumbnail()): ?>
            <a href="<?php the_permalink(); ?>"<?php if (get_post_format() == "link") echo ' target="_blank"'; ?>>
                <figure class="thumbnail">
                    <?php the_post_thumbnail('big_preview', array(
                        'class' => 'img-responsive'
                    )); ?>
                </figure>
            </a>
        <?php endif; ?>

        <h3><a href="<?php the_permalink(); ?>"<?php if (get_post_format() == "link") echo ' target="_blank"'; ?>><?php the_title();?></a></h3>
        <?php the_content("Read more."); ?>

        <?php paypal_get_likes_and_author() ?>

    <?php else: ?>

        <li class="media">
            <a href="<?php the_permalink(); ?>">
                <?php if (has_post_thumbnail()): ?>
                    <figure class="thumbnail media-object pull-left">
                        <?php the_post_thumbnail('avg_thumbnail', array(
                            'class' => 'img-responsive'
                        )); ?>
                    </figure>
                <?php endif; ?>
                <div class="media-body">
                    <h4 class="media-heading post-title"><?php the_title();?></h4>
                    <h5 class="author"><?php the_author() ?></h5>
                </div>
            </a>
        </li>

    <?php endif; ?>

<?php endif; ?>