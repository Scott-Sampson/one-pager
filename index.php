<?php get_header(); ?>
<?php
// define how pages will display
$args = array(
  'sort_order' => 'ASC', // ASC or DESC (ascending or descending)
	'sort_column' => 'post_title', //post_title or menu_order
	'hierarchical' => 1,
	'exclude' => '',
	'child_of' => 0,
	'parent' => -1,
	'exclude_tree' => '',
	'number' => '',
	'offset' => 0,
	'post_type' => 'page',
	'post_status' => 'publish'
);
$pages = get_pages($args);
//start loop
?>
<?php
foreach ($pages as $int => $page_data) {
	$content = apply_filters('the_content', $page_data->post_content);
	$title = $page_data->post_title;
	$slug = $page_data->post_name;
?>
<div class="slice <?php echo fmod($int, 2) ? 'even' : 'odd' ?> twelve row" id="<?php _e($slug); ?>">
	<h2 class="page-title"><?php _e($title); ?> (<?php echo fmod($int, 2) ? 'blue' : 'green' ?>)</h2>
		<?php _e($content); ?>
</div>
<?php } ?>
<?php get_footer(); ?>
