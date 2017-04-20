<?php
/*
 * Template Name: About Me
 */
get_header(); 
global $themeum_options;
?>

<div id="about-me">
	<div class="container">
		<?php if ($themeum_options['profile-top-banner']) { ?>
			<div class="profile">
				<?php if ( isset($themeum_options['profile-top-img-lg']) ) { ?>
					<img class="img-responsive" src="<?php echo  $themeum_options['profile-top-img-lg']['url']; ?>">
				<?php }?>	
				<div class="profile-inner clearfix">
					<div class="porfile-info pull-left media">
						<div class="pull-left">
							<?php if ( isset($themeum_options['profile-top-img-sm']) ) { ?>
								<img class="img-responsive" src="<?php echo  $themeum_options['profile-top-img-sm']['url']; ?>">
							<?php }?>	
						</div>
						<div class="media-body">
							<?php if ( isset($themeum_options['profile-page-name']) ) { ?>
								<h2><?php echo  $themeum_options['profile-page-name'];?></h2>
							<?php }?>

							<?php if ( isset($themeum_options['profile-page-desg']) ) { ?>
								<span><?php echo  $themeum_options['profile-page-desg'];?></span>
							<?php }?>
						</div>
					</div>
					<?php if ($themeum_options['download-en']) { ?>
						<div class="pull-right">
							<?php if ( isset($themeum_options['download-text']) ) { ?>
								<a class="btn-commom btn-cv-download" href="<?php echo  $themeum_options['download-link'];?>" target="_blank"><?php echo  $themeum_options['download-text'];?></a>
							<?php }?>
						</div>
					<?php }?>
				</div>
			</div>

		<?php }?>

        <div id="content" class="site-content default-page" role="main">
            <?php /* The loop */ ?>
            <?php while ( have_posts() ): the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <!-- <h1 class="entry-title"><?php the_title(); ?></h1> -->

                    <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
                    <div class="entry-thumbnail">
                        <?php the_post_thumbnail(); ?>
                    </div>
                    <?php endif; ?>

                    <div class="entry-content">
                        <?php the_content(); ?>
                        <?php wp_link_pages(); ?>
                    </div>

                </article>

                <?php // comment_template(); ?>

            <?php endwhile; ?>
        </div> <!--/#content-->

	</div>
</div>

<?php get_footer();