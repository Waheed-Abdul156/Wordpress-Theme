<?php
/**
 * CT Custom functions and definitions
 *
 * @package CT_Custom
 */

if ( ! function_exists( 'ct_custom_setup' ) ) :

	function ct_custom_setup() {

		/*
		 * Theme Translation
		 */
		load_theme_textdomain( 'ct-custom', get_template_directory() . '/languages' );

		/*
		 * Default Features
		 */
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		/*
		 * HTML5 Support
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/*
		 * Custom Background
		 */
		add_theme_support(
			'custom-background',
			apply_filters(
				'ct_custom_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		/*
		 * Custom Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		/*
		 * Refresh Widgets
		 */
		add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		 * Register Menus
		 */
		register_nav_menus(
			array(
				'primary-menu' => esc_html__( 'Primary Menu', 'ct-custom' ),
			)
		);
	}

endif;

add_action( 'after_setup_theme', 'ct_custom_setup' );

/**
 * Content Width
 */
function ct_custom_content_width() {

	$GLOBALS['content_width'] = apply_filters( 'ct_custom_content_width', 640 );

}

add_action( 'after_setup_theme', 'ct_custom_content_width', 0 );

/**
 * Enqueue Styles and Scripts
 */
function coalition_assets() {

	/*
	 * Main CSS
	 */
	wp_enqueue_style(
		'main-style',
		get_template_directory_uri() . '/assets/css/style.css',
		array(),
		filemtime( get_template_directory() . '/assets/css/style.css' )
	);

	/*
	 * Google Fonts
	 */
	wp_enqueue_style(
		'google-fonts',
		'https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap',
		array(),
		null
	);

	/*
	 * Font Awesome
	 */
	wp_enqueue_style(
		'font-awesome',
		'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css',
		array(),
		'6.5.0'
	);

	/*
	 * Main JS
	 */
	wp_enqueue_script(
		'main-js',
		get_template_directory_uri() . '/assets/js/main.js',
		array(),
		filemtime( get_template_directory() . '/assets/js/main.js' ),
		true
	);

	/*
	 * Comment Reply
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {

		wp_enqueue_script( 'comment-reply' );

	}
}

add_action( 'wp_enqueue_scripts', 'coalition_assets' );

/**
 * Register Sidebar
 */
function ct_custom_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'ct-custom' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'ct-custom' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

}

add_action( 'widgets_init', 'ct_custom_widgets_init' );

/**
 * Theme Settings Page
 */
function coalition_theme_menu() {

	add_menu_page(
		'Theme Settings',
		'Theme Settings',
		'manage_options',
		'theme-settings',
		'coalition_settings_page'
	);

}

add_action( 'admin_menu', 'coalition_theme_menu' );

/**
 * Register Theme Settings
 */
function coalition_register_settings() {

	register_setting( 'coalition_settings_group', 'phone_number' );
	register_setting( 'coalition_settings_group', 'address_info' );
	register_setting( 'coalition_settings_group', 'fax_number' );
	register_setting( 'coalition_settings_group', 'site_logo' );
	register_setting( 'coalition_settings_group', 'facebook_link' );
	register_setting( 'coalition_settings_group', 'twitter_link' );
	register_setting( 'coalition_settings_group', 'linkedin_link' );

}

add_action( 'admin_init', 'coalition_register_settings' );

/**
 * Theme Settings Page HTML
 */
function coalition_settings_page() {
?>

<div class="wrap">

	<h1>Theme Settings</h1>

	<form method="post" action="options.php">

		<?php settings_fields( 'coalition_settings_group' ); ?>

		<table class="form-table">

			<tr>
				<th>Phone Number</th>

				<td>
					<input
						type="text"
						name="phone_number"
						value="<?php echo esc_attr( get_option( 'phone_number' ) ); ?>"
						class="regular-text"
					>
				</td>
			</tr>

			<tr>
				<th>Address Information</th>

				<td>
					<textarea
						name="address_info"
						rows="5"
						class="large-text"
					><?php echo esc_textarea( get_option( 'address_info' ) ); ?></textarea>
				</td>
			</tr>

			<tr>
				<th>Fax Number</th>

				<td>
					<input
						type="text"
						name="fax_number"
						value="<?php echo esc_attr( get_option( 'fax_number' ) ); ?>"
						class="regular-text"
					>
				</td>
			</tr>

			<tr>
				<th>Logo URL</th>

				<td>
					<input
						type="text"
						name="site_logo"
						value="<?php echo esc_attr( get_option( 'site_logo' ) ); ?>"
						class="large-text"
					>
				</td>
			</tr>

			<tr>
				<th>Facebook Link</th>

				<td>
					<input
						type="text"
						name="facebook_link"
						value="<?php echo esc_attr( get_option( 'facebook_link' ) ); ?>"
						class="large-text"
					>
				</td>
			</tr>

			<tr>
				<th>Twitter Link</th>

				<td>
					<input
						type="text"
						name="twitter_link"
						value="<?php echo esc_attr( get_option( 'twitter_link' ) ); ?>"
						class="large-text"
					>
				</td>
			</tr>

			<tr>
				<th>LinkedIn Link</th>

				<td>
					<input
						type="text"
						name="linkedin_link"
						value="<?php echo esc_attr( get_option( 'linkedin_link' ) ); ?>"
						class="large-text"
					>
				</td>
			</tr>

		</table>

		<?php submit_button(); ?>

	</form>

</div>

<?php
}

/**
 * Additional Theme Files
 */
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';

if ( defined( 'JETPACK__VERSION' ) ) {

	require get_template_directory() . '/inc/jetpack.php';

}

if ( class_exists( 'WooCommerce' ) ) {

	require get_template_directory() . '/inc/woocommerce.php';

}
add_theme_support('menus');

register_nav_menus(array(
    'primary_menu' => 'Primary Menu'
));

add_action('admin_menu', 'cts_theme_settings');

function cts_theme_settings() {

    add_menu_page(
        'Theme Settings',
        'Theme Settings',
        'manage_options',
        'cts-theme-settings',
        'cts_theme_settings_page'
    );

}

add_action('admin_init', 'cts_register_settings');

function cts_register_settings() {

    register_setting('cts_settings_group', 'site_logo');

    register_setting('cts_settings_group', 'phone_number');

    register_setting('cts_settings_group', 'address_information');

    register_setting('cts_settings_group', 'fax_number');

    register_setting('cts_settings_group', 'facebook_link');

    register_setting('cts_settings_group', 'twitter_link');

    register_setting('cts_settings_group', 'linkedin_link');

}


function cts_theme_settings_page() {
?>

<div class="wrap">

    <h1>Theme Settings</h1>

    <form method="post" action="options.php">

        <?php settings_fields('cts_settings_group'); ?>

        <table class="form-table">

            <!-- LOGO -->
            <tr>

                <th>Logo</th>

                <td>

                    <input
                        type="text"
                        id="site_logo"
                        name="site_logo"
                        value="<?php echo get_option('site_logo'); ?>"
                    >

                    <button class="button upload_logo_button">
                        Upload Logo
                    </button>

                </td>

            </tr>

            <!-- PHONE -->
            <tr>

                <th>Phone Number</th>

                <td>

                    <input
                        type="text"
                        name="phone_number"
                        value="<?php echo get_option('phone_number'); ?>"
                    >

                </td>

            </tr>

            <!-- ADDRESS -->
            <tr>

                <th>Address</th>

                <td>

                    <textarea
                        name="address_information"
                    ><?php echo get_option('address_information'); ?></textarea>

                </td>

            </tr>

            <!-- FAX -->
            <tr>

                <th>Fax Number</th>

                <td>

                    <input
                        type="text"
                        name="fax_number"
                        value="<?php echo get_option('fax_number'); ?>"
                    >

                </td>

            </tr>

            <!-- FACEBOOK -->
            <tr>

                <th>Facebook Link</th>

                <td>

                    <input
                        type="text"
                        name="facebook_link"
                        value="<?php echo get_option('facebook_link'); ?>"
                    >

                </td>

            </tr>

            <!-- TWITTER -->
            <tr>

                <th>Twitter Link</th>

                <td>

                    <input
                        type="text"
                        name="twitter_link"
                        value="<?php echo get_option('twitter_link'); ?>"
                    >

                </td>

            </tr>

            <!-- LINKEDIN -->
            <tr>

                <th>LinkedIn Link</th>

                <td>

                    <input
                        type="text"
                        name="linkedin_link"
                        value="<?php echo get_option('linkedin_link'); ?>"
                    >

                </td>

            </tr>

        </table>

        <?php submit_button(); ?>

    </form>

</div>

<?php
}
add_action('admin_enqueue_scripts', 'cts_admin_scripts');

function cts_admin_scripts() {

    wp_enqueue_media();

    wp_enqueue_script(
        'cts-admin-script',
        get_template_directory_uri() . '/assets/js/admin.js',
        array('jquery'),
        null,
        true
    );

}