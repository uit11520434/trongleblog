<?php
define('THEMEUMNAME', wp_get_theme()->get( 'Name' ));

define('THMCSS', get_template_directory_uri().'/css/');

define('THMJS', get_template_directory_uri().'/js/');


// Re-define meta box path and URL

define( 'RWMB_URL', trailingslashit( get_stylesheet_directory_uri() . '/lib/meta-box' ) );
define( 'RWMB_DIR', trailingslashit(  get_stylesheet_directory() . '/lib/meta-box' ) );

// Include the meta box script
require_once RWMB_DIR . 'meta-box.php';

require_once (get_template_directory().'/lib/metabox.php');



/*-------------------------------------------------------
 *				Redux Framework Options Added
 *-------------------------------------------------------*/

// Include the Redux theme options Framework
global $themeum_options; 

if ( !class_exists( 'ReduxFramework' ) ) {
	require_once( get_template_directory() . '/admin/framework.php' );
}

// Tweak the Redux framework
// Register all the theme options
// Registers the wpex_option function
if ( !isset( $redux_demo ) ) {
	require_once( get_template_directory() . '/theme-options/admin-config.php' );
}



/*-------------------------------------------*
 *				Register Navigation
 *------------------------------------------*/

register_nav_menu( 'primary','Primary Menu' );
register_nav_menu( 'secondary','Secondary Menu' );


/*-------------------------------------------*
 *				navwalker
 *------------------------------------------*/
require_once( get_template_directory()  . '/lib/navwalker.php');
require_once( get_template_directory()  . '/lib/mobile-navwalker.php');


function getContrast50($hexcolor){
    return (hexdec($hexcolor) > 0xffffff/2) ? 'light-bg':'dark-bg';
}

/*-------------------------------------------------------
*			Custom Widgets Include
*-------------------------------------------------------*/

require_once( get_template_directory()  . '/lib/widgets/image_widget.php');
require_once( get_template_directory()  . '/lib/widgets/adsense_widget.php');
require_once( get_template_directory()  . '/lib/widgets/book_widget.php');
require_once( get_template_directory()  . '/lib/widgets/prolog_calender_widget.php');
require_once( get_template_directory()  . '/lib/widgets/tab_widget.php');
require_once( get_template_directory()  . '/lib/starterads.php');

/*-------------------------------------------*
 *				Themeum setup
 *------------------------------------------*/

if(!function_exists('thmtheme_setup')):

	function thmtheme_setup()
	{
		// load textdomain
    	load_theme_textdomain('themeum', get_template_directory() . '/languages');

		add_theme_support( 'post-thumbnails' );

		add_image_size( 'blog-full', 1140, 500, true );
		add_image_size( 'blog-thumb', 770, 340, true );
		add_image_size( 'xs-thumb', 120, 80, true );
		add_image_size( 'blog-gallery', 380, 330, true );
		add_image_size( 'xs-blog-gallery', 250, 220, true );

		add_theme_support( 'post-formats', array( 'aside','audio','chat','gallery','image','link','quote','status','video' ) );

		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form' ) );

		add_theme_support( 'automatic-feed-links' );

		add_editor_style('');

		if ( ! isset( $content_width ) )
		$content_width = 660;
	}

	add_action('after_setup_theme','thmtheme_setup');

endif;


/*-------------------------------------------*
 *		Themeum Widget Registration
 *------------------------------------------*/

if(!function_exists('thmtheme_widdget_init')):

	function thmtheme_widdget_init()
	{

		register_sidebar(array( 'name' 			=> __( 'Sidebar', 'themeum' ),
							  	'id' 			=> 'sidebar',
							  	'description' 	=> __( 'Widgets in this area will be shown on Sidebar.', 'themeum' ),
							  	'before_title' 	=> '<h3  class="widget_title">',
							  	'after_title' 	=> '</h3>',
							  	'before_widget' => '<div id="%1$s" class="widget %2$s" >',
							  	'after_widget' 	=> '</div>'
					)
		);
	}
	
	add_action('widgets_init','thmtheme_widdget_init');

endif;


