<?php
/*
    Template Name: Home Template
*/

 get_header(); 
$banner = get_field('banner');
$designation = $banner['designation'];
$description = $banner['description'];
?>
		<section class="banner has--overlay" style="background-image:linear-gradient(black, black), url('<?php echo esc_attr($banner['image']); ?>');">
			<div class="container h-100">
				<div class="row h-100 align-items-end">
					<div class="col-12">
						<div class="banner__content text-center">
							<h1 class="title fs text-uppercase"><?php echo esc_html($banner['name']); ?></h1>
							<p><?php echo esc_html($description); ?></p>
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
                <?php $films = get_field('films'); 
                
                ?>
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
									
								
							?>
							<a href="<?php the_permalink(150) ;?>" class="films__card has--overlay">
								<figure class="films__card-media">
									<?php
									$image = get_the_post_thumbnail_url( $posts->ID, 'large');
								
									
								
									if($image){
										printf( '<img src="%s" class="img-fluid" alt="%s">',  esc_url($image), get_template_directory_uri()."/images/empty.jpg");
									}	
									?>
								</figure>
								<div class="films__card-text text-center">
									<h2 class="title text-uppercase"><?php echo esc_html($posts->post_title); ?></h2>
									<?php $logos = $films['logos'];
									?>
									<div class="festival-logos">
										<figure class="media">
												<?php if($logos[0]){
													echo wp_get_attachment_image($logos[0], array(263,132));
												}
												?>
										</figure>
										<figure class="media">
											<?php if($logos[1]){
												echo wp_get_attachment_image($logos[1], array(263,132));
												}
											?>
										</figure>
										<figure class="media">
											<?php if($logos[2]){
												echo wp_get_attachment_image($logos[2], array(263,132));
												}
											?>
										</figure>
										<figure class="media">
											<?php if($logos[3]){
												echo wp_get_attachment_image($logos[3], array(263,132));
												}
											?>
										</figure>
									</div>
								</div>
							</a>

							<?php endif;?>
						</div><!-- /films__card -->

						<div class="col-12">
							<?php $rand_posts = get_field('without_logos');
							$posts = $rand_posts['posts'];
							if(have_posts($posts)): 
								foreach($posts as $post) : 
									
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
								<?php
							endforeach; wp_reset_postdata(); endif; ?>
						</div><!-- /films__card -->
					</div>
				</div>
			</section><!-- /films -->

			<section class="designs" id="scroll-designs">
				<div class="container">
             		 <?php 
						$designs = get_field('designs'); ?>	
				
				<div class="row">
						<div class="col-12">
							<div class="entry-title text-center">
								<h2 class="title text-uppercase"><?php echo esc_html($designs['title']);?></h2>
							</div>
						</div>
					</div>
							<?php $galleries = $designs['gallery']; 
							
							if(have_posts($galleries)) : ?>
								<div class="row popup-gallery last-none">
							<?php	foreach($galleries as $gallery) : ?>
								<div class="col-lg-4 col-md-6 col-sm-6">

							<?php	printf('<a href="%s" class="popup-gallery-item">
										<figure class="media">
											<img src="%s"; ?>" alt="%s" class="img-fluid">
										</figure>
									</a>',$gallery, $gallery, get_template_directory_uri( )."/images/designs-1.jpg");?>
									
								</div><!-- /gallery-popup-item -->
							<?php endforeach; endif;?>

						
					</div>
				</div>
			</section><!-- /designs -->

			<section class="hm-about-us" id="scroll-contact">
				<div class="container">
					<div class="row">
						<?php $about = get_field('about'); 
                       ?>
						<div class="col-12">
							<div class="hm-about-us__content text-center">
								<h2 class="title text-uppercase"><?php echo esc_html($about['title']); ?></h2>

								<div class="des">
									<p><?php echo esc_html($about['para_1']); ?></p>
									<p><?php echo esc_html($about['para_2']); ?></p>
								</div>
								<?php $media = get_field('media');
								$group = $media['group'];
								$select = $group['select']; ?>
								<div class="social-conetct">
									<div class="label-title"><?php esc_html($media['title']);?></div>

									<ul class="social-media list-inline">
										<?php if($select) :
											foreach($select as $social)
												{
									
													printf('<li><a href="%s" class="icon-%s" target="_blank"></a></li>',esc_url($group[$social]), esc_html($social));
												}
										endif;
											?>
									</ul>
								</div>

								<div class="btn-box">
									<?php $contact = $media['contact']; ?>
									<a href="<?php echo esc_url($contact['link'])?>" class="btn"><?php echo esc_html($contact['title']); ?><i class="icon-email"></i></a>
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
					<?php  $image = get_field('image'); ?>
					<div class="col-12">
						<figure class="media justify-content-center">
							<?php printf('<img src="%s" class="img-fluid" alt="%s">', esc_attr($image), get_template_directory_uri()."/images/about.png"); ?>
						</figure>
					</div>
				</div>
			</div>
		</section><!-- /footer-top -->
<?php get_footer(); ?>