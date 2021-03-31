<?php get_header(); 
$banner = get_field('banner');
$designation = $banner['designation'];
?>
		<section class="banner has--overlay" style="background-image:linear-gradient(black, black), url('<?php echo esc_attr($banner['image']); ?>');">
			<div class="container h-100">
				<div class="row h-100 align-items-end">
					<div class="col-12">
						<div class="banner__content text-center">
							<h1 class="title fs text-uppercase"><?php echo esc_html($banner['name']); ?></h1>
							<ul class="list-unstyled list-inline text-uppercase">
								<li><?php echo esc_html($designation['title_1'])?></li>
								<li><?php echo esc_html($designation['title_2'])?></li>
								<li><?php echo esc_html($designation['title_3'])?></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section><!-- /banner -->

		<div id="primary" class="content-area">

			<section class="films" id="scroll-films">
				<div class="container">
				<?php $films = get_field('films'); ?>
					<div class="row">
						<div class="col-12">
							<div class="entry-title text-center">
								<h2 class="title text-uppercase"><?php echo esc_html($films['title']); ?></h2>
							</div>
						</div>
					</div>
					<div class="row last-none">
						<div class="col-12">
							
							<?php
								$posts = $films['film'];
								if(have_posts($posts)): 
									foreach($posts as $post) :
									
							?>
							<a href="<?php the_permalink(); ?>" class="films__card has--overlay">
								<figure class="films__card-media">
									<?php $image = the_post_thumbnail( 'large');
									if($image){
										printf( '<img src="%s" class="img-fluid" alt="%s">', esc_attr( $image ), $image['alt']);
									}
									?>
								</figure>
								<div class="films__card-text text-center">
									<h2 class="title text-uppercase"><?php echo esc_html(the_title()); ?></h2>
									<?php $logos = $films['logos'];
									
									$logo1= $logos[0]; 
									$logo2= $logos[1]; 
									$logo3= $logos[2]; 
									$logo4= $logos[3]; 
									?>
									<div class="festival-logos">
										<figure class="media">
												<?php if($logo1){
													echo wp_get_attachment_image($logo1, array(263,132));
												}
												?>
										</figure>
										<figure class="media">
										<?php if($logo2){
											echo wp_get_attachment_image($logo2, array(263,132));
										}
										?>
										</figure>
										<figure class="media">
										<?php if($logo3){
											echo wp_get_attachment_image($logo3, array(263,132));
										}
										?>
										</figure>
										<figure class="media">
										<?php if($logo3){
											echo wp_get_attachment_image($logo4, array(263,132));
										}
										?>
										</figure>
									</div>
								</div>
							</a>

							<?php 
								 endforeach;
							endif;?>
						</div><!-- /films__card -->

						<div class="col-12">
							<?php $rand_posts = get_field('without_logos');
							$posts = $rand_posts['posts'];
							var_dump($posts);
								if(have_posts($posts)): 
									foreach($posts as $post): setup_postdata();
							var_dump($post);
							?>

							<a href="<?php the_permalink();?>" class="films__card has--overlay">
								<figure class="films__card-media">
									<?php $image = the_post_thumbnail('large');
										if($image){
											printf( '<img src="%s" class="img-fluid" alt="%s">', esc_attr( $image ), $image['alt']);
										}
										?>
								</figure>
								<div class="films__card-text text-center">
									<h2 class="title text-uppercase"><?php echo esc_html(the_title()); ?></h2>
								</div>
							</a>
								<?php wp_reset_postdata();
							 endforeach; endif; ?>
						</div><!-- /films__card -->

					
					</div>
				</div>
			</section><!-- /films -->

			<section class="designs" id="scroll-designs">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="entry-title text-center">
								<h2 class="title text-uppercase">Designs</h2>
							</div>
						</div>
					</div>

					<div class="row popup-gallery last-none">
						<div class="col-lg-4 col-md-6 col-sm-6">
							<a href="../images/designs-1.jpg" class="popup-gallery-item">
								<figure class="media">
									<img src="<?php echo get_template_directory_uri( )."/images/designs-1.jpg"; ?>" alt="" class="img-fluid">
								</figure>
							</a>
						</div><!-- /gallery-popup-item -->

						<div class="col-lg-4 col-md-6 col-sm-6">
							<a href="../images/designs-2.jpg" class="popup-gallery-item">
								<figure class="media">
									<img src="<?php echo get_template_directory_uri( )."/images/designs-2.jpg"; ?>" alt="" class="img-fluid">
								</figure>
							</a>
						</div><!-- /gallery-popup-item -->

						<div class="col-lg-4 col-md-6 col-sm-6">
							<a href="../images/designs-3.jpg" class="popup-gallery-item">
								<figure class="media">
									<img src="<?php echo get_template_directory_uri( )."/images/designs-3.jpg"; ?>" alt="" class="img-fluid">
								</figure>
							</a>
						</div><!-- /gallery-popup-item -->

						<div class="col-lg-4 col-md-6 col-sm-6">
							<a href="../images/designs-4.jpg" class="popup-gallery-item">
								<figure class="media">
									<img src="<?php echo get_template_directory_uri( )."/images/designs-4.jpg"; ?>" alt="" class="img-fluid">
								</figure>
							</a>
						</div><!-- /gallery-popup-item -->

						<div class="col-lg-4 col-md-6 col-sm-6">
							<a href="../images/designs-5.jpg" class="popup-gallery-item">
								<figure class="media">
									<img src="<?php echo get_template_directory_uri( )."/images/designs-5.jpg"; ?>" alt="" class="img-fluid">
								</figure>
							</a>
						</div><!-- /gallery-popup-item -->

						<div class="col-lg-4 col-md-6 col-sm-6">
							<a href="../images/designs-6.jpg" class="popup-gallery-item">
								<figure class="media">
									<img src="<?php echo get_template_directory_uri( )."/images/designs-6.jpg"; ?>" alt="" class="img-fluid">
								</figure>
							</a>
						</div><!-- /gallery-popup-item -->
					</div>
				</div>
			</section><!-- /designs -->

			<section class="hm-about-us" id="scroll-contact">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="hm-about-us__content text-center">
								<h2 class="title text-uppercase">About Tristan</h2>

								<div class="des">
									<p>Sharine’s combined passions for writing, archiving, media creating and curating has made her a credible source for pop culture commentary and criticism, and a trusted voice for the latest in Jamaican music and culture.</p>
									<p>The music and culture documentarian is a JUNO Award judge, verified tastemaker on discovery streaming hub Audiomack and currently holds a seat as a juror for the Polaris Music Prize,  Prism Prize, SOCAN Songwriting Prize and FACTOR.</p>
								</div>

								<div class="social-conetct">
									<div class="label-title">Connect with me below:</div>

									<ul class="social-media list-inline">
										<li><a href="#" class="icon-twitter" target="_blank"></a></li>
										<li><a href="#" class="icon-vimeo" target="_blank"></a></li>
										<li><a href="#" class="icon-instagram" target="_blank"></a></li>
										<li><a href="#" class="icon-youtube" target="_blank"></a></li>
										<li><a href="#" class="icon-behance" target="_blank"></a></li>
									</ul>
								</div>

								<div class="btn-box">
									<a href="#" class="btn">Contact Me <i class="icon-email"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div><!-- /content-area -->

		<section class="footer-top" id="scroll-tris">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<figure class="media justify-content-center">
							<img src="<?php echo get_template_directory_uri( )."/images/about.png"; ?>" class="img-fluid" alt="">
						</figure>
					</div>
				</div>
			</div>
		</section><!-- /footer-top -->
<?php get_footer(); ?>