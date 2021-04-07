<?php
/*
    Template Name: Home Template
*/

 get_header(); 
$banner = get_field('banner');
$designation_title = $banner['designation'];
$color = $banner['color'];
$overlay = $color['title_overlay'];
$overlay_d = $color['description_overlay'];
$description = $banner['description'];
?>
		<section class="banner has--overlay" style="background-image:linear-gradient(black, black), url('<?php echo esc_attr($banner['image']); ?>');">
			<div class="container h-100">
				<div class="row h-100 align-items-end">
					<div class="col-12">
						<div class="banner__content text-center">
							<h1 class="title fs text-uppercase" <?php printf('style="color:%s"',$overlay); ?>><?php echo esc_html($banner['name']); ?></h1>
							<p><?php echo esc_html($description); ?></p>
							<ul class="list-unstyled list-inline text-uppercase">
								<?php foreach($designation_title as $designation){
										printf('<li style="color:%s">%s</li>',$overlay_d, $designation['title']);
									}?>	
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section><!-- /banner -->

		<div id="primary" class="content-area">

			<section class="films" id="scroll-films">
				<div class="container">
				<?php $films_group = get_field('films');
				$films_r = $films_group['films'];
				?>
					<div class="row">
						<div class="col-12">
							
							<div class="entry-title text-center">
								<h2 class="title text-uppercase"><?php echo esc_html($films_group['title']); ?></h2>
							</div>
							
						</div>
					</div>
					<div class="row last-none">
						<div class="col-12">
							
							<?php
							$films = $films_r['films']; 
							$gallery = $films_r['gallery'];
							
								foreach($films as $film) :
								$image_single = get_the_post_thumbnail_url( $film->ID, 'large'); ?>
								
								<a href="<?php echo the_permalink($film->ID);?>" target="_blank" class="films__card has--overlay">
									<figure class="films__card-media">
									<?php printf('<img src="%s" class="img-fluid" alt="%s"></figure>',esc_url($image_single), get_template_directory_uri()."/images/empty.jpg");?>
									<div class="films__card-text text-center">
										<h2 class="title text-uppercase"><?php echo $film->post_title; ?></h2>
									
											<div class="films__card-text text-center">
												<?php $logos = $films['logos']; ?>
													<div class="festival-logos">
														<?php if($gallery) :
																foreach($gallery as $image) : ?>
															<figure class="media">
																<?php printf( '<img src="%s" class="img-fluid" alt="%s">', esc_attr( $image ), get_template_directory_uri()."/images/empty-log1.jpg"); ?>
															</figure>
															<?php endforeach; endif;?>	
													</div>
											</div>
									</div>
								</a>
									<?php endforeach; wp_reset_postdata();?>
						</div><!-- /films__card -->

						<div class="col-12">
							<?php $posts = $films_group['without_logos'];
							
							if(have_posts($posts)): 
								 foreach($posts as $post) : 
							?>

							<a href="<?php echo the_permalink($post->ID);?>" target="_blank" class="films__card has--overlay">
								<figure class="films__card-media">
									<?php $image_r = get_the_post_thumbnail_url( $post->ID, 'large');;
										if($image_r){
											printf( '<img src="%s" class="img-fluid" alt="%s">', esc_attr( $image_r ), get_template_directory_uri()."/images/empty.jpg");
										}
										?>
								</figure>
								<div class="films__card-text text-center">
									<h2 class="title text-uppercase"><?php echo $post->post_title;; ?></h2>
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
							
						<div class="text-center">
							<?php if($designs){
								$gallery = $designs['gallery']; 
								printf('%s', $gallery);
							}; ?>
						</div>	
					</div>
			</section><!-- /designs -->
			<?php $about = get_field('about'); 
				if(!empty($about)) :?>
			<section class="hm-about-us" id="scroll-contact">
				<div class="container">
					<div class="row">
						
						<div class="col-12">
							<div class="hm-about-us__content text-center">
								<h2 class="title text-uppercase"><?php echo esc_html($about['title']); ?></h2>

								<div class="des">
									<?php echo $about['paragraph']; ?>	
								</div>

								<?php $media = get_field('media', 'option');
								 if(!empty($media)) :
								$group = $media['group'];?>
									<div class="social-conetct">
										<div class="label-title"><?php echo esc_html($media['title']);?></div>

										<ul class="social-media list-inline">
											<?php 
											foreach($group as $selection) :
												$select = $selection['select'];
												if($select) {
													printf('<li><a href="%s" class="icon-%s" target="_blank"></a></li>',esc_url($selection[$select]), esc_html($select));
														}
											endforeach; ?>
										</ul>
									</div>
								<?php endif;
								$contact = $media['contact'];
									if(!empty($contact)) :?>
									<div class="btn-box">
										<a href="<?php echo esc_url($contact['link'])?>" class="btn"><?php echo esc_html($contact['title']); ?><i class="icon-email"></i></a>
									</div>
								<?php endif;?>
							</div>
						</div>
					</div>
				</div>
			</section>
			<?php endif;?>
		</div><!-- /content-area -->

		<section class="footer-top" id="scroll-tris">
			<div class="container">
				<div class="row">
					<?php  $image = get_field('image');
					if($image) : ?>
					<div class="col-12">
						<figure class="media justify-content-center">
							<?php printf('<img src="%s" class="img-fluid" alt="%s">', esc_attr($image), get_template_directory_uri()."/images/about.png"); ?>
						</figure>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</section><!-- /footer-top -->
<?php get_footer(); ?>