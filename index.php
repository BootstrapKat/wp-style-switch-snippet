<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/style.css" />

        <?php $colorScheme = get_query_var( 'color_scheme', get_theme_mod('color_scheme_radio_setting') ) ?>

        <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/style-partials/<?php echo $colorScheme;?>.css" />

    </head>
    <body>
        <div class="color-change-bar"><p>Wow, you can change my color scheme! <a href="?color_scheme=red">red</a> <a href="?color_scheme=green">green</a> <a href="?color_scheme=blue">blue</a></p></div>
        <main class="wrapper">
            <div class="box">
                <h1 class="box-title">Yo.</h1>
            </div>    
        </main>
    </body>
</html>