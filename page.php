<?php

get_header();
?>

<?php $banner = get_field('banner');
$image = $banner['image'];
?>
	<section class="page-banner has--overlay" style="background-image:url('<?php echo esc_url($image); ?>');">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="page-banner__content text-center">
							<h1 class="title text-uppercase"><?php echo esc_html($banner['title']); ?></h1>
						</div>
					</div>
				</div>
			</div>
		</section><!-- /banner -->

		<div id="primary" class="content-area">
			<section class="single-page">
				<div class="container">
                <?php $about = get_field('about');
                $content = $about['content']; ?>
					<div class="row">
						<div class="col-12">
							<main class="main-content">
								<article class="articles">
									<div class="entry-title text-center">
										<h2 class="title h1 text-uppercase"><?php echo esc_html($about['title']);?></h2>
									</div>

									<div class="entry-content">
										<?php echo $content; ?>
									</div>
								</article><!-- /articles -->
							</main>
						</div>
					</div>
				</div>
			</section><!-- /single-page -->
		</div><!-- /content-area -->
<?php get_footer(); ?>