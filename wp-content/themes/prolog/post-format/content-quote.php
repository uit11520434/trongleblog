<?php global $themeum_options; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">

        <div class="entry-qoute">
            <blockquote>
                <p><?php echo rwmb_meta( 'thm_qoute' ); ?></p>
                <small><?php echo rwmb_meta( 'thm_qoute_author' ); ?></small>
            </blockquote>
        </div>

    </header><!--/.entry-header -->

    <div class="clearfix post-content media">
        <div class="pull-left">
            <h4 class="post-format">
                <i class="fa fa-quote-left"></i>
            </h4>

        </div>
    <?php get_template_part( 'post-format/entry-content' ); ?> 

    </div>

</article> <!--/#post -->