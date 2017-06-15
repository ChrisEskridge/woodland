<?php get_header(); ?>

<?php $test_bg = get_field('testimonials_bg', 165); ?>

<div class="page-section">

	<ul id="agent">
		
		<?php 
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
					</td>
				</tr>
			
			</table>
		</li>
		
	</ul>
	
	<div id="agent-social">
		<div class="agent-social-inner">
			<?php if($agent_facebook != '') { ?><div class="agent-social-link"><a href="<?php echo $agent_facebook; ?>" target="_BLANK">Facebook</a></div><?php } ?>
			<?php if($agent_twitter != '') { ?><div class="agent-social-link"><a href="<?php echo $agent_twitter; ?>" target="_BLANK">Twitter</a></div><?php } ?>
			<?php if($agent_linkedin != '') { ?><div class="agent-social-link"><a href="<?php echo $agent_linkedin; ?>" target="_BLANK">LinkedIn</a></div><?php } ?>
			<?php if($agent_trulia != '') { ?><div class="agent-social-link"><a href="<?php echo $agent_trulia; ?>" target="_BLANK">Trulia</a></div><?php } ?>
			<?php if($agent_zillow != '') { ?><div class="agent-social-link"><a href="<?php echo $agent_zillow; ?>" target="_BLANK">Zillow</a></div><?php } ?>
		</div>
	</div>
	
	<?php if(have_rows('agent_testimonials')) : ?>
	
	<div id="testimonial" style="background-image:url('<?php echo $test_bg; ?>');">
		
		<span id="testimonials" style="position:absolute; top:-200px;"></span>
		<h2>Testimonials</h2>
	
		<?php while( have_rows('agent_testimonials')) : the_row(); ?>
		<?php $quote = get_sub_field('agent_test_quote'); ?>
		<div class="testimonial-single"><?php echo $quote; ?></div>
		<?php endwhile; ?>
		
	</div>
	
	<?php endif; ?>

</div>

<?php get_footer(); ?>