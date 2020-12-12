<?php

require_once( 'config.php' );

$home_url              = 'http://' . $_SERVER['HTTP_HOST'];
$default_title         = 'Website Premium Themes';
$theme_found           = false;
$current_theme         = '';
$current_theme_url     = '';
$current_theme_buy_url = '';

if (check_https()) {
    $home_url = 'https://' . $_SERVER['HTTP_HOST'];
}

// Get current theme name
If ( isset( $_GET['theme'] ) ) {
    $current_theme = $_GET['theme'];
}

// Theme List
$themes = array(
    'theme1' => array(
        "id"      => "theme1",
        "name"	  => 'Theme 1',
        "url"     => "https://anthuanvasquez.net/",
        "preview" => $home_url . "/images/screenshot/blog.jpg",
        "type"    => "Blog",
        "cms"     => "WordPress",
        "shop"    => "https://audiojungle.net/user/oidoperfecto"
    ),
    'theme2' => array(
        "id"      => "theme2",
        "name"	  => 'Theme 2',
        "url"     => "https://anthuanvasquez.net/",
        "preview" => $home_url . "/images/screenshot/magento.jpg",
        "type"    => "e-Commerce",
        "cms"     => "Magento",
        "shop"    => "https://audiojungle.net/user/oidoperfecto"
    ),
);

if ( ! isset( $redirect ) ) :

    // Get current theme data
    foreach ( $themes as $theme_id => $theme ) {
        if ( $theme['id'] == $current_theme ) {
            $current_theme_name    = $theme['name'];
            $current_theme_url     = $theme['url'];
            $current_theme_buy_url = $theme['shop'];
            $theme_found           = true;

        }
    }

    // Set default title
    if ( true == $theme_found ) {
        $default_title = $current_theme_name;
    }

    // Set default URL
    if ( false == $theme_found ) {
        $current_theme_url = '#';
        $current_theme_buy_url = '#';
    }
?>
<!Doctype HTML>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="WordPress Premium Themes">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php printf( 'Premium WordPress Themes | %s', $default_title ); ?>
    </title>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Dancing+Script:400,700">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $home_url; ?>/css/main.css">
</head>
<body>
    <div class="switcher-wrap">
        <div class="container">
            <ul class="main-list clearfix">

                <!-- Logo -->
                <li class="logo">
                    <a href="/">Themes</a>
                </li>

                <!-- Themes -->
                <li class="themes theme-list">
                    <a href="#" class="btn btn-primary btn-blcok theme-select">
                        <?php
                            if ( $theme_found == false) {
                                echo "<i class='fa fa-bars'></i> Select a Theme...";
                            } else {
                                echo $current_theme_name;
                            }
                        ?>
                    </a>

                    <ul>
                        <?php
                            foreach ( $themes as $theme_id => $theme ) {
                                printf(
                                    '<li><a href="%1$s" class="preview" data-url="%2$s" data-shop="%3$s" data-name="%4$s">%4$s<span class="theme-type">%5$s</span></a></li>',
                                    $theme['preview'],
                                    $theme['url'],
                                    $theme['shop'],
                                    $theme['name'],
                                    $theme['type']
                                );
                            }
                        ?>
                    </ul>
                </li>

                <!-- Responsive Screens -->
                <li class="responsive">
                    <div class="responsive-devices">
                        <a class="desktop" href="#" title="Desktop"><i class="fa fa-desktop"></i></a>
                        <a class="tablet-land" href="#" title="Tablet Landscape (1024px)" ><i class="fa fa-tablet fa-rotate-270"></i></a>
                        <a class="tablet-port" href="#" title="Tablet Portrait (768px)" ><i class="fa fa-tablet"></i></a>
                        <a class="mobile-land" href="#" title="Mobile Landscape (480px)"><i class="fa fa-mobile fa-rotate-270"></i></a>
                        <a class="mobile-port" href="#" title="Mobile Portrait (320px)"><i class="fa fa-mobile"></i></a>
                    </div>
                </li>

                <!-- Purchase Item -->
                <li class="purchase">
                    <a class="btn btn-primary theme-purchase" href="<?php echo $current_theme_buy_url; ?>">
                        <i class='fa fa-shopping-cart'></i> Purchase
                    </a>
                </li>

                <!-- Remove Frame -->
                <li class="remove">
                    <a class="btn btn-primary theme-remove" href="<?php echo $current_theme_url; ?>">
                        <i class='fa fa-times'></i> Close
                    </a>
                </li>

            </ul>
        </div><!-- .container -->
    </div><!-- .switcher-wrapper -->

    <div class="view-wrap">
        <div class="device desktop">
            <iframe src="<?php if ( $theme_found != false ) { echo $current_theme_url; } ?>" frameborder="0" width="100%"></iframe>
        </div>
    </div><!-- .view-wrap -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="<?php echo $home_url; ?>/js/jquery.imageview.min.js"></script>
    <script src="<?php echo $home_url; ?>/js/main.min.js"></script>

</body>
</html>
<?php endif; ?>
