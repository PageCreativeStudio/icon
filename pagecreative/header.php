<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pagecreative
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<main id="primary" class="site-main">
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#primary">
				<?php esc_html_e('Skip to content', 'pagecreative'); ?>
			</a>

			<header id="masthead" class="site-header max-60 mx-auto">
				<div class="site-branding">
					<a href="<?php echo home_url(); ?>">
						<img class="w-100 max-15"
							src="<?php echo esc_url(get_template_directory_uri() . '/includes/images/magnum-logo.svg'); ?>"
							alt="icon printing">
					</a>
				</div>

				<nav id="site-navigation" class="main-navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
						<?php esc_html_e('Primary Menu', 'pagecreative'); ?>
					</button>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id' => 'primary-menu',
						)
					);
					?>
				</nav><!-- #site-navigation -->
			</header><!-- #masthead -->