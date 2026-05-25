<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CT_Custom
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ct-custom' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$ct_custom_description = get_bloginfo( 'description', 'display' );
			if ( $ct_custom_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $ct_custom_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'ct-custom' ); ?></button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
<?php
/**
 * Header Template
 *
 * @package CT_Custom
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo('charset'); ?>" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta name="description" content="Get in touch with us. Find our contact form, address, phone, fax, and social media links." />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<!-- TOPBAR -->

<div class="topbar">

    <div class="topbar-inner">

        <p class="topbar-phone">
            Call Us Now:
            <span><?php echo get_option('phone_number', '385.154.11.28.35'); ?></span>
        </p>

        <div class="topbar-auth">

            <a href="#">Login</a>

            <span class="divider">|</span>

            <a href="#">Signup</a>

        </div>

    </div>

</div>

<!-- HEADER -->

<header class="header">

    <div class="header-inner">

        <!-- LOGO -->

        <a href="<?php echo esc_url(home_url('/')); ?>" class="logo" aria-label="Homepage">

            <?php if (get_option('site_logo')) : ?>
                <img src="<?php echo esc_url(get_option('site_logo')); ?>" alt="<?php bloginfo('name'); ?>">
            <?php else : ?>
                <span class="logo-prefix">Your</span>
                <span class="logo-suffix">Logo</span>
            <?php endif; ?>

        </a>

        <!-- NAVIGATION -->

        <nav class="main-nav" aria-label="Primary navigation">

            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary_menu',
                'container' => false,
                'menu_class' => 'main-menu'
            ));
            ?>

        </nav>

        <!-- MOBILE TOGGLE -->

        <button class="menu-toggle" id="mobileToggle" aria-label="Toggle navigation">

            <span></span>
            <span></span>
            <span></span>

        </button>

    </div>



    <nav class="mobile-menu" id="mobileMenu">

        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary_menu',
            'container' => false,
        ));
        ?>

    </nav>

</header>