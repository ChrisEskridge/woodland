<?php $resource_query = new WP_Query(array('post_type'=>'page', 'posts_per_page'=>8, 'post_parent'=>'15', 'orderby'=>'menu_order', 'order'=>'ASC')); ?>

<div id="resources-menu">

	<ul>
	
		<?php if($resource_query->have_posts()) : while($resource_query->have_posts()) : $resource_query->the_post(); ?>
		
		<?php $icon = get_field('res_tab_icon'); ?>
		<li id="resource-<?php echo $post->ID; ?>" class="resource-link"><a href="#"><img src="<?php echo $icon; ?>" /><br /><?php the_title(); ?></a></li>
		
		<?php endwhile; endif; ?>
		
	</ul>
	
</div>

<div id="resources-tabs">

	<?php 
		if($resource_query->have_posts()) : 
		$res_count = 0;
		while($resource_query->have_posts()) : $resource_query->the_post(); 
		$res_count++;
	?>

	<div class="resource-<?php echo $post->ID; ?> resource-content">
		
		<?php $resource_layout = get_field('res_sub_layout'); ?>
		
		<?php if($resource_layout == 'embed') { ?>
		
			<table class="embed-widget"><tr><td><?php the_field('embed_widget'); ?></td></tr></table>
			
		<?php } elseif($resource_layout == 'tabbed') { ?>
		
			<div class="resource-sub-nav">
				<ul>
					<?php 
						if(have_rows('tabbed_sections')) :
						$count = 0; 
						while (have_rows('tabbed_sections')) : the_row();
						$tabsection = get_sub_field('tab_section_title'); 
						$count++;
					?>
					<li id="r-<?php echo $res_count; ?>-t-<?php echo $count; ?>"><span class="mobile-show"><?php echo $count; ?></span><span class="mobile-hide"><?php echo $tabsection; ?></span></li>
					<?php endwhile; endif; ?>
				</ul>
			</div>
			
			<div class="resource-sub-tab">
				<?php 
					if(have_rows('tabbed_sections')) :
					$count = 0;
					while (have_rows('tabbed_sections')) : the_row(); 
					$count++;
				?>
				<div class="resource-sub-tab-inner r-<?php echo $res_count; ?>-t-<?php echo $count; ?>">
					<?php $tabsection = get_sub_field('tab_section_title'); $tabcontent = get_sub_field('tab_section_content'); ?>
					<h2 class="tab-mobile-title"><?php echo $tabsection; ?></h2>
					<?php echo $tabcontent; ?>
				</div>
				<?php endwhile; endif; ?>
			</div>
			
		<?php } elseif($resource_layout == 'simple') { ?>
		
			<div class="resource-simple">
				<?php $title = get_the_title(); $content = get_field('simple_content'); ?>
				<h2 class="tab-mobile-title"><?php echo $title; ?></h2>
				<?php echo $content; ?>
			</div>
		
		<?php } else { ?>
		
			<?php if(is_user_logged_in()) { ?>
				<?php edit_post_link('Click here to select a layout and add content for this section','<p>','</p>'); ?>
			<?php } ?>
			
		<?php } ?>
		
		<?php edit_post_link('Edit this Resource','<div class="section-edit">','</div>'); ?>
		
	</div>

	<?php endwhile; endif; ?>
	
</div>

<?php wp_reset_query(); ?>