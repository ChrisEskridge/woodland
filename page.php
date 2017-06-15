<?php get_header(); ?>

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

<?php get_footer(); ?>