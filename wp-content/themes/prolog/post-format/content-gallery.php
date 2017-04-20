<?php global $themeum_options; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">

        <?php $slides = rwmb_meta('thm_gallery_images','type=image_advanced'); ?>
        <?php $count = count($slides); ?>
        <?php if($count > 0): ?>


                <!-- Wrapper for slides -->
                <ul class="gallery-format">

                    <?php $slide_no = 1; ?>

                    <?php foreach( $slides as $slide ): ?>

                        <?php
                            $images = wp_get_attachment_image_src( $slide['ID'], 'xs-blog-gallery' );

                            if (is_page_template('blog-full-width.php') || is_page_template('blog-masonry-col3.php') || is_page_template('blog-masonry-col4.php') || is_page_template('blog-masonry-col2.php')) {
                                $images = wp_get_attachment_image_src( $slide['ID'], 'blog-gallery' );
                            }
                            
                            $full_images = wp_get_attachment_image_src( $slide['ID'], 'full' );
                        ?>
                        <li>
                            <img class="img-responsive" src="<?php echo $images[0]; ?>" alt="">
                            <div class="overlay">
                                <a href="<?php echo $full_images[0]; ?>" data-rel="prettyPhoto"><?php _e( 'Preview', 'themeum' ) ?></a>
                            </div>
                        </li>
                        <?php $slide_no++ ?>
                    <?php endforeach; ?>

                </ul>

        <?php endif; ?>

    </header> <!--/.entry-header -->

    <div class="clearfix post-content media">
        <div class="pull-left">
            <h4 class="post-format">
                <i class="fa fa-picture-o"></i>
            </h4>

        </div>
    <?php get_template_part( 'post-format/entry-content' ); ?> 

    </div>

</article> <!--/#post -->