<?php global $themeum_options; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<div class="entry-video">
            
            <?php $video_source = rwmb_meta( 'thm_video_source' ); ?>
            <?php $video = rwmb_meta( 'thm_video' ); ?>

            <?php if($video_source == 1): ?>
                <?php echo rwmb_meta( 'thm_video' ); ?>
            <?php elseif ($video_source == 2): ?>
                <?php echo '<iframe width="100%" height="350" src="http://www.youtube.com/embed/'.$video.'?rel=0&showinfo=0&modestbranding=1&hd=1&autohide=1&color=white" frameborder="0" allowfullscreen></iframe>'; ?>
            <?php elseif ($video_source == 3): ?>
                <?php echo '<iframe src="http://player.vimeo.com/video/'.$video.'?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="100%" height="350" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>'; ?>
            <?php endif; ?>

        </div>

    </header><!--/.entry-header -->

    <div class="clearfix post-content media">
        <div class="pull-left">
            <h4 class="post-format">
                <i class="fa fa-video-camera"></i>
            </h4>

        </div>
    <?php get_template_part( 'post-format/entry-content' ); ?> 

    </div>

</article> <!--/#post -->