<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package pagecreative
 */

get_header();
?>

<main id="primary" class="site-main">

	<section class="error-404 not-found text-center py-5">
		<header class="page-header">
			<h1 class="font-35 font-mb-25 px-2">Oops! That page can't be found. </h1>
		</header>

		<div class="page-content text-center max-30 mx-auto px-3 pb-5">
			<p class="font-18 font-300 text-darkgray">It looks like nothing was found at this location. Maybe try one
				of the links below</p>
			<a class="btnc bg-dark font-15 text-white mt-3" href="<?php echo home_url(); ?>">back to home</a>
		</div>
	</section>



</main>

<?php
get_footer();