if(!function_exists('themeum_admin_scripts')){

	function themeum_admin_scripts()
	{
		if(is_admin())
		{
			wp_enqueue_media();
			wp_enqueue_script('adsScript', get_template_directory_uri() . '/js/image-uploader.js');

		}
	}

	add_action('admin_enqueue_scripts','themeum_admin_scripts');

}


/*-------------------------------------------*
 *		Themeum Style
 *------------------------------------------*/

if(!function_exists('themeum_style')):

    function themeum_style(){
    	global $themeum_options;

        wp_enqueue_style('thm-style',get_stylesheet_uri());
        wp_enqueue_style('font-awesome',THMCSS.'font-awesome.min.css');

        wp_enqueue_script('jquery');
        wp_enqueue_script('masonry');
        wp_enqueue_script('bootstrap',THMJS.'bootstrap.min.js',array(),false,true);
        wp_enqueue_script('prettyPhoto',THMJS.'jquery.prettyPhoto.js',array(),false,true);
        wp_enqueue_script('countdown',THMJS.'jquery.countdown.min.js',array(),false,true);

        wp_enqueue_style('quick-style',get_template_directory_uri().'/quick-style.php',array(),false,'all');

    	if( isset($themeum_options['custom-preset-en']) && !$themeum_options['custom-preset-en'] ) {
			wp_enqueue_style( 'themeum-preset', get_template_directory_uri(). '/css/presets/preset' . $themeum_options['preset'] . '.css', array(),false,'all' );
		}

		wp_enqueue_script('main',THMJS.'main.js',array(),false,true);
	}

    add_action('wp_enqueue_scripts','themeum_style');

endif;



if(!function_exists('themeum_admin_style')):

	function themeum_admin_style()
	{
		if(is_admin())
		{
			wp_register_script('thmpostmeta', get_template_directory_uri() .'/js/admin/post-meta.js');
			wp_enqueue_script('thmpostmeta');
		}
	}

	add_action('admin_enqueue_scripts','themeum_admin_style');

endif;

/*-------------------------------------------*
 *				Excerpt Length
 *------------------------------------------*/

if(!function_exists('new_excerpt_more')):

	if( isset($themeum_options['blog-continue-en']) && $themeum_options['blog-continue-en'] ){

		function new_excerpt_more( $more )
		{
			global $themeum_options;
			$continue = 'Continue Reading';

			if ( isset($themeum_options['blog-continue']) ){
				$continue = $themeum_options['blog-continue'];
			}
			
			return '&nbsp;<br /><br /><a class="btn btn-style" href="'. get_permalink( get_the_ID() ) . '">'.__($continue,'themeum').'...</a>';
		}
		add_filter( 'excerpt_more', 'new_excerpt_more' );

	}

endif;


/*-------------------------------------------------------
*			Include the TGM Plugin Activation class
*-------------------------------------------------------*/

require_once( get_template_directory()  . '/lib/class-tgm-plugin-activation.php');

add_action( 'tgmpa_register', 'themeum_plugins_include');

