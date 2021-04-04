<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>
			<?php
            if( is_front_page() )
				{ 
					echo' Home '; echo' | '; echo bloginfo( 'name' ); 
				} 
				else 
				{ 
					wp_title( '' ); echo' | '; bloginfo( 'name' );  
				} 
			?>
        </title>

            <?php wp_head(); ?>
	</head>
	<body <?php body_class( ); ?>>
		<div id="sidr">
			<div class="mobile-header d-none">
				<div class="navbar-header">
				 	<button type="button" class="navbar-toggle in">
		                <i class="icon-cancel"></i>
		            </button>
				</div>
				<div class="navigation">
					<?php
				  		wp_nav_menu( array(
		                    'menu'               => 'Primary Mobile Menu',
		                    'theme_location'     => 'menu',
		                    'depth'              => 1,
		                    'container'          => false,
		                    'menu_class'         => 'nav navbar-nav',
		                    'menu_id'            => '',
		                    'fallback_cb'        => 'wp_bootstrap_navwalker::fallback',
		                    'walker'             => new wp_bootstrap_navwalker(),
		                ));
					?>
		  		</div>

			</div>
		</div><!-- /mobile-header -->

		<header class="header transparent">
			<nav class="navbar navbar-expand">
				<div class="container">
					<div class="navbar-header">
						<a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                            <?php
                                $header = get_field('header', 'option');
                                if(have_rows('header', 'option')) :
                                    while(have_rows('header', 'option')) : the_row() ;
                                     
										$logo = $header['logo'];
										$logo_b = $header['logo-black'];
										
										if ( $logo) 
											{
												printf( '<img src="%s" class="transparent-logo" alt="%s">', esc_url( $logo['url'] ), $logo['alt'] );
											}
											else
											{
												printf( '<img src="%s" class="img-fluid" alt="%s">', esc_attr($logo_b), get_bloginfo( 'name') );
											}

										$favicon = $header['favicon'];
										
										if ( $favicon ) 
											{
												printf('<link rel="icon" type="image/png" href="%s" sizes="32x32">', esc_url( $favicon['url'] ), $favicon['alt'] );
											}
											else
											{
												printf( '<link rel="icon" type="image/png" href="%s" sizes="32x32">', esc_url( get_theme_file_uri( 'images/white-logo.png' ) ), get_bloginfo( 'name') );
											}
									endwhile;
								endif;
							?>
						</a>
					</div>

					<div class="collapse navbar-collapse justify-content-end">
						<div class="navigation">
							<?php
								wp_nav_menu( array(
									'menu'               => 'Primary Menu',
									'theme_location'     => 'menu',
									'depth'              => 1,
									'container'          => false,
									'menu_class'         => 'nav navbar-nav ml-auto',
									'menu_id'            => '',
									'a_class'			=> 'scroll-trigger',					
									'fallback_cb'        => 'wp_bootstrap_navwalker::fallback',
									'walker'             => new wp_bootstrap_navwalker(),
								));
							?>
		  				</div>

						<ul class="navbar-nav navbar--nav-right">
							<li class="mobile-navbar-toggler d-none">
								<a href="#sidr"class="navbar-toggle">
									<span class="icon-bar"></span>
								  	<span class="icon-bar"></span>
								  	<span class="icon-bar"></span>
							  	</a>
							</li>
						</ul>
					</div>
				</div>
			</nav> <!-- /nav -->
			
		</header> <!-- /header -->
