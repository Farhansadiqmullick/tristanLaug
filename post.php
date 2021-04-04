<?php
get_header();


	if ( has_post_thumbnail() ) : ?>

		<section class="page-banner has--overlay" style="background-image:url('<?php echo esc_url(the_post_thumbnail_url('large')); ?>');">
		
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="page-banner__content text-center">
							<h1 class="title text-uppercase"><?php echo esc_html(the_title());?></h1>

							<div class="text">
								<a href="<?php the_permalink()?>"></a>
								<div class="content">
									<?php the_content();?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section><!-- /banner -->
	<?php endif; get_footer();?>