<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/style.css" />

        <?php 
            // Check if the 'color_scheme' parameter exists in the request
            if( isset($_GET['color_scheme'])) {
                // If it is, set the color scheme from the parameter
                $colorScheme = $_GET['color_scheme'];
            } else {
                // Otherwise use the value from the customizer
                $colorScheme = get_theme_mod('color_scheme_radio_setting');
            }
            //$colorScheme = get_query_var( 'color_scheme', get_theme_mod('color_scheme_radio_setting') ); 
            // If we use get_query_var() Wordpress tries to process the new url and winds up leaving the static front page.
            
        ?>

        <link 
            rel="stylesheet" 
            type="text/css" 
            href="<?php bloginfo('stylesheet_directory'); ?>/style-partials/<?php echo $colorScheme;?>.css" />

    </head>
    <body>
        <div class="color-change-bar">
            <p>Wow, you can change my color scheme! 
                <a href="?color_scheme=red">red</a>
                <a href="?color_scheme=green">green</a>
                <a href="?color_scheme=blue">blue</a>
            </p>
        </div>
        <main class="wrapper">
            <div class="box">
                <h1 class="box-title">Yo.</h1>
            </div>    
        </main>
        <div>
            <?php do_action( 'cws_content' ); ?>
        </div>
        <div>
            <h2>Have some links:</h2>
            <ul>
            <?php 
                $defaults = array(
                    array(
                        'link_text' => esc_attr__( 'Home', 'textdomain' ),
                        'link_url'  => '33',
                    )
                );

                $quickLinks = get_theme_mod('ws_quicklinks_settings', $defaults);
                foreach( $quickLinks as $link ) {
                    ?>

                    <li>
                        <a href="<?php echo get_permalink($link['link_url']);?>">
                            <?php echo $link['link_text']; ?>
                        </a>
                    </li>

                    <?php 
                }
            ?>

            </ul>

            
    </body>
</html>