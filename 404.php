<?php
get_header();?>
<div id="primary" class="content-area">
<div class="header-gutter"></div>
        <section class="banner">
			<div class="container new">
				<div class="row">
					<div class="col-md-12">
                        <div class="entry-title text-center">
							<?php
							 $error = get_field('error', 'option');
                                echo '<div class="entry-title text-center">';
								if ($error['title']) 
								{
									printf('<h1 class="title text-uppercase">%s</h1>', $error['title']);
								}
								else
								{
									printf('<h1 class="title text-uppercase">%s</h1>', '404');
                                }
                                
								echo '</div>';

								echo '<div class="page-content">';
								if ($error['description']) 
								{
									printf('%s', $error['description']);
								}
								else
								{
									printf('<p>%s</p>', 'It looks like nothing was found at this location. Maybe try one of the links below or a search?')."<br />";
                                }
                                echo '</div>';

                                
                                
                                echo '<div class="page-content">';
                                echo PHP_EOL.PHP_EOL;
								if ($error['button']) 
								{
									printf('%s', $error['button']);
								}
								else
								{
									printf('<a href="%s" class="btn">%s</a>', esc_url( home_url( '/' ) ) , 'Go Back To Home',);
								}
								echo '</div>';
							?>
						</div><!-- .error-404 -->
					</div>
				</div>
			</div>
		</section>

	</div>

<?php get_footer();?>