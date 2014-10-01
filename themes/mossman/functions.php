<?php

/** [Constants] **/

define('MOSSMAN_THEME_URI', dirname(get_stylesheet_uri()));

/** [Theme Support] **/

add_theme_support( 'menus' ); //used in various locations
add_theme_support( 'post-thumbnails' );  //post thumbnail support

/** [Style and JS Hooks] **/

add_action( 'wp_enqueue_scripts', 'mossman_add_main_style');

function mossman_add_main_style() {
    wp_enqueue_style( 'main-css', get_stylesheet_uri() );
}

/** [Menu Registration] **/

add_action( 'init', 'mossman_add_navigation_menus' );

function mossman_add_navigation_menus() {
    register_nav_menus( array(
        'top' => "Top navigation",
        'footer' => "Footer navigation",
        'event' => "Event contextual navigation",
        'page'  => "Page contextual navigation"
    ) ); //menu used in primary
}

/** [/Menu Registration] **/

/** [Sidebar Registration] **/

add_action( 'init', 'mossman_register_sidebars' );

function mossman_register_sidebars() {
    register_sidebar(array(
        'name' => "Left Sidebar",
        'id' => 'left_sidebar',
        'before_widget' => '<aside id="%1$s" class="widget widget_%1$s pad">',
        'after_widget' => '</aside>',
        'before_title' => '<div class="widget-title"><span class="legend">',
        'after_title' => '</span></div>'));

    register_sidebar(array(
        'name' => "Right Sidebar",
        'id' => 'right_sidebar',
        'before_widget' => '<aside id="%1$s" class="widget widget_%1$s pad">',
        'after_widget' => '</aside>',
        'before_title' => '<div class="widget-title"><span class="legend">',
        'after_title' => '</span></div>'));
}

/** [Custom Post Types] **/

function mossman_register_event_type() {
    $event_labels = array(
        'singular_name' => 'Event',
        'menu_name' => 'Events',
        'name_admin_bar' => 'Event',
        'add_new' => "Add New",
        'add_new_item' => "Add New Event",
        'new_item' => "New Event",
        'edit_item' => "Edit Event",
        'view_item' => "View Event",
        'all_items' => "All Events",
        'search_items' => "Search Events",
        'parent_item_colon' => "Parent Events:",
        'not_found' => "No events found",
        'not_found_in_trash' => "No events found in the trash"
    );
    $event = array(
        'public' => true,
        'labels' => $event_labels,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'event' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'heirarchal'         => false,
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt')
    );
    register_post_type( 'event', $event  );
}
add_action( 'init', 'mossman_register_event_type' );

function mossman_event_help_tab() {

    $screen = get_current_screen();

    // Return early if we're not on the book post type.
    if ( 'event' != $screen->post_type )
        return;

    // Setup help tab args.
    $args = array(
        'id'      => 'mossman_event_help', //unique id for the tab
        'title'   => 'Help', //unique visible title for the tab
        'content' => '<h3>Event Help</h3><p>Because I have no skills yet</p>',  //actual help text
    );

    // Add the help tab.
    $screen->add_help_tab( $args );

}

add_action('admin_head', 'mossman_event_help_tab');

/** [/Sidebar Registration] **/

function mossman_make_calendar($month, $year) {
    $month = $month % 12; //make 11 the maximum
    $days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    $timestamp_of_first_day = strtotime(sprintf('01-%s-%s', $month, $year));
    $start = date('N', $timestamp_of_first_day);

    //name of month
    $name_of_month = date('F', $timestamp_of_first_day);
    ?>
    <table class="calendar" cols="7">
        <thead>
            <tr>
                <th colspan="7" class="header"><?php echo $name_of_month ?></th>
            </tr>
            <tr>
                <th>S</th>
                <th>M</th>
                <th>T</th>
                <th>W</th>
                <th>T</th>
                <th>F</th>
                <th>S</th>
            </tr>
        </thead>
        <tbody>
            <tr>
        <?php
        // Fun part
        for ($i = 1; $i < 43; $i++):
            if (($i - 1) % 7 == 0): ?>
                </tr><tr>
            <?php endif; ?>
            <?php if ($i <= $start || ($i - $start) > $days): ?>
                <td class="empty">&nbsp;</td>
            <?php else: ?>
                <td><?php echo $i - $start; ?></td>
            <?php endif;
        endfor; ?>
            </tr>
        </tbody>
    </table>
<?php

}
