<?php get_header(); 
global $themeum_options;
?>

    <section id="main" class="container">
        <div class="row">
            <div id="content" class="site-content col-md-8" role="main">

                <?php if ( have_posts() ) : ?>

                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php get_template_part( 'post-format/content', get_post_format() ); ?>

                         <?php if ( isset($themeum_options['post-nav-en']) && $themeum_options['post-nav-en'] ) { ?>
                            <div class="clearfix post-navigation">
                                <?php previous_post_link('<span class="btn-style previous-post pull-left">%link</span>','<i class="fa fa-long-arrow-left"></i> previous article'); ?>
                                 <?php next_post_link('<span class="btn-style next-post pull-right">%link</span>','next article <i class="fa fa-long-arrow-right"></i>'); ?>
                            </div> <!-- .post-navigation -->
                        <?php } ?>
                    
                        <?php
                            if ( comments_open() || get_comments_number() ) {
                                if ($themeum_options['blog-single-comment-en']) {
                                    comments_template();
                                }
                            }
                        ?>
                        <?php
                            // don't-delete 
                            $count_post = get_post_meta( $post->ID, '_post_views_count', true);
                            
                            if( $count_post == ''){
                                $count_post = 0;
                                delete_post_meta( $post->ID, '_post_views_count');
                                add_post_meta( $post->ID, '_post_views_count', $count_post);
                            }
                            else
                            {
                                $count_post = (int)$count_post + 1;
                                update_post_meta( $post->ID, '_post_views_count', $count_post);
                                
                            }
                        ?>
                    <?php endwhile; ?>

                    
                <?php else: ?>
                    <?php get_template_part( 'post-format/content', 'none' ); ?>
                <?php endif; ?>
        
            </div> <!-- #content -->

            <div id="sidebar" class="col-md-4" role="complementary">
                <?php get_template_part( 'my-profile'); ?>
                <div class="sidebar-inner">
                    <aside class="widget-area">
                        <?php dynamic_sidebar( 'sidebar' ); ?>
                    </aside>
                </div>
            </div> <!-- #sidebar -->

        </div> <!-- .row -->
    </section> <!-- .container -->

<?php get_footer();