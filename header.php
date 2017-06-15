<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Woodland Realty Inc.</title>
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-66558078-1', 'auto');
  ga('send', 'pageview');

</script>
<div id="login">
	<table>
		<tr><td>
			<div class="form-container">
				<?php wp_login_form(); ?>
				<img class="close-button" src="<?php bloginfo('template_directory'); ?>/images/close.png" />
			</div>
			<div class="background"></div>
		</td></tr>
	</table>
</div>

<div id="agent-contact">
	<table>
		<tr><td>
		
			<?php $agent_query = new WP_Query(array('post_type'=>'agent', 'posts_per_page'=>999, 'orderby'=>'menu_order', 'order'=>'ASC')); ?>
			<?php if($agent_query->have_posts()) : while($agent_query->have_posts()) : $agent_query->the_post(); ?>
			
			<?php 
				$agent_name = get_the_title();
				$agent_email = get_field('agent_email');
			?>
			
			<div class="agent-form-<?php echo $post->ID; ?> form-container">
				<?php echo do_shortcode('[contact-form-7 id="63" title="Agent Contact"]'); ?>
				<?php if(current_user_can('administrator')) { echo $agent_email; } ?>
				<img class="close-button" src="<?php bloginfo('template_directory'); ?>/images/close.png" />
			</div>
				
			<?php endwhile; endif; wp_reset_query(); ?>
			
			<div class="background"></div>
			
		</td></tr>
	</table>
</div>

<div id="header" class="<?php if(is_user_logged_in()) {echo "header-shift";} ?>">

	<?php if(is_page(7)) { ?>
	<a href="#home" id="logo"></a>
	<?php } else { ?>
	<a href="<?php echo home_url(); ?>" id="logo-ex"></a>
	<?php } ?>
	
	<div id="nav-social">
		<a target="_BLANK" href="http://www.realtor.com/realestateagency/Woodland-Realty-Inc_Laurel_MS_1383324_479999664?DefaultTab=OfficeListingsTab" title="Realtor.com"><img src="<?php bloginfo('template_directory'); ?>/images/icon_realtorcom.png"></a>
		<a target="_BLANK" href="https://www.facebook.com/pages/Woodland-Realty-Inc/114875913470" title="Facebook"><img src="<?php bloginfo('template_directory'); ?>/images/icon_facebook.png"></a>
		<a target="_BLANK" href="https://twitter.com/woodlandreal" title="Twitter"><img src="<?php bloginfo('template_directory'); ?>/images/icon_twitter.png"></a>
		<a target="_BLANK" href="https://instagram.com/woodlandrealty/" title="Instagram"><img src="<?php bloginfo('template_directory'); ?>/images/icon_instagram.png"></a>
	</div>

	<div id="navigation" class="shadow-below">
		
		<?php $sublinks = new WP_Query(array('post_type'=>'page', 'post_parent'=>7, 'posts_per_page'=>999, 'orderby'=>'menu_order', 'order'=>'ASC')); ?>
		
		<div id="nav-mobile">
			<img src="<?php bloginfo('template_url'); ?>/images/icon_qs_close.png" /> Menu
			<span class="mobile-page">
				<?php if($sublinks->have_posts()) : while($sublinks->have_posts()) : $sublinks->the_post(); ?>
				<?php $post_id = $post->post_name; ?>
				<span class="<?php echo $post_id; ?>">
					<?php if(is_page(7)) { ?>
					: <span><?php the_title(); ?></span>
					<?php } ?>
				</span>
			<?php endwhile; endif; ?>
			</span>
		</div>
		
		<ul>
			<?php if($sublinks->have_posts()) : while($sublinks->have_posts()) : $sublinks->the_post(); ?>
				<?php $post_id = $post->post_name; $tooltip = get_field('navigation_tooltip'); ?>
				<li class="<?php echo $post_id; ?>">
					<?php if(is_page(7)) { ?>
					<a href="#<?php echo $post_id; ?>"><?php the_title(); ?></a>
					<?php } else { ?>
					<a href="<?php echo home_url(); ?>#<?php echo $post_id; ?>"><?php the_title(); ?></a>
					<?php } ?>
					<?php if($post_id == 'listings') { ?>
						<ul class="menu-dropdown">
							<li><a href="http://woodlandrealtyinc.idxbroker.com/idx/results/listings?pt=sfr&ccz=city&per=10&srt=prd">Residential Properties</a></li>
							<li><a href="http://woodlandrealtyinc.idxbroker.com/idx/results/listings?pt=ld&lp=0&ccz=city&per=10&srt=prd">Land & Lot Properties</a></li>
							<li><a href="http://woodlandrealtyinc.catylist.com/jsp/search/results.jsp" target="_blank">Commercial Properties</a></li>
						</ul>
					<?php } ?>
					<?php // if($tooltip != '') { ?>
						<!-- <div class="nav-tooltip-outer"><div class="nav-tooltip-inner"><img src="<?php bloginfo('template_directory'); ?>/images/tooltip.png" /><?php echo $tooltip; ?></div></div> -->
					<?php // } ?>
				</li>
			<?php endwhile; endif; ?>
		</ul>
		
		<?php wp_reset_query(); ?>
		
	</div>
</div>