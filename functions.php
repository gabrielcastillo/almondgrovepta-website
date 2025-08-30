<?php
/*
 * File: functions.php
 *
 * @author Gabriel Castillo <gabriel@gabrielcastillo.net>
 * Copyright (c) 2025.
 */

define('THEME_VERSION', '1.0.0');
define('TEMPLATE_DIR', get_template_directory() );

require_once TEMPLATE_DIR . '/inc/AGPTA_Nav_Menu_Builder.php';
require_once TEMPLATE_DIR . '/inc/template-actions.php';
require_once TEMPLATE_DIR . '/inc/event-calendar.php';
require_once TEMPLATE_DIR . '/inc/FormPlugin/ini.php';

register_nav_menu('primary','Primary Menu');
register_nav_menu( 'footer', 'Footer Menu' );
register_nav_menu( 'mobile', 'Mobile Menu' );

add_theme_support( 'title-tag' );
add_theme_support( 'custom-logo' );
add_theme_support( 'post-thumbnails' );

//add_image_size( 'event-gallery-thumbnail', 269, 196);
//add_image_size('banner-image', 176, 256);

add_action( 'wp_enqueue_scripts', 'agpta_load_scripts' );
add_action( 'login_enqueue_scripts', 'agpta_custom_login_logo' );
add_action( 'widgets_init', 'agpta_register_sidebars' );

add_filter('login_headerurl', 'agpta_login_header_url');

/**
 * Register sidebars
 * @return void
 */
