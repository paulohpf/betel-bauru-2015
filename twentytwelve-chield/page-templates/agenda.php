<?php
/**
 * Template Name: Agenda Page Template, No Sidebar
 *
 * Description: Twenty Twelve loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

<?php
$html = "";
$url = "https://www.google.com/calendar/feeds/2mrvro339bfus5ath872sujvtk%40group.calendar.google.com/public/basic";
$xml = simplexml_load_file($url);
for($i = 0; $i < 25; $i++){
	$title = $xml->entry[$i]->title;

        $html .= "<a href='#'><h3>$title</h3></a>";
}
echo $html;
?>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>