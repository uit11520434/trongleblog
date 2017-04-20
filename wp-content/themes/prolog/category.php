<?php get_header(); ?>

<section id="main" class="container">
    <div class="subtitle">
        <div class="row">
            <div class="col-xs-6 col-sm-6">
                <?php single_cat_title( '', true ); ?>
            </div>    
            <div class="col-xs-6 col-sm-6">
                <?php themeum_breadcrumbs(); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div id="content" class="site-content col-md-8" role="main">

            <?php if ( have_posts() ) : ?>

                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'post-format/content', get_post_format() ); ?>
                <?php endwhile; ?>

                <div class="btn btn-style pull-left"><?php next_posts_link( '&laquo; Older Posts' ); ?></div>
                <div class="btn btn-style pull-right"><?php previous_posts_link( 'Newer Posts &raquo;' ); ?></div>

            <?php else: ?>
                <?php get_template_part( 'post-format/content', 'none' ); ?>
            <?php endif; ?>

        </div> <!-- #content -->

        <div id="sidebar" class="col-md-4" role="complementary">
            <div class="sidebar-inner">
                <aside class="widget-area">
                    <?php dynamic_sidebar('sidebar');?>
                </aside>
            </div>
        </div> <!-- #sidebar -->

    </div> <!-- .row -->
</section> <!-- .contaainer -->

<?php get_footer();