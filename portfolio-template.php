<?php
/*
Template Name: Portfolio Template
*/
get_header();
?>


	<section class="designs">
        <div class="container" style="margin-top:100px;">
            <?php 
                $portfolio = get_field('portfolio');         
            ?>	
            
            <div class="row">
                <div class="col-12">
                    <div class="entry-title text-center">
                        <h2 class="title text-uppercase"><?php echo esc_html($portfolio['title']);?></h2>
                    </div>
                    <div class="text-center">
                        <?php esc_html(the_content()); ?>
                    </div>
                </div>
            </div>

            <div class="row">
					<div class="col-12">
						<?php if ( get_previous_posts_link() || get_next_posts_link() ): ?>
						<div class="pagination">
							<div class="float-left">
								<?php 
									if ( get_previous_posts_link() ) 
									{
										previous_posts_link('<i class="icon-arrow-left"></i> Previous');
									} 
								?>
							</div>

							<div class="float-right">
								<?php 
									if ( get_next_posts_link() ) 
									{
										next_posts_link('Next <i class="icon-arrow-right"></i>');
									}
								?>
							</div>
						</div><!-- /pagination -->
						<?php endif; ?>
					</div>
				</div>
      
        </div>
    </section><!-- /portfolio -->
<div class="row">
	<div class="col-12">         
		<?php get_footer();?>
	</div>
</div>