function agpta_register_sidebars() {
	register_sidebar( array(
		'id' => 'primary',
		'name' => __('Primary Sidebar', 'agpta-theme'),
		'description' => __('Primary sidebar, used in blog section and or any other section with sidebar content', 'agpta_theme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}


/*
 * Load header and footer scripts
 */
function agpta_load_scripts() {
	if ( isset($_SERVER['HTTP_HOST']) && strpos($_SERVER['HTTP_HOST'], '.test') > 0 ) {
		wp_enqueue_style('agpta-theme-css', get_template_directory_uri() . '/css/theme.css', array(), THEME_VERSION);
		wp_enqueue_script( 'agpta-theme-js', get_template_directory_uri() . '/src/js/theme.js', array('jquery'), THEME_VERSION, true );
	} else {
		wp_enqueue_style('agpta-theme-css', get_template_directory_uri() . '/css/all.min.css', array(), THEME_VERSION);
		wp_enqueue_script( 'agpta-theme-js', get_template_directory_uri() . '/js/all.min.js', array('jquery'), THEME_VERSION, true );
	}

	// Pass AJAX URL
	wp_localize_script('agpta-theme-js', 'EventCalendarData', array(
		'ajax_url' => admin_url('admin-ajax.php')
	));
}

/**
 * Debugger
 *
 * Print R of value.
 *
 * @param $value
 * @param  bool  $end
 *
 * @return void
 */
function dd( $value, bool $end = true )
{
	echo '<pre>';
	echo print_r($value, true);
	echo '</pre>';

	if ( $end ) {
		exit;
	}
}



function agpta_get_posts() {

	$html = '';

	$args = array(
		'numberposts' => 3,
		'orderby' => 'date',
		'order' => 'DESC',
	);

	$posts = get_posts( $args );

	if ( $posts ) {
		foreach( $posts as $post ) {
			$html .= '<article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gray-900 px-8 pb-8 pt-80 sm:pt-48 lg:pt-80">';
			if ( has_post_thumbnail( $post->ID ) ) {
				$html .= '<img src="'. get_the_post_thumbnail_url( $post->ID ) .'" alt="" class="absolute inset-0 -z-10 size-full object-cover">';
			} else {
				$html .= '<img src="https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3603&q=80" alt="" class="absolute inset-0 -z-10 size-full object-cover">';
			}

			$html .= '<div class="absolute inset-0 -z-10 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>';
			$html .= '<div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>';
			$html .= '<div class="flex flex-wrap justify-between items-center gap-y-1 overflow-hidden text-sm/6 text-gray-300">';
				$html .= '<time datetime="2020-03-16" class="mr-8">'. gmdate( 'M d, Y', strtotime($post->post_date_gmt) ).'</time>';
				$html .= '<div class="-ml-4 flex items-center gap-x-4">';;
					$html .= '<img src="'. get_avatar_url( $post->post_author ) .'" alt="" class="size-6 flex-none rounded-full bg-white/10">';
					$html .= get_the_author_meta( 'nicename', $post->post_author);
				$html .= '</div>';
			$html .= '</div>';
			$html .= '<h3 class="mt-3 text-lg/6 font-semibold text-white">';
			$html .= '<a href="'. get_permalink( $post->ID ) .'">';
			$html .= '<span class="absolute inset-0"></span>';
			$html .= $post->post_title;
			$html .= '</a>';
			$html .= '</h3>';
			$html .= '</article>';
		}
	}
	echo $html;
}

/**
 * @return void
 */
function agpta_get_team_member() {
	global $wpdb;
	$html = '';

	$args = array(
		'post_type' => 'team',
		'posts_per_page' => -1,
		'post_status' => 'publish',
	);

	$sql = /** @lang sql */
		"SELECT * FROM wp_posts WHERE post_type = 'team' AND post_status = 'publish'";
	$results = $wpdb->get_results($sql);


	if ( $results ) {
		foreach( $results as $result ) {
			$profile_image = get_the_post_thumbnail_url( $result->ID, 'full');
			if ( ! $profile_image ) {
				$profile_image = 'https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80';
			}

			$member_name = get_post_meta($result->ID, '_member_name', true);
			$member_role = get_post_meta($result->ID, '_member_role', true);

			?>
			<li>
				<img class="mx-auto size-24 rounded-full" src="<?php echo $profile_image; ?>" alt="<?php echo $member_name; ?>">
				<h3 class="mt-6 text-base/7 font-semibold tracking-tight text-gray-900"><?php echo $member_name; ?></h3>
				<p class="text-sm/6 text-gray-600"><?php echo $member_role; ?></p>
			</li>
			<?php
		}
	}
}

/**
 * Footer Nav Menu Display
 * @return string
 */
function agpta_footer_nav_menu_display(): string {
	$locations = get_nav_menu_locations();

	$menu_id = $locations['footer'];
	$menu_items = wp_get_nav_menu_items( $menu_id );
	$html = '';

	if ( $menu_items ) {
		$html .= '<nav class="-mb-6 flex flex-wrap justify-center gap-x-12 gap-y-3 text-sm/6" aria-label="Footer">';

		foreach( $menu_items as $item ) {
			$html .= '<a href="'. esc_url( $item->url ) .'" class="text-gray-400 hover:text-white">'. esc_html( $item->title ) .'</a>';
		}

		$html .= '</nav>';
	} else {
		$html .= 'Menu not found!';
	}

	return $html;
}

/**
 * Change login logo
 * @return void
 */
function agpta_custom_login_logo() {
    ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url( <?php echo get_stylesheet_directory_uri()?>/images/ag-pta-logo.jpg );
        }
    </style>
    <?php
}

/**
 * Change login logo url
 * @return string|void
 */
function agpta_login_header_url() {
    return  get_bloginfo('url');
}

/**
 * Get text-domain for theme use.
 * @return string
 */
function get_text_domain() :string {
    return 'agpta';
}


/**
 * Create user email for successful payment.
 *
 * @param $email
 * @param $event_name
 * @param $amount
 *
 * @return void
 */
function send_ticket_email($email, $event_name, $amount) {
    $subject = 'Your ticket for ' . $event_name;
    $body = "Thank you for you purchase!\n\n";
    $body .= 'Event: ' . $event_name . "\n";
    $body .= "Amount: \$$amount\n\n";
    $body .= "Your ticket is attached.";

    $headers = ['Content-Type: text/plain; charset=UTF-8'];

    $attachment_path = generate_pdf_ticket($event_name, $amount);
    if ( $attachment_path ) {
        wp_mail($email, $subject, $body, $headers, [$attachment_path]);
        unlink($attachment_path);
    } else {
        wp_mail( $email, $subject, $body, $headers);
    }
}

/**
 * Generate PDF Ticket
 * Save pdf ticket into uploads, send path to email.
 *
 * @param $event_name
 * @param $amount
 *
 * @return string
 */
function generate_pdf_ticket($event_name, $amount): string {
	require_once __DIR__ . '/vendor/autoload.php';
    $dompdf = new Dompdf();

    $html = "<h1>Ticket for {$event_name}</h1>
            <p>Thank you for your payment of \${$amount}</p>";

    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    $upload_dir = wp_upload_dir();

    $path = $upload_dir['basedir'] . '/ticket-' . uniqid( '', true ) . '.pdf';
    file_put_contents($path, $dompdf->output());

    return $path;
}


/**
 *
 * @TODO: Not sure what this is used for.
 * @return void
 */
function agpta_top_banner_input_callback() {
    $options = get_options('agpta_settings');
}
add_action( 'agpta_settings', 'agpta_top_banner_input_callback' );

/**
 * Remove ptag from excerpt
 * @param $excerpt
 *
 * @return void
 */
function custom_excerpt( $excerpt ) {
    echo preg_replace( '/^<p>|<\/p>$/', '', $excerpt);
}

/**
 * Check if sidebar has active widgets.
 * @param $sidebar
 *
 * @return string|void
 */
function no_sidebar( $sidebar = 'primary' ) {
    if ( ! is_active_sidebar( $sidebar ) ) {
        return 'no-sidebar';
    }
}
