<!doctype html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo wp_title(); ?></title>

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

    <!-- Page styles -->
    <?php wp_head(); ?>
</head>
<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=293784350643304&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<div class="header-bg">

</div>

<div class="header-wrapper">

    <button class="menu">
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
             viewBox="0 0 38.4 28.9" enable-background="new 0 0 38.4 28.9" xml:space="preserve">
                <g>
                    <path fill="#2F547F" d="M36.4,25.2H2c-1.1,0-2,0.8-2,1.9c0,1,0.9,1.9,2,1.9h34.4c1.1,0,2-0.8,2-1.9C38.4,26,37.5,25.2,36.4,25.2z"
                        />
                    <path fill="#2F547F" d="M36.4,12.6H2c-1.1,0-2,0.8-2,1.9s0.9,1.9,2,1.9h34.4c1.1,0,2-0.8,2-1.9S37.5,12.6,36.4,12.6z"/>
                    <path fill="#2F547F" d="M2,3.7h34.4c1.1,0,2-0.8,2-1.9c0-1-0.9-1.9-2-1.9H2C0.9,0,0,0.8,0,1.9C0,2.9,0.9,3.7,2,3.7z"/>
                </g>
            </svg>
    </button>

    <nav class="navdrawer-container promote-layer">
        <h4>Navigation</h4>
        <?php wp_nav_menu( array(
            'theme_location' => 'top',
            'container' => ''
        ) ); ?>
    </nav>

    <header class="app-bar promote-layer">
        <div class="app-bar-container">
            <h1 class="logo"><img src="<?php print MOSSMAN_THEME_URI ?>/public/images/logo.png" alt="Team Mossman"></h1>
        </div>
    </header>

</div>

<main>