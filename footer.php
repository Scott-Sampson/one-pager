<?php
$sml_chk_png = $_SERVER['DOCUMENT_ROOT'].'/wp-content/themes/'.wp_get_theme().'/img/small.png';
$sml_chk_jpg = $_SERVER['DOCUMENT_ROOT'].'/wp-content/themes/'.wp_get_theme().'/img/small.jpg';
$sml_src_png = get_bloginfo('stylesheet_directory') . '/img/small.png';
$sml_src_jpg = get_bloginfo('stylesheet_directory') . '/img/small.jpg';
?>
  	</div> <!--/Row Container -->
					<footer role="site-info" id="siteFooter">
			<p class="rotate">&copy; <?php bloginfo('name'); echo ' &ndash; ';  the_date('Y'); ?></p>
			</footer>
	<div id="toTop">
		<?php if (file_exists($sml_chk_png) ) { ?>
<a class="brand" id="small-Logo" style="float: left;" href="#top">
							<img src="<?php _e($sml_src_png) ?>" />
						</a>
						<?php } elseif (file_exists($sml_chk_jpg) ) { ?>
<a class="brand" id="small-Logo" style="float: left;" href="#top">
							<img src="<?php _e($sml_src_jpg) ?>" />
						</a>
						<?php } else { ?>
<h1><a class="brand" id="small-Logo" style="float: left;" href="#top"><?php bloginfo('name'); ?></a></h1><?php } ?>
		<?php gp_footer_links(); ?> </div>
	</body>
</html>
