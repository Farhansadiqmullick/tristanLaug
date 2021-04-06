<?php
/*
Template Name: Single Film Template
*/

get_header();
$banner = get_field('banner');
if($banner!= 'null') :  
$image = $banner['image']; ?>

		<section class="page-banner has--overlay" style="background-image:url(<?php echo esc_attr($image) ;?>);">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="page-banner__content text-center">
							<h1 class="title text-uppercase"><?php echo esc_html($banner['title']);?></h1>
						</div>
					</div>
				</div>
			</div>
		</section><!-- /banner -->

		<div id="primary" class="content-area">
			<section class="festival-logos">
				<div class="container">
                    <?php $logos = get_field('logos');
                    $single_image = $logos['image'];
                    $images = $logos['gallery'];?>
					<div class="row last-none justify-content-center">
						<div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center align-items-center">
							<a class="festival-logos__item">
								<?php 
								
									printf('<a class="festival-logos__item" href="%s"><img src="%s" class="img-fluid" alt="%s"></a>', esc_url($single_image['link']), esc_attr($single_image['image']), get_template_directory_uri().'/images/festival-logos-1.png');
								?>
                            
						</div><!-- /festival-logos__item -->
							<?php 
								if($images) : 
								foreach($images as $image)
								{
									printf('<div class="col-lg-2 col-md-3 col-sm-6  d-flex justify-content-center align-items-center">
									<a class="festival-logos__item" href="%s">
									<figure class="media">
										<img src="%s" alt="%s" class="img-fluid">
									</figure>
								</a></div>',$image['link'], $image['image'], get_template_directory_uri( )."/images/festival-logos-1.png");
                                }
							endif;?>
							

      
						<!-- /festival-logos__item -->
					</div>
				</div>
			</section><!-- /festival-logos -->
<?php endif;?>
			<section class="films-empty" style="background-color: #866F37; color: #fff;">
				<div class="container">
                    <?php $details = get_field('details');
                    $notes = $details['details'];
                    $video = $details['video']; 
                    ?>
					<div class="row">
						<div class="col-12">
							<div class="films-empty__content text-center">
								<h2 class="title h1 text-uppercase"><?php echo esc_html($details['title'])?></h2>
								<h4 class="sub-title text-uppercase"><?php _e('Dir: ', 'TristanLaug');?><?php echo esc_html($details['name']);?></h4>
								<div class="meta-wrap"><?php echo esc_html($notes['year'])."/".esc_html($notes['time'])."min /".esc_html($notes['location'])."/".esc_html($notes['language']);?></div>
								<div class="desc">
									<p><?php echo esc_html($details['description'])?></p>
								</div>
							</div>

							<div class="films-empty__embed">
								<iframe src='<?php echo esc_url($video['link'])?>' frameborder='0' allow="autoplay; fullscreen; picture-in-picture" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
							</div>
						</div>
					</div>
				</div>
			</section><!-- /films-empty -->

			<section class="credits">
				<div class="container">
					<?php $credits = get_field('credits'); ?>
					<div class="row">
						<div class="col-12">
							<div class="entry-title text-center">
								<h2 class="title text-uppercase"><?php echo esc_html($credits['title']); ?></h2>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="credits__card">

							<?php 
							printf('<a class="credits-popup-fit" href="%s">
							<img src="%s" class="img-fluid" alt="%s">
						</a>', $credits['image'], $credits['image'],get_template_directory_uri()."/images/credits-1.jpg");
							?>

							<?php $content = $credits['content']; ?>
								<div class="credits__card-content">

									<ul class="list-unstyled">
										<li>
											<strong><?php _e('Year', 'TristanLaug')?></strong>
											<span><?php echo esc_html($content['year']); ?></span>
										</li>
										<li>
											<strong><?php _e('Director: ', 'TristanLaug')?></strong> 
											<span><?php echo esc_html($content['director']); ?></span>
										</li>
										<li>
											<strong><?php _e('Producer: ', 'TristanLaug')?></strong>
											<span><?php echo esc_html($content['producer']); ?></span>
										</li>
										<?php $starrings = $content['starring']; ?>
										<li>
											<strong><?php _e('Starring: ', 'TristanLaug')?></strong>

											<?php foreach($starrings as $starring) : ?>
													<span><?php echo esc_html($starring['name']);?></span>
											<?php endforeach;
											?>
											
										 
										</li>
									</ul>

									<ul class="list-unstyled view-credits">
										<li>
											<strong><?php _e('Executive Producer: ', 'TristanLaug')?></strong>
											<span><?php echo esc_html($content['executive']); ?></span>
										</li>
										<li>
											<?php $casts = $content['cast']; ?>
											<strong><?php _e('Cast: ', 'TristanLaug')?></strong>
											<?php foreach($casts as $cast) : ?>
											<span><?php echo esc_html($cast['name']); ?></span>  
											<?php endforeach; ?>
										</li>
									</ul>
									<div class="btn-box">
										<a class="btn btn-view-credits">
											<span class="visible-text"><?php _e('View Credits', 'Tristanlaug')?></span> 
											<span class="hidden-text"><?php _e('Minimize', 'Tristanlaug')?></span> 
											<i class="icon-view-credits"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section><!-- /credits -->

			<section class="photo-gallery">
				<div class="container">
					<div class="row">
						<?php $scenes = get_field('scenes'); ?>
						<div class="col-12">
							<div class="entry-title text-center">
								<h2 class="title text-uppercase"><?php echo esc_html($scenes['title'])?></h2>
							</div>
							<?php 
								if($scenes) :
								$gallery = $scenes['gallery'];
								printf('%s',$gallery);
								endif;	 ?>
						</div>
					</div>

				</div>
			</section><!-- /photo-gallery -->

			<section class="awards">
				<div class="container">
					<?php $awards = get_field('awards');
					$awards_r = $awards['awards'];?>
					<div class="row">
						<div class="col-12">
							<div class="awards__content text-center">
								<h2 class="title text-uppercase"><?php echo esc_html($awards['title']);?></h2>
								<div class="quick-links">
									<?php
									foreach($awards_r as $award){
										printf('<a href="%s">%s</a>',esc_url($award['link']),esc_html($award['award']));
									}
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section><!-- /awards -->

			<section class="press">
				<div class="container">
					<?php $press_rev = get_field('press');
					$press_r = $press_rev['press']; ?>
					<div class="row">
						<div class="col-12">
							<div class="press__content text-center">
								<h2 class="title text-uppercase"><?php echo esc_html($press_rev['title']);?></h2>

								<div class="quick-links">
									<?php
									foreach($press_r as $press){
										printf('<a href="%s">%s</a>',esc_url($press['link']),esc_html($press['press']));
									}
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section><!-- /press -->

			<section class="partners">
				<div class="container">
					<?php $partners = get_field('partners');
					$images = $partners['images']; 
					?>
					<div class="row">
						<div class="col-12">
							<div class="entry-title text-center">
								<h2 class="title text-uppercase"><?php echo esc_html($partners['title']);?></h2>
							</div>
						</div>
					</div>
					<div class="row justify-content-center last-none">
						<?php foreach($images as $image) : 
							?>
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="partners__logo">
								<?php
								printf('<img src="%s" class="img-fluid" alt="%s">',esc_url($image['image']),get_template_directory_uri()."/images/partners-1.png");
								?>
							</div>
						</div><!-- /partners__logo -->
						<?php endforeach; ?>
						
					</div>
				</div>
			</section><!-- /partners -->
		</div><!-- /content-area -->
<?php get_footer();?>