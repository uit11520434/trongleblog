<?php global $themeum_options; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if ( has_post_thumbnail() && ! post_password_required() ) { ?>
        <header class="entry-header">
            <div class="entry-thumbnail">
                <?php if (is_page_template('blog-full-width.php')) {
                    the_post_thumbnail('blog-full', array('class' => 'img-responsive'));
                } else {
                    the_post_thumbnail('blog-thumb', array('class' => 'img-responsive'));
                } ?>
            </div>
        </header>
    <?php } //.entry-thumbnail ?>

    <div class="clearfix post-content media">
        <div class="pull-left">
            <h4 class="post-format">
                <i class="fa fa-picture-o"></i>
            </h4>

        </div>
    <?php get_template_part( 'post-format/entry-content' ); ?> 

    </div>

</article> <!--/#post-->