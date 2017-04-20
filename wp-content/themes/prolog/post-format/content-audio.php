<?php global $themeum_options; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">

        <div class="entry-audio">
            <?php echo rwmb_meta( 'thm_audio_code' ); ?>
        </div> <!--/.audio-content -->

    </header><!--/.entry-header -->

    <div class="clearfix post-content media">
        <div class="pull-left">
            <h4 class="post-format">
                <i class="fa fa-music"></i>
            </h4>

        </div>
    <?php get_template_part( 'post-format/entry-content' ); ?> 

    </div>

</article> <!--/#post -->