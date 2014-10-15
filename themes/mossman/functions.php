<?php

/** [Constants] **/

define('MOSSMAN_THEME_URI', dirname(get_stylesheet_uri()));
define('MOSSMAN_THEME_VERSION', 1);

/** [Theme Support] **/

add_theme_support( 'menus' ); //used in various locations
add_theme_support( 'post-thumbnails' );  //post thumbnail support

/** [Style and JS Hooks] **/

add_action( 'wp_enqueue_scripts', 'mossman_add_main_style');

function mossman_add_main_style() {
    wp_enqueue_style( 'main-css', get_stylesheet_uri() );
}

add_action( 'wp_enqueue_scripts', 'mossman_add_js' );

function mossman_add_js() {

    wp_enqueue_script( 'modernizr', MOSSMAN_THEME_URI . '/public/scripts/modernizr.min.js', array(), MOSSMAN_THEME_VERSION );
    wp_enqueue_script( 'respond', MOSSMAN_THEME_URI . '/public/scripts/respond.min.js', array(), MOSSMAN_THEME_VERSION );
    wp_enqueue_script( 'imagesloaded', MOSSMAN_THEME_URI . '/public/scripts/imagesloaded.pkg.min.js', array(), MOSSMAN_THEME_VERSION, true);
    wp_enqueue_script( 'qtip', MOSSMAN_THEME_URI . '/public/scripts/jquery.qtip.min.js', array( 'jquery' ), MOSSMAN_THEME_VERSION, true);
    wp_enqueue_script( 'holder', MOSSMAN_THEME_URI . '/public/scripts/holder.js', array(), MOSSMAN_THEME_VERSION, true);
    wp_enqueue_script( 'main-js', MOSSMAN_THEME_URI . '/public/scripts/main.js', array( 'jquery' ), MOSSMAN_THEME_VERSION, true);

    wp_enqueue_script( 'flexslider', MOSSMAN_THEME_URI . '/public/scripts/jquery.flexslider-min.js', array( 'jquery' ), MOSSMAN_THEME_VERSION, true );
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
        'before_title' => '<h3 class="widget-title legend"><span>',
        'after_title' => '</span></h3>'));

    register_sidebar(array(
        'name' => "Right Sidebar",
        'id' => 'right_sidebar',
        'before_widget' => '<aside id="%1$s" class="widget widget_%1$s pad">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="legend widget-title"><span>',
        'after_title' => '</span></h3>'));
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
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'taxonomies'         => array('event_type')
    );
    $cat_labels = array(
        'name'              => _x( 'Event Types', 'Event Types' ),
        'singular_name'     => _x( 'Event Type', 'Event Type' ),
        'search_items'      => __( 'Search Event Types' ),
        'all_items'         => __( 'All Event Types' ),
        'parent_item'       => __( 'Parent Event Type' ),
        'parent_item_colon' => __( 'Parent Event Type:' ),
        'edit_item'         => __( 'Edit Event Type' ),
        'update_item'       => __( 'Update Event Type' ),
        'add_new_item'      => __( 'Add New Event Type' ),
        'new_item_name'     => __( 'New Event Type Name' ),
        'menu_name'         => __( 'Event Type' ),
    );

    $cat = array(
        'hierarchical'      => true,
        'labels'            => $cat_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'event_type' ),
    );

    register_taxonomy( 'event_type', 'post', $cat);
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

function mossman_make_calendar($month, $year, $events=false) {
    $month = $month % 13; //make 12 the maximum
    $days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    $timestamp_of_first_day = strtotime(sprintf('01-%s-%s', $month, $year));
    $start = date('N', $timestamp_of_first_day);

    //name of month
    //$year_end = preg_replace("#^20#", "", $year);
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
        for ($i = 1; $i < 43; $i++): $date = $i - $start;
            if (($i - 1) % 7 == 0): ?>
                </tr><tr>
            <?php endif; ?>
            <?php if ($i <= $start || $date > $days): ?>
                <td class="empty">&nbsp;</td>
            <?php else: ?>
                <?php
                $class = '';
                  if ($events) {
                      //lets create the string
                      $keystring = sprintf('%02d.%02d.%s', $month, $date, $year);
                      if (array_key_exists($keystring, $events)) {
                          $the_event = $events[$keystring];
                          //we have an event
                          $class = 'active';
                          $desc = sprintf("%s | %s start", $the_event['date'], $the_event['time']);
                          $date = sprintf('<a style="color: white;" href="%s" title="%s" data-desc="%s">%s</a>', $the_event['link'], $the_event['title'], $desc, $date);
                      }
                  }
                ?>
                <td class="<?php echo $class; ?>"><?php echo $date ?></td>
            <?php endif;
        endfor; ?>
            </tr>
        </tbody>
    </table>
<?php

}

function mossman_need_acf_login_error() {
    global $error;

    $error = "Mossman theme needs Advanced Custom Fields to work correctly. Please enable it.";

}
if (!function_exists('get_fields'))
    add_action('login_head', 'mossman_need_acf_login_error');

if (!is_admin() && !function_exists('get_fields') && !in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'))) {
    //Redirect to login and display a toast
    auth_redirect();
}

function mossman_get_events() {
    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'event',
        'suppress_filters' => true
    );

    $posts = get_posts($args);

    //title, time, link, and date

    $events = array();

    foreach($posts as $post) {
        $id = $post->ID;
        $title = $post->post_title;

        $date = get_field( "race_date", $id);
        $time = get_field( "race_time", $id);
        $link = get_permalink( $id );

        list($month,$day,$year) = explode('.', $date);
        $month = intval($month);
        $day = intval($day);
        $year = intval($year);

        $events[$date] = array(
            'title' => $title,
            'date' => $date,
            'time' => $time,
            'link' => $link,
            'month' => $month,
            'day' => $day,
            'year' => $year
        );

    }

    return $events;

}