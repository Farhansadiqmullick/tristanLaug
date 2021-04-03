<?php
/*
Template Name: Portfolio Template
*/

get_header();
?>

    <section class="designs" id="scroll-designs">
        <div class="container">
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
      
        </div>
    </section><!-- /designs -->
            
<?php get_footer();?>