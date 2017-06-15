<div class="about-history">

	<div id="history-nav">
		<span id="history-prev"><img src="<?php bloginfo('template_directory'); ?>/images/arrow-left.png" /></span>
		<span class="history-pager"></span>
		<span id="history-next"><img src="<?php bloginfo('template_directory'); ?>/images/arrow-right.png" /></span>
	</div>

	<?php edit_post_link('Edit Company Info','<div class="section-edit">','</div>'); ?>
	
	<?php // <div id="history-nav"><span class="history-pager"></span></div> ?>

	<ul id="history" data-cycle-slides="li" data-cycle-pager=".history-pager" data-cycle-prev="#history-prev" data-cycle-next="#history-next" data-cycle-swipe=true data-cycle-swipe-fx=scrollHorz >
		<?php if(have_rows('about_slides')) : while(have_rows('about_slides')) : the_row(); ?>
		<?php $slide_bg = get_sub_field('about_slide_bg'); ?>
		<li style="background-image:url('<?php echo $slide_bg; ?>');"><table><tr><td>
			<?php the_sub_field('about_slide_text'); ?>
		</td></tr></table></li>
		<?php endwhile; endif; ?>
	</ul>

</div>