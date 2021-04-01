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
            </div>
        </div>
            <div class="row popup-gallery last-none">
                <?php $galleries = $portfolio['gallery']; 
                    if($galleries) :
                    foreach($galleries as $gallery) :
                ?>     
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <a href="<?php echo get_template_directory_uri(); ?>" class="popup-gallery-item">
                            <figure class="media">
                                <?php 
                                    if($gallery){
                                        printf( '<img src="%s" class="img-fluid" alt="%s">',  esc_url($gallery), get_template_directory_uri()."/images/designs-1.jpg");
                                    }	
                                    ?>
                            </figure>
                        </a>
                    </div><!-- /gallery-popup-item -->
                <?php endforeach; endif;?>

            </div>
        </div>
    </section><!-- /designs -->
            
<?php get_footer();?>