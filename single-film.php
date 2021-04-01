<?php
/*
Template Name: Single Film Template
*/

get_header();
$banner = get_field('banner');
$image = $banner['image'];
?>

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
                    $image = $logos['image'];
                    $images = $logos['gallery'];?>
					<div class="row last-none justify-content-center">
						<div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center align-items-center">
							<a class="festival-logos__item">
                            <?php 
                            if($image){
                                printf('<img src="%s" class="img-fluid" alt="%s">', esc_attr($image), get_template_directory_uri().'/images/festival-logos-1.png');
                            }
                            ?>
                            </a>
						</div><!-- /festival-logos__item -->

						<div class="col-lg-2 col-md-3 col-sm-6  d-flex justify-content-center align-items-center">
                            <a class="festival-logos__item">
                                <?php 
                                if($images[0]){
                                    printf('<img src="%s" class="img-fluid" alt="%s">', esc_attr($images[0]), get_template_directory_uri().'/images/festival-logos-2.png');
                                }
                                ?>
                            </a>    
                        
                        
						</div><!-- /festival-logos__item -->

						<div class="col-lg-2 col-md-3 col-sm-6  d-flex justify-content-center align-items-center">
                            <a class="festival-logos__item">
                                <?php 
                                if($images[1]){
                                    printf('<img src="%s" class="img-fluid" alt="%s">', esc_attr($images[1]), get_template_directory_uri().'/images/festival-logos-3.png');
                                }
                                ?>
                            </a>  
						</div><!-- /festival-logos__item -->

						<div class="col-lg-2 col-md-3 col-sm-6  d-flex justify-content-center align-items-center">
                            <a class="festival-logos__item">
                                <?php 
                                if($images[2]){
                                    printf('<img src="%s" class="img-fluid" alt="%s">', esc_attr($images[2]), get_template_directory_uri().'/images/festival-logos-4.png');
                                }
                                ?>
                            </a>  
						</div><!-- /festival-logos__item -->

						<div class="col-lg-2 col-md-3 col-sm-6  d-flex justify-content-center align-items-center">
                             <a class="festival-logos__item">
                                <?php 
                                if($images[3]){
                                    printf('<img src="%s" class="img-fluid" alt="%s">', esc_attr($images[3]), get_template_directory_uri().'/images/festival-logos-5.png');
                                }
                                ?>
                            </a>  
						</div><!-- /festival-logos__item -->
					</div>
				</div>
			</section><!-- /festival-logos -->

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
					<div class="row">
						<div class="col-12">
							<div class="entry-title text-center">
								<h2 class="title text-uppercase">Credits</h2>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="credits__card">
								<a class="credits-popup-fit" href="../images/credits-1.jpg">
									<img src="../images/credits-1.jpg" class="img-fluid" alt="">
								</a>

								<div class="credits__card-content">

									<ul class="list-unstyled">
										<li>
											<strong>Year:</strong>
											<span>2019</span>
										</li>
										<li>
											<strong>Director:</strong> 
											<span>Tristan Laughton</span>
										</li>
										<li>
											<strong>Producer:</strong>
											<span>George Kalivas</span>
										</li>
										<li>
											<strong>Starring:</strong>
											<span>David Friend</span>
											<span>Gregory Bennett</span>  
										</li>
									</ul>

									<ul class="list-unstyled view-credits">
										<li>
											<strong>Executive Producer:</strong>
											<span>David Friend</span>
										</li>
										<li>
											<strong>Cast:</strong>
											<span>George Kalivas</span>  
											<span>David Friend</span>
											<span>George Kalivas</span>  
											<span>David Friend</span>
											<span>George Kalivas</span>  
											<span>David Friend</span>
										</li>
									</ul>
									<div class="btn-box">
										<a class="btn btn-view-credits">
											<span class="visible-text">View Credits</span> 
											<span class="hidden-text">Minimize</span> 
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
						<div class="col-12">
							<div class="entry-title text-center">
								<h2 class="title text-uppercase">Behind The Scenes</h2>
							</div>
						</div>
					</div>

					<div class="row popup-gallery last-none">
						<div class="col-md-6 col-sm-6">
							<a href="../images/gallery-1.jpg" class="popup-gallery-item">
								<figure class="media">
									<img src="../images/gallery-1.jpg" alt="" class="img-fluid">
								</figure>
							</a>
						</div><!-- /gallery-popup-item -->

						<div class="col-md-6 col-sm-6">
							<a href="../images/gallery-2.jpg" class="popup-gallery-item">
								<figure class="media">
									<img src="../images/gallery-2.jpg" alt="" class="img-fluid">
								</figure>
							</a>
						</div><!-- /gallery-popup-item -->

						<div class="col-md-6 col-sm-6">
							<a href="../images/gallery-3.jpg" class="popup-gallery-item">
								<figure class="media">
									<img src="../images/gallery-3.jpg" alt="" class="img-fluid">
								</figure>
							</a>
						</div><!-- /gallery-popup-item -->

						<div class="col-md-6 col-sm-6">
							<a href="../images/gallery-4.jpg" class="popup-gallery-item">
								<figure class="media">
									<img src="../images/gallery-4.jpg" alt="" class="img-fluid">
								</figure>
							</a>
						</div><!-- /gallery-popup-item -->
					</div>
				</div>
			</section><!-- /photo-gallery -->

			<section class="awards">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="awards__content text-center">
								<h2 class="title text-uppercase">Selections And Awards</h2>

								<div class="quick-links">
									<a href="#">Durham Region International Film Festival 2020</a>
									<a>DuToronto Arthouse Film Festival 2020</a>
									<a>Regent Park Film Festival 2020</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section><!-- /awards -->

			<section class="press">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="press__content text-center">
								<h2 class="title text-uppercase">Selections And Awards</h2>

								<div class="quick-links">
									<a href="#">Durham Region International Film Festival 2020</a>
									<a>DuToronto Arthouse Film Festival 2020</a>
									<a>Regent Park Film Festival 2020</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section><!-- /press -->

			<section class="partners">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="entry-title text-center">
								<h2 class="title text-uppercase">Partners</h2>
							</div>
						</div>
					</div>
					<div class="row justify-content-center last-none">
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="partners__logo">
								<img src="../images/partners-1.png" class="img-fluid" alt="">
							</div>
						</div><!-- /partners__logo -->

						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="partners__logo">
								<img src="../images/partners-1.png" class="img-fluid" alt="">
							</div>
						</div><!-- /partners__logo -->
					</div>
				</div>
			</section><!-- /partners -->
		</div><!-- /content-area -->
<?php get_footer();?>