if(!function_exists('themeum_plugins_include')):

	function themeum_plugins_include()
	{
		$plugins = array(
				array(
					'name'                  => 'MailChimp for WordPress', // The plugin name
					'slug'                  => 'mailchimp-for-wp', // The plugin slug (typically the folder name)
					'required'              => false, // If false, the plugin is only 'recommended' instead of required
					'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
					'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
					'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
					'external_url'          => 'http://downloads.wordpress.org/plugin/mailchimp-for-wp.2.1.1.zip', // If set, overrides default API URL and points to an external URL
				),
				array(
					'name'                  => 'Contact Form 7', // The plugin name
					'slug'                  => 'contact-form-7', // The plugin slug (typically the folder name)
					'required'              => false, // If false, the plugin is only 'recommended' instead of required
					'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
					'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
					'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
					'external_url'          => 'http://downloads.wordpress.org/plugin/contact-form-7.3.9.1.zip', // If set, overrides default API URL and points to an external URL
				),
				array(
					'name'                  => 'Themeum Prolog Shortcodes', // The plugin name
					'slug'                  => 'themeum-prolog-shortcodes', // The plugin slug (typically the folder name)
					'source'                => get_stylesheet_directory() . '/lib/plugins/themeum-prolog-shortcodes.zip', // The plugin source
					'required'              => false, // If false, the plugin is only 'recommended' instead of required
					'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
					'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
					'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
					'external_url'          => '', // If set, overrides default API URL and points to an external URL
					),
				array(
					'name'                  => 'Widget Settings Importer/Exporter', // The plugin name
					'slug'                  => 'widget-settings-importexport', // The plugin slug (typically the folder name)
					'required'              => false, // If false, the plugin is only 'recommended' instead of required
					'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
					'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
					'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
					'external_url'          => 'http://downloads.wordpress.org/plugin/widget-settings-importexport.1.4.zip', // If set, overrides default API URL and points to an external URL
					)
			);

	$theme_text_domain = 'themeum';

	/**
	* Array of configuration settings. Amend each line as needed.
	* If you want the default strings to be available under your own theme domain,
	* leave the strings uncommented.
	* Some of the strings are added into a sprintf, so see the comments at the
	* end of each line for what each argument will be.
	*/
	$config = array(
			'domain'            => $theme_text_domain,           // Text domain - likely want to be the same as your theme.
			'default_path'      => '',                           // Default absolute path to pre-packaged plugins
			'parent_menu_slug'  => 'themes.php',         		 // Default parent menu slug
			'parent_url_slug'   => 'themes.php',         		 // Default parent URL slug
			'menu'              => 'install-required-plugins',   // Menu slug
			'has_notices'       => true,                         // Show admin notices or not
			'is_automatic'      => false,            			 // Automatically activate plugins after installation or not
			'message'           => '',               			 // Message to output right before the plugins table
			'strings'           => array(
						'page_title'                                => __( 'Install Required Plugins', $theme_text_domain ),
						'menu_title'                                => __( 'Install Plugins', $theme_text_domain ),
						'installing'                                => __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
						'oops'                                      => __( 'Something went wrong with the plugin API.', $theme_text_domain ),
						'notice_can_install_required'               => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
						'notice_can_install_recommended'            => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
						'notice_cannot_install'                     => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
						'notice_can_activate_required'              => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
						'notice_can_activate_recommended'           => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
						'notice_cannot_activate'                    => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
						'notice_ask_to_update'                      => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
						'notice_cannot_update'                      => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
						'install_link'                              => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
						'activate_link'                             => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
						'return'                                    => __( 'Return to Required Plugins Installer', $theme_text_domain ),
						'plugin_activated'                          => __( 'Plugin activated successfully.', $theme_text_domain ),
						'complete'                                  => __( 'All plugins installed and activated successfully. %s', $theme_text_domain ) // %1$s = dashboard link
				)
	);

	tgmpa( $plugins, $config );

	}

endif;


/*-------------------------------------------------------
 *				Themeum Comment
 *-------------------------------------------------------*/

if(!function_exists('themeum_comment')):

	function themeum_comment($comment, $args, $depth)
	{
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
			// Display trackbacks differently than normal comments.
		?>
		<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
			<p>Pingback: <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'themeum' ), '<span class="edit-link">', '</span>' ); ?></p>
		<?php
				break;
			default :
			
			global $post;
		?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
			<div id="comment-<?php comment_ID(); ?>" class="comment-body media">
				
					<div class="comment-avartar pull-left">
						<?php
							echo get_avatar( $comment, $args['avatar_size'] );
						?>
					</div>
					<div class="comment-context media-body">
						<div class="comment-head">
							<?php
								printf( '<span class="comment-author">%1$s</span>',
									get_comment_author_link());
							?>
							<span class="comment-date"><?php echo get_comment_date() ?></span>

							<?php edit_comment_link( __( 'Edit', 'themeum' ), '<span class="edit-link">', '</span>' ); ?>
							<span class="comment-reply">
								<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'themeum' ), 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
							</span>
						</div>

						<?php if ( '0' == $comment->comment_approved ) : ?>
						<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'themeum' ); ?></p>
						<?php endif; ?>

						<div class="comment-content">
							<?php comment_text(); ?>
						</div>
					</div>
				
			</div>
		<?php
			break;
		endswitch; 
	}

endif;


/*-------------------------------------------------------
*			Themeum Breadcrumb
*-------------------------------------------------------*/

