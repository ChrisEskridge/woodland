<div id="contact-info">
	<?php	if(have_rows('contact_information')) : while (have_rows('contact_information')) : the_row();  ?>
	<?php
		$ci_office = get_sub_field('ci_office');
		$ci_address = get_sub_field('ci_address');
		$ci_phone = get_sub_field('ci_phone');
		$ci_fax = get_sub_field('ci_fax');
	?>
	<div class="contact-box">
		<h3><?php echo $ci_office; ?></h3><?php edit_post_link('Edit','<div class="section-edit">','</div>'); ?>
		<?php if ($ci_address != '') { echo '<p><span class="label">Address</span><span>' . $ci_address . '</span></p>'; } ?>
		<?php if ($ci_phone != '') { echo '<p><span class="label">Phone</span><span>' . $ci_phone . '</span></p>'; } ?>
		<?php if ($ci_fax != '') { echo '<p><span class="label">Fax</span><span>' . $ci_fax . '</span></p>'; } ?>
	</div>
	<?php endwhile; endif; ?>
	
	<div class="contact-box contact-social">
		<h3>Connect With Us</h3>
		<p><a target="_BLANK" href="http://www.realtor.com/realestateagency/Woodland-Realty-Inc_Laurel_MS_1383324_479999664?DefaultTab=OfficeListingsTab" title="Realtor.com"><img src="<?php bloginfo('template_directory'); ?>/images/icon_realtorcom.png"> Realtor.com</a></p>
		<p><a target="_BLANK" href="https://www.facebook.com/pages/Woodland-Realty-Inc/114875913470" title="Facebook"><img src="<?php bloginfo('template_directory'); ?>/images/icon_facebook.png"> Facebook</a></p>
		<p><a target="_BLANK" href="https://twitter.com/woodlandreal" title="Twitter"><img src="<?php bloginfo('template_directory'); ?>/images/icon_twitter.png"> Twitter</a></p>
		<p><a target="_BLANK" href="https://instagram.com/woodlandrealty/" title="Instagram"><img src="<?php bloginfo('template_directory'); ?>/images/icon_instagram.png"> Instagram</a></p>
	</div>
</div>

<div id="contact-form">
	<div class="contact-form-inner">
		<?php $cf_shortcode = get_field('contact_form_shortcode'); ?>
		<?php echo do_shortcode($cf_shortcode); ?>
	</div>
</div>