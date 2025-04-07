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

			<header id="masthead" class="site-header mx-auto text-center pt-2 pt-lg-3 pb-2 pb-lg-4 px-md-4">
				<div class="container-fluid mx-auto">
					<div class="row py-3 py-lg-0">
						<nav
							class="main-navigation d-flex justify-content-end justify-content-lg-start place-items-center col-6 col-lg-5 order-2 order-lg-1 px-0 px-lg">
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
						<div
							class="site-branding order-1 order-lg-2 col-6 col-lg-2 pl-lg-1 pr-lg-1 text-left text-lg-center align-self-center">
							<a href="<?php echo home_url(); ?>">
								<img class="w-100 max-6"
									src="<?php echo esc_url(get_template_directory_uri() . '/include/images/svg-logo.svg'); ?>"
									alt="icon printing">
							</a>
						</div>
						<div class="col-6 col-lg-5 align-self-center order-lg-3 d-none d-lg-block">
							<div class="d-flex flex-wrap justify-content-end align-items-center">
								<a class="mr-3" href="<?php echo home_url(); ?>/my-account/">Sign in</a>
								<a class="btna mr-3" href="#">Get a quote</a>
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

					<div class="mobmenu container w-100 p-0">
						<div class="h-100 bg-white py-2 px-2 mobmenu__container">
							<div class="row px-3 pt-2 mx-0">
								<div class="col-9 pb-2 mob_logo align-self-center px-0 close-on-sliding-active">
									<div class="d-flex flex-wrap">
										<a class="cartbtn" href="<?php echo home_url(); ?>/cart">
											<svg xmlns="http://www.w3.org/2000/svg" width="26" height="25"
												viewBox="0 0 26 25" fill="none">
												<g clip-path="url(#clip0_491_131)">
													<path fill-rule="evenodd" clip-rule="evenodd"
														d="M17.156 2.04199C17.156 4.35267 15.2654 6.24322 12.9547 6.24322C10.6441 6.24322 8.75351 4.35267 8.75351 2.04199H5.60259L1.40137 4.14261V10.4444H5.60259V23.0481H20.3069V10.4444H24.5081V4.14261L20.3069 2.04199H17.156Z"
														stroke="#343434" stroke-width="2.10061" stroke-linecap="square"
														stroke-linejoin="round" />
													<rect x="14.3755" y="9.40039" width="3.27222" height="3.39852"
														rx="0.5" fill="#343434" />
												</g>
												<defs>
													<clipPath id="clip0_491_131">
														<rect width="25.2074" height="24.1571" fill="white"
															transform="translate(0.351074 0.466797)" />
													</clipPath>
												</defs>
											</svg>
										</a>
										<div class="align-self-center pl-4">
											<img class="w-100 max-7"
												src="<?php echo esc_url(get_template_directory_uri() . '/include/images//svg-logo.svg'); ?>"
												alt="icon printing">
										</div>
									</div>
								</div>
								<div class="col-3 align-self-center text-right px-0 close-on-sliding-active">
									<a class="closebtn text-white font-400">
										<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
											viewBox="0 0 15 15" fill="none">
											<path d="M1.54053 13.5L13.7498 1.5M1.54053 1.5L13.7498 13.5"
												stroke="#333333" stroke-width="1.5" stroke-linecap="round"
												stroke-linejoin="round" />
										</svg>
									</a>
								</div>
								<div class="mobmain_menu col-12 py-4 px-0">
									<?php
									wp_nav_menu(
										array(
											'theme_location' => 'menu-1',
											'menu_id' => 'primary-menu',
										)
									);
									?>
								</div>

								<div class="cta_menu">
									<a class="btnc bg-dark font-15 text-white mr-2" href="#">
										Get a Quote
									</a>
									<a class="btna" href="<?php echo home_url(); ?>/my-account/">
										Sign In
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<section class="bg-white pb-5 pt-0 megamenu__container" id="services__mega-menu">
					<div class="container-fluid px-3">
						<div class="row justify-content-between">
							<?php if (have_rows('mega_menu', 'options')) { ?>
								<?php while (have_rows('mega_menu', 'options')) {
									the_row(); ?>
									<div class="col-12 col-md-3 col-lg-3 col-xl-2 mt-5 text-left px-3">
										<div class="mx-3 megamenu__col ">
											<h2 class="text-black font-bold font-18 mb-1 mt-2 pb-3">
												<?php echo get_sub_field('sub_menu_title', 'options'); ?>
											</h2>
											<ul class="m-0 p-0 list-unstyled">
												<?php if (have_rows('list_repeater', 'options')) { ?>
													<?php while (have_rows('list_repeater', 'options')) {
														the_row(); ?>
														<li class="pb-1"><a class="text-gray font-14 mb-0"
																href="<?php echo get_sub_field('list_link', 'options'); ?>"><?php echo get_sub_field('list_title', 'options'); ?></a>
														</li>
													<?php } ?>
												<?php } ?>

											</ul>
										</div>
									</div>
								<?php } ?>
							<?php } ?>
							<div class="col-12 col-md-3 col-lg-3 col-xl-2 promo__col mt-5 text-left px-4 py-5"
								style="min-height:18rem; max-height:22rem; background: linear-gradient(0deg, rgba(51, 51, 51, 0.70) 0%, rgba(51, 51, 51, 0.70) 100%), url(<?php echo get_field('promo_image', 'options'); ?>) lightgray -104.911px 0px / 254.545% 100% no-repeat;background-size: cover; background-position-x: left;">
								<a class="h-100 d-block" href="#">
									<img class="d-block"
										src="<?php echo esc_url(get_template_directory_uri() . '/include/images/logo-white.svg'); ?>"
										alt="icon printing white logo">
									<span class="text-white arrow-white font-15 d-inline-block mt-3">View all
										products</span>
								</a>
							</div>
						</div>
					</div>
				</section>
			</header>