function themeum_breadcrumbs(){ ?>

	<div class="themeum-breadcrumbs">

		<ul class="breadcrumb">
			<li>
				<a href="<?php home_url(); ?>" class="breadcrumb_home"><?php esc_html_e('Home', 'themeum') ?></a> 
			</li>
			<li class="active">

				<?php if( is_tag() ) { ?>
				<?php esc_html_e('Posts Tagged ', 'themeum') ?><span class="raquo">/</span><?php single_tag_title(); echo('/'); ?>
				<?php } elseif (is_day()) { ?>
				<?php esc_html_e('Posts made in', 'themeum') ?> <?php the_time('F jS, Y'); ?>
				<?php } elseif (is_month()) { ?>
				<?php esc_html_e('Posts made in', 'themeum') ?> <?php the_time('F, Y'); ?>
				<?php } elseif (is_year()) { ?>
				<?php esc_html_e('Posts made in', 'themeum') ?> <?php the_time('Y'); ?>
				<?php } elseif (is_search()) { ?>
				<?php esc_html_e('Search results for', 'themeum') ?> <?php the_search_query() ?>
				<?php } elseif (is_single()) { ?>
				<?php $category = get_the_category();
				if ( $category ) { 
					$catlink = get_category_link( $category[0]->cat_ID );
					echo ('<a href="'.esc_url($catlink).'">'.esc_html($category[0]->cat_name).'</a> '.'<span class="raquo"> /</span> ');
				}
				echo get_the_title(); ?>
				<?php } elseif (is_category()) { ?>
				<?php single_cat_title(); ?>
				<?php } elseif (is_tax()) { ?>
				<?php 
				$themeum_taxonomy_links = array();
				$themeum_term = get_queried_object();
				$themeum_term_parent_id = $themeum_term->parent;
				$themeum_term_taxonomy = $themeum_term->taxonomy;

				while ( $themeum_term_parent_id ) {
					$themeum_current_term = get_term( $themeum_term_parent_id, $themeum_term_taxonomy );
					$themeum_taxonomy_links[] = '<a href="' . esc_url( get_term_link( $themeum_current_term, $themeum_term_taxonomy ) ) . '" title="' . esc_attr( $themeum_current_term->name ) . '">' . esc_html( $themeum_current_term->name ) . '</a>';
					$themeum_term_parent_id = $themeum_current_term->parent;
				}

				if ( !empty( $themeum_taxonomy_links ) ) echo implode( ' <span class="raquo">/</span> ', array_reverse( $themeum_taxonomy_links ) ) . ' <span class="raquo">/</span> ';

				echo esc_html( $themeum_term->name ); 
			} elseif (is_author()) { 
				global $wp_query;
				$curauth = $wp_query->get_queried_object();

				esc_html_e('Posts by ', 'themeum'); echo ' ',$curauth->nickname; 
			} elseif (is_page()) { 
				echo get_the_title(); 
			} elseif (is_home()) { 
				esc_html_e('Blog', 'themeum');
			} ?>  
		</li>
	</ul>
	</div>
<?php
}




/*--------------------------------------------------------------
 * Get All Terms of Taxonomy 
 * @author : Themeum
 *-------------------------------------------------------------*/


function get_all_term_names( $post_id, $taxonomy = 'post_tag' )
{
	$terms = get_the_terms( $post_id, $taxonomy );

	$term_names = '';
    if ( $terms && ! is_wp_error( $terms ) )
    { 
        $term_name = array();

        foreach ( $terms as $term ) {
            $term_name[] = $term->name;
        }

        $term_names = join( ", ", $term_name );
    }

    return $term_names;
}


/*----------------
 * Coming Soon Settings
 */


if (isset($themeum_options['comingsoon-en']) && $themeum_options['comingsoon-en']) {
	function my_page_template_redirect()
	{
		if( is_page( ) || is_home() || is_category() || is_single() )
		{
			get_template_part( 'coming','soon');
			exit();
		}
	}
	add_action( 'template_redirect', 'my_page_template_redirect' );

	function cooming_soon_wp_title(){
		return 'Coming Soon';
	}

	add_filter( 'wp_title', 'cooming_soon_wp_title' );
}

