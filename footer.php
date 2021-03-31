<footer class="footer text-center">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="footer__entry-title text-uppercase">
							<?php $footer = get_field('content', 'option'); 
								$name = $footer['name'];
								$designtion = $footer['designation']
							?>
							<span><?php echo esc_html($name); ?></span>
							<span><?php echo esc_html($designtion); ?></span>
						</div>
							<div class="footer__widget">

								<?php
									wp_nav_menu( array(
										'menu'               => 'Footer Menu',
										'theme_location'     => 'footer',
										'depth'              => 1,
										'container'          => false,
										'menu_class'         => 'footer__widget-nav text-uppercase',
										'menu_id'            => '',
										'fallback_cb'        => 'wp_bootstrap_navwalker::fallback',
										'walker'             => new wp_bootstrap_navwalker(),
									));
								?>
							</div>
					</div><!-- /footer__widget -->
				</div>
		</footer><!-- /footer -->

		<?php wp_footer(); ?>
	</body>
</html>