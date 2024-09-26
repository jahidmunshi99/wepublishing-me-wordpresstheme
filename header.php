<?php
/**
 * This Page Displaying for the Header
 */
?>

<!DOCTYPE html>
<html lang=" <?php language_attributes() ?> " class="no-js">
<head>
    <meta charset=" <?php bloginfo( 'charset' ) ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
</head>
<body <?php body_class() ?> >
    <?php
    if( function_exists ('wp_body_open')):
        wp_body_open(  );
    endif;
    ?>
<!-- <div id="page" class="site">
    <a clss="skip-link screen-reader-text" href="#content"> <?php esc_html_e('Skip to content', 'event') ?></a> -->
    <!-- Masterhead =================================-->
    <header id="masterhead" class="site-header" role="banner">
        <!-- Top Header -->
        <div class="top-header">
            <div class="container clearfix">
                <?php
                    if( is_active_sidebar( 'wepublishingme_header_info' )){
                        dynamic_sidebar( 'wepublishingme_header_info' );
                    }
                    echo '<div class="header-social-block">';
                        do_action( 'social_links' );
                    echo '</div>';
                ?>
            </div> <!-- end container -->
        </div> <!-- end top header -->
        <!-- Main Header -->
        <div id="sticky_header" class="clearfix">
            <div class="container clearfix">
                <?php do_action( 'wepublishingme_site_branding' ) ?>
                
                <!-- Main nav ========================= -->
                <?php
                    if( has_nav_menu( 'primary' )){
                        $args = [
                            'theme_location' => 'primary',
                            'container' => '',
                            'items_wrap' => '<ul id="primary-menu" class="menu nav-menu">%3$s</ul>'
                        ];
                        ?>
                        <nav id="site-navigation" class="main-navigation clearfix">
                            <button class="menu-toggle" type="button" aria-controls="primary-menu" aria-expanded="false">
                                <span class="line-one"></span>
                                <span class="line-two"></span>
                                <span class="line-three"></span>
                            </button> <!-- toggle button end -->
                            <?php wp_nav_menu( $args ) //extract the content from apperance-> nav menu ?>
                        </nav> <!-- end site navigation -->
                    <?php 
                    }else{
                        '<nav id="site-navigation" class="main-navigation clearfix">';
                            wp_page_menu( array(
                                'menu_class' => 'menu',
                                'items_wrap' => '<ul id="primary-menu" class="menu nav-menu">%3$s</ul>'
                            ) );
                        '</nav>';
                    } ?>
            </div><!-- end container -->
        </div> <!-- end stricky header -->
    </header>
    <!-- Main Page Start ============================== -->
     <div id="content">
        <div class="container clearfix">
<!-- <?php
 /**
  * Those divs goes on the footer page and where there are closed
  */
       ' </div> <!-- end container -->
     </div> <!--end main page -->
</div> <!-- End Starting Div -->
</body>
</html>'
?> -->