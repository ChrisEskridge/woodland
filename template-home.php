<?php
/*
Template Name: Home Page
*/
?>

<?php get_header(); ?>

<div id="home" class="page-section">

	<?php $slides = new WP_Query(array('post_type' => 'slide', 'posts_per_page' => 999)); ?>
	<?php if($slides->have_posts()) : ?>
		<?php $countposts = wp_count_posts('slide'); $publishedposts = $countposts->publish; ?>
		<?php if ($publishedposts > 1) { ?>
		<div id="slideshow" data-cycle-slides="div" data-cycle-pause-on-hover=".slide-description">
		<?php } else { ?>
		<div id="slide-single">
		<?php } ?>
			<?php while ($slides->have_posts()) : $slides->the_post(); ?>
				<?php $image = get_field('upload_slide'); $title = get_the_title(); $caption = get_field('slide_caption'); $link = get_field('link_to_listing'); ?>
				<div class="slideshow-image" style="background-image:url('<?php echo $image; ?>');">
					<?php edit_post_link('Edit Slide','<span class="section-edit">','</span>'); ?>
					<?php if(is_user_logged_in()){ ?><span class="section-edit section-edit-2"><a href="/wp-admin/post-new.php?post_type=slide">Add New Slide</a></span><?php } ?>
					<?php if($title != '' || $caption != '' || $link != ''){ ?>
						<p class="slide-description">
							<?php if ($title != '') { echo '<span class="slide-title">' . $title . '</span>'; } ?>
							<?php if ($caption != '') { echo $caption; } ?>
							<?php if ($link != '') { ?><a href="<?php echo $link; ?>">view listing &raquo;</a><?php } ?>
						</p>
					<?php } ?>
				</div>
			<?php endwhile; ?>
		</div>
	<?php endif; wp_reset_query(); ?>
	
	<div id="listing-search" class="shadow-above">
		<div id="quick-search-button"><h4><img src="<?php bloginfo('template_url'); ?>/images/icon_qs_open.png" />Quick Property Search</h4></div>
		<table><tr><td><?php the_field('quick_search'); ?></td></tr></table>
	</div>
	
</div>

<?php $subpages = new WP_Query(array('post_type'=>'page', 'post_parent'=>7, 'posts_per_page'=>999, 'orderby'=>'menu_order', 'order'=>'ASC')); ?>
<?php if($subpages->have_posts()) : while($subpages->have_posts()) : $subpages->the_post(); ?>
	
	<?php $post_id = $post->post_name; $id_number = get_the_ID(); ?>
	
	<div class="page-section" id="<?php echo $post_id; ?>">
	
		<?php if($id_number == 11) { //------------------ Listings Page ?>
			<?php get_template_part('section','listings'); ?>
			
		<?php } elseif($id_number == 13) { // -------------- About Page ?>
			<?php get_template_part('section','about'); ?>
		
		<?php } elseif($id_number == 165) { // -------------- Agents Page ?>
			<?php get_template_part('section','agents'); ?>
			
		<?php } elseif($id_number == 15) { // ---------- Resources Page ?>
			<?php get_template_part('section','resources'); ?>
			
		<?php } elseif($id_number == 17) { // ------------ Contact Page ?>
			<?php get_template_part('section','contact'); ?>
			
		<?php } else { ?>
			<?php the_content(); ?>
		
		<?php } ?>
		
	</div>
	
<?php endwhile; endif; wp_reset_query(); ?>

</div>

<?php get_footer(); ?>