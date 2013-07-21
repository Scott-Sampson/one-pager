<?php
$img_chk_png = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/' . wp_get_theme() . '/img/logo.png';
$img_chk_jpg = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/' . wp_get_theme() . '/img/logo.jpg';
$img_src_png = get_bloginfo('stylesheet_directory') . '/img/logo.png';
$img_src_jpg = get_bloginfo('stylesheet_directory') . '/img/logo.jpg';
?>
<!doctype html>

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!-->
<html <?php language_attributes(); ?> class="no-js">
<!--<![endif]-->

  <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title>
<?php
if (WP_DEBUG)
{
echo '(',get_template_id(),') | ';
}
if (function_exists('is_tag') && is_tag())
{
echo 'Tag Archive for &quot;'.$tag.'&quot; - ';
}
elseif (is_archive())
{
wp_title(''); echo ' Archive - ';
}
elseif (is_search())
{
echo 'Search for &quot;'.wp_specialchars($s).'&quot; - ';
}
elseif (!(is_404()) && (is_single()) || (is_page()))
{
wp_title('');
}
elseif (is_404())
{
echo 'Not Found - ';
}
if (is_front_page())
{
bloginfo('name'); echo ' - '; bloginfo('description');
}
else
{
 echo ' - '; bloginfo('name');
}
if ($paged>1)
{
echo ' - page ', $paged;
}
?>
</title>

		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	</head>
	<body <?php body_class(); ?>  id="top">


		<div class="row container">
			<div class="twelve columns">
				<header role="banner" id="top-header">
					<div class="siteinfo">
						<?php if (file_exists($img_chk_png) ) { ?>
<a class="brand" id="logo" href="<?php echo get_bloginfo('url'); ?>">
							<img src="<?php _e($img_src_png) ?>" />
						</a>
						<?php } elseif (file_exists($img_chk_jpg) ) { ?>
<a class="brand" id="logo" href="<?php echo get_bloginfo('url'); ?>">
							<img src="<?php _e($img_src_jpg) ?>" />
						</a>
						<?php } else { ?>
<h1><a class="brand" id="logo" href="<?php echo get_bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1><?php } ?>
</div>
					<?php gp_main_nav(); // Adjust using Menus in Wordpress Admin ?>
				</header> <!-- end header -->
			</div>
