<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package urbanfashion
 */

get_header();


         $error_bg = array(get_template_directory_uri() . '/assets/img/error-404.svg');

?>

	<div class="error-page-container" style="background-image: url('<?php echo $error_bg[0]; ?>');">

		<div class="error-block-content">
	        <div class="container">
	            <div class="row">
	                <div class="col-lg-6 col-md-8">
	                    <div class="four-zero-four">
	                        <h1>Page could not be<span class="font-weight-semi-bold"> found </span>
	                        </h1>
	                        <p>Oops! Looks like you followed a bad link
	                        If you think this is a problem with us. Please contact with us or go back to main page.</p>
	                        <a class="back-to-main-page" href="<?php echo home_url(); ?>">Go back</a>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>

	</div>
	
<?php
get_footer();