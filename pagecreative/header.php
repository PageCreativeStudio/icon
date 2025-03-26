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

	<!-- Google Analytics 4 (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-S0WFV5P8PN"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag() { dataLayer.push(arguments); }
		gtag('js', new Date());

		gtag('config', 'G-S0WFV5P8PN');
	</script>

	<!-- Google tag manager (gtag.js) -->
	<!--<script>(function (w, d, s, l, i) {
			w[l] = w[l] || []; w[l].push({
				'gtm.start':
					new Date().getTime(), event: 'gtm.js'
			}); var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
					'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-K9NTKGT');
	</script>-->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<main id="primary" class="site-main">
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#primary">
				<?php esc_html_e('Skip to content', 'pagecreative'); ?>
			</a>

			<header id="masthead" class="site-header max-60 mx-auto text-center ">
				<div class="container max-width mx-auto">
					<div class="row py-3 py-lg-0">
						<nav
							class="main-navigation d-flex place-items-center col-6 col-lg-5 order-2 order-lg-1 align-self-center px-3 text-right justify-content-end text-lg-right">
							<button class="menu-toggle float-right text-white" id="toggle-menu" aria-label="menu">
								<svg xmlns="http://www.w3.org/2000/svg" width="13" height="9" viewBox="0 0 13 9"
									fill="none">
									<rect x="0.375" width="12" height="2" fill="black" />
									<rect x="0.375" y="7" width="12" height="2" fill="black" />
								</svg>
							</button>
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id' => 'primary-menu',
								)
							);
							?>
						</nav>
						<div class="site-branding order-1 order-lg-2 col-6 col-lg-5 pl-lg-1 pr-lg-4 align-self-center">
							<a href="<?php echo home_url(); ?>">
								<img class="w-100 max-7"
									src="<?php echo esc_url(get_template_directory_uri() . '/include/images/svg-logo.svg'); ?>"
									alt="icon printing">
							</a>
						</div>
						<div class="col-6 col-lg-2 align-self-center d-none d-lg-block">
							<div class="d-flex flex-wrap justify-content-end">
								<a href="#">Sign in</a>
								<a class="btna" href="#">Get a quote</a>
								<a class="cartbtn" href="<?php echo home_url(); ?>/cart">
									<svg xmlns="http://www.w3.org/2000/svg" width="26" height="25" viewBox="0 0 26 25"
										fill="none">
										<g clip-path="url(#clip0_491_131)">
											<path fill-rule="evenodd" clip-rule="evenodd"
												d="M17.156 2.04199C17.156 4.35267 15.2654 6.24322 12.9547 6.24322C10.6441 6.24322 8.75351 4.35267 8.75351 2.04199H5.60259L1.40137 4.14261V10.4444H5.60259V23.0481H20.3069V10.4444H24.5081V4.14261L20.3069 2.04199H17.156Z"
												stroke="#343434" stroke-width="2.10061" stroke-linecap="square"
												stroke-linejoin="round" />
											<rect x="14.3755" y="9.40039" width="3.27222" height="3.39852" rx="0.5"
												fill="#343434" />
										</g>
										<defs>
											<clipPath id="clip0_491_131">
												<rect width="25.2074" height="24.1571" fill="white"
													transform="translate(0.351074 0.466797)" />
											</clipPath>
										</defs>
									</svg>
								</a>
							</div>
						</div>
					</div>

					<div class="mobmenu container w-100 py-2">
						<div class="row px-3 pt-2">
							<div class="col-6 mob_logo align-self-center">
								<div class="d-flex">
									<a class="cartbtn" href="<?php echo home_url(); ?>/cart">
										<svg xmlns="http://www.w3.org/2000/svg" width="26" height="25"
											viewBox="0 0 26 25" fill="none">
											<g clip-path="url(#clip0_491_131)">
												<path fill-rule="evenodd" clip-rule="evenodd"
													d="M17.156 2.04199C17.156 4.35267 15.2654 6.24322 12.9547 6.24322C10.6441 6.24322 8.75351 4.35267 8.75351 2.04199H5.60259L1.40137 4.14261V10.4444H5.60259V23.0481H20.3069V10.4444H24.5081V4.14261L20.3069 2.04199H17.156Z"
													stroke="#343434" stroke-width="2.10061" stroke-linecap="square"
													stroke-linejoin="round" />
												<rect x="14.3755" y="9.40039" width="3.27222" height="3.39852" rx="0.5"
													fill="#343434" />
											</g>
											<defs>
												<clipPath id="clip0_491_131">
													<rect width="25.2074" height="24.1571" fill="white"
														transform="translate(0.351074 0.466797)" />
												</clipPath>
											</defs>
										</svg>
									</a>
									<img class="w-100 max-7"
										src="<?php echo esc_url(get_template_directory_uri() . '/include/images//svg-logo.svg'); ?>"
										alt="icon printing">
								</div>
							</div>
							<div class="col-6 align-self-center text-right pt-4">
								<a class="closebtn text-white font-400">
									<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15"
										fill="none">
										<path d="M1.54053 13.5L13.7498 1.5M1.54053 1.5L13.7498 13.5" stroke="#333333"
											stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
									</svg>
								</a>
							</div>
							<div class="mobmain_menu col-12 py-3 px-2">
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'menu-1',
										'menu_id' => 'primary-menu',
									)
								);
								?>
							</div>

							<div class="sm__header d-flex px-2 py-4">
								<a class="mr-2" href="https://www.instagram.com/whiteandwhitelc/" target="_blank">

								</a>
								<a href="https://en-gb.facebook.com/WhiteandWhiteLondonContracts/" target="_blank">

								</a>
							</div>
						</div>
					</div>
				</div>
			</header>