<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lowcarbon
 */

?>



<?php wp_footer(); ?>

<script type="text/javascript" src="<?php echo get_template_directory_uri()?>/assets/js/jquery-1.12.3.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri()?>/assets/js/jquery.infinitescroll.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri()?>/assets/js/imagesloaded.pkgd.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri()?>/assets/js/isotope.pkgd.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri()?>/assets/js/packery.pkgd.min.js"></script>


<script>
	$(window).load(function(){
		var $container = $('.iso');

		$('.sc-select img').on( 'click',  function() {
			var filterValue = $(this).attr('data-filter');
			$container.isotope({ filter: filterValue });
		});

		// Fire Isotope only when images are loaded
		$container.imagesLoaded(function () {
			$container.isotope({
				itemSelector: '.block-item',

			});
			$container.infinitescroll({
					navSelector: '#page_nav',    // selector for the paged navigation
					nextSelector: '#page_nav a',  // selector for the NEXT link (to page 2)
					itemSelector: '.block-item',     // selector for all items you'll retrieve
					loading: {
						finishedMsg: 'No more pages to load.',
						img: 'http://i.imgur.com/qkKy8.gif'
					}
				},
				// call Isotope as a callback
				function (newElements) {
					//$container.isotope('appended', $(newElements));
					var $newElems = $(newElements);
					$newElems.imagesLoaded(function () {
						$container.isotope('appended', $newElems);
					});
				}
			);
		});

		var xhr = $.ajax({
			type: "get",
			url: "<?php echo site_url('access_token')?>"
		});


		//kill the request
		//xhr.abort();

	})
</script>
</body>
</html>
