<?php global $themeum_options; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">

        <?php $status_url = rwmb_meta( 'thm_status_url' ); ?>

        <?php if($status_url != ''): ?>
            <div class="entry-status">
                <?php echo $status_url; ?>
            </div>
        <?php endif; ?>

    </header> <!--/.entry-header -->

    <div class="clearfix post-content media">
        <div class="pull-left">
            <h4 class="post-format">
                <i class="fa fa-eye-slash"></i>
            </h4>

        </div>
    <?php get_template_part( 'post-format/entry-content' ); ?> 

    </div>

</article> <!--/#post-->