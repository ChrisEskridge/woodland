<div class="about-agents">

	<div id="mobile-agents-tabs">
		<h4 class="laurel"><span>Laurel</span></h4>
		<h4 class="hattiesburg"><span>Hattiesburg</span></h4>
	</div>

	<?php // ---------- LAUREL AGENTS ---------- ?>
	
	<?php $agent_query = new WP_Query(array('post_type'=>'agent', 'posts_per_page'=>999, 'meta_key'=>'office', 'meta_value'=>'laurel', 'orderby'=>'menu_order', 'order'=>'ASC')); ?>
	<?php if($agent_query->have_posts()) : ?>
	
	<h4 class="agents-group agents-group-laurel">Laurel Agents</h4>

	<ul class="agents-list agents-list-laurel">
	
		<?php while($agent_query->have_posts()) : $agent_query->the_post(); ?>
		
		<?php 
			$agent_link = get_permalink();
			$agent_name = get_the_title();
			$agent_photo = get_field('agent_photo');
			$agent_title = get_field('agent_title');
			$agent_description = get_field('agent_description');
			$agent_office = get_field('office');
			$agent_phone = get_field('agent_phone');
			$agent_mobile = get_field('agent_mobile');
			$agent_email = get_field('agent_email');
			$agent_linkedin = get_field('agent_linkedin');
			$agent_form = 'agent-form-'.$post->ID;
			$agent_testimonials = get_field('agent_testimonials');
			$agent_facebook = get_field('agent_facebook');
			$agent_twitter = get_field('agent_twitter');
			$agent_instagram = get_field('agent_instagram');
			$agent_linkedin = get_field('agent_linkedin');
			$agent_trulia = get_field('agent_trulia');
			$agent_zillow = get_field('agent_zillow');
			$agent_realtor = get_field('agent_realtor');
		?> 
		
		<li>
			<div class="agents-li-wrapper">
				<div class="agents-li-inner">
					<div class="agent-photo" style="background-image:url('<?php echo $agent_photo; ?>'); "></div>
					<h3><?php echo $agent_name; ?></h3>
					<h4><?php echo $agent_title; ?></h4>
					<a href="<?php echo $agent_link; ?>"><img src="<?php bloginfo('template_directory'); ?>/images/icon_rightarrow.png" /> Agent Profile</a>
					<?php if($agent_email != '') { ?><a href="#" id="<?php echo $agent_form; ?>" class="agent-contact"><img src="<?php bloginfo('template_directory'); ?>/images/icon_rightarrow.png" /> Contact</a><?php } ?>
					<?php if(have_rows('agent_testimonials')) : ?><a href="<?php echo $agent_link; ?>#testimonials"><img src="<?php bloginfo('template_directory'); ?>/images/icon_rightarrow.png" /> Testimonials</a><?php endif; ?>
				</div>
			</div>
		</li>
		
		<?php endwhile; ?>
		
	</ul>
	
	<?php endif; wp_reset_query(); ?>
	
	<?php // ---------- HATTIESBURG AGENTS ---------- ?>
	
	<?php $agent_query = new WP_Query(array('post_type'=>'agent', 'posts_per_page'=>999, 'meta_key'=>'office', 'meta_value'=>'hattiesburg', 'orderby'=>'menu_order', 'order'=>'ASC')); ?>
	<?php if($agent_query->have_posts()) : ?>

	<h4 class="agents-group agents-group-hattiesburg">Hattiesburg Agents</h4>

	<ul class="agents-list agents-list-hattiesburg">
	
		<?php while($agent_query->have_posts()) : $agent_query->the_post(); ?>
		
		<?php 
			$agent_link = get_permalink();
			$agent_name = get_the_title();
			$agent_photo = get_field('agent_photo');
			$agent_title = get_field('agent_title');
			$agent_description = get_field('agent_description');
			$agent_office = get_field('office');
			$agent_phone = get_field('agent_phone');
			$agent_mobile = get_field('agent_mobile');
			$agent_email = get_field('agent_email');
			$agent_linkedin = get_field('agent_linkedin');
			$agent_form = 'agent-form-'.$post->ID;
			$agent_testimonials = get_field('agent_testimonials');
			$agent_facebook = get_field('agent_facebook');
			$agent_twitter = get_field('agent_twitter');
			$agent_instagram = get_field('agent_instagram');
			$agent_linkedin = get_field('agent_linkedin');
			$agent_trulia = get_field('agent_trulia');
			$agent_zillow = get_field('agent_zillow');
			$agent_realtor = get_field('agent_realtor');
		?> 
		
		<li>
			<div class="agents-li-wrapper">
				<div class="agents-li-inner">
					<div class="agent-photo" style="background-image:url('<?php echo $agent_photo; ?>'); "></div>
					<h3><?php echo $agent_name; ?></h3>
					<h4><?php echo $agent_title; ?></h4>
					<a href="<?php echo $agent_link; ?>"><img src="<?php bloginfo('template_directory'); ?>/images/icon_rightarrow.png" /> Agent Profile</a>
					<?php if($agent_email != '') { ?><a href="#" id="<?php echo $agent_form; ?>" class="agent-contact"><img src="<?php bloginfo('template_directory'); ?>/images/icon_rightarrow.png" /> Contact</a><?php } ?>
					<?php if(have_rows('agent_testimonials')) : ?><a href="<?php echo $agent_link; ?>#testimonials"><img src="<?php bloginfo('template_directory'); ?>/images/icon_rightarrow.png" /> Testimonials</a><?php endif; ?>
				</div>
			</div>
		</li>
		
		<?php endwhile; ?>
		
	</ul>
	
	<?php endif; wp_reset_query(); ?>

</div>

<!--

<div class="about-agents">

	<div id="agents-nav">
		<span id="agent-prev"><img src="<?php bloginfo('template_directory'); ?>/images/arrow-left.png" /></span>
		<span class="agents-pager"></span>
		<span id="agent-next"><img src="<?php bloginfo('template_directory'); ?>/images/arrow-right.png" /></span>
	</div>

	<ul id="agent" data-cycle-slides="li" data-cycle-pager=".agents-pager" data-cycle-prev="#agent-prev" data-cycle-next="#agent-next" data-cycle-swipe=true data-cycle-swipe-fx=scrollHorz data-cycle-auto-height=container >
		
		<?php $agent_query = new WP_Query(array('post_type'=>'agent', 'posts_per_page'=>999, 'orderby'=>'menu_order', 'order'=>'ASC')); ?>
		<?php if($agent_query->have_posts()) : while($agent_query->have_posts()) : $agent_query->the_post(); ?>
		
		<?php 
			$agent_link = get_permalink();
			$agent_name = get_the_title();
			$agent_photo = get_field('agent_photo');
			$agent_title = get_field('agent_title');
			$agent_description = get_field('agent_description');
			$agent_phone = get_field('agent_phone');
			$agent_mobile = get_field('agent_mobile');
			$agent_email = get_field('agent_email');
			$agent_linkedin = get_field('agent_linkedin');
			$agent_form = 'agent-form-'.$post->ID;
			$agent_testimonials = get_field('agent_testimonials');
			$agent_facebook = get_field('agent_facebook');
			$agent_twitter = get_field('agent_twitter');
			$agent_instagram = get_field('agent_instagram');
			$agent_linkedin = get_field('agent_linkedin');
			$agent_trulia = get_field('agent_trulia');
			$agent_zillow = get_field('agent_zillow');
			$agent_realtor = get_field('agent_realtor');
		?> 
	
		<li>
			<?php edit_post_link('Edit Agent','<div class="section-edit">','</div>'); ?>
			<table class="agent">
				<tr>
					<td class="agent-photo-td">
						<img src="<?php echo $agent_photo; ?>">
					</td>
					<td class="agent-info-td">
						<h2 class="agent-name"><?php echo $agent_name; ?></h2>
						<h3 class="agent-title"><?php echo $agent_title; ?></h3>
						<div class="agent-links">
							<?php if($agent_phone != '') { ?><a href="tel:<?php echo preg_replace("/[^0-9]/","",$agent_phone); ?>"><img class="expand" src="<?php bloginfo('template_directory'); ?>/images/icon_phone.png" /><span><?php echo $agent_phone; ?></span></a><?php } ?>
							<?php if($agent_mobile != '') { ?><a href="tel:<?php echo preg_replace("/[^0-9]/","",$agent_mobile); ?>"><img class="expand" src="<?php bloginfo('template_directory'); ?>/images/icon_mobile.png" /><span><?php echo $agent_mobile; ?></span></a><?php } ?>
							<?php if($agent_email != '') { ?><a href="#" id="<?php echo $agent_form; ?>" class="agent-contact"><img class="normal" src="<?php bloginfo('template_directory'); ?>/images/icon_email.png" /></a><?php } ?>
						</div>
						<p><?php echo $agent_description; ?></p>
						<p class="agent-social">
							<?php if(have_rows('agent_testimonials')) : ?><a href="<?php echo $agent_link; ?>#testimonials">Testimonials</a><?php endif; ?>
							<?php if($agent_facebook != '') { ?><a href="<?php echo $agent_facebook; ?>" target="_BLANK">Facebook</a><?php } ?>
							<?php if($agent_twitter != '') { ?><a href="<?php echo $agent_twitter; ?>" target="_BLANK">Twitter</a><?php } ?>
							<?php if($agent_linkedin != '') { ?><a href="<?php echo $agent_linkedin; ?>" target="_BLANK">LinkedIn</a><?php } ?>
							<?php if($agent_trulia != '') { ?><a href="<?php echo $agent_trulia; ?>" target="_BLANK">Trulia</a><?php } ?>
							<?php if($agent_zillow != '') { ?><a href="<?php echo $agent_zillow; ?>" target="_BLANK">Zillow</a><?php } ?>
						</p>
					</td>
				</tr>
			
			</table>
		</li>
		
		<?php endwhile; endif; wp_reset_query(); ?>
		
	</ul>

</div>

-->