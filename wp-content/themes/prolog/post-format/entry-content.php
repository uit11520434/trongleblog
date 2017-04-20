<?php global $themeum_options; ?>


    <div class="media-body">
        <h2 class="entry-title">
            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
            <?php if ( is_sticky() && is_home() && ! is_paged() ) { ?>
            <sup class="featured-post"><?php _e( 'Sticky', 'themeum' ) ?></sup>
            <?php } ?>
        </h2> <!-- //.entry-title -->

        <div class="clearfix entry-meta">
            <ul>
                <?php if (isset($themeum_options['blog-author']) && $themeum_options['blog-author'] ) { ?>
                <li class="author"> <i class="fa fa-user"></i> <?php the_author_posts_link() ?></li> 
                <?php }?>

                <?php if (isset($themeum_options['blog-date']) && $themeum_options['blog-date'] ) { ?>
                <li class="publish-date"><i class="fa fa-calendar"></i><time class="entry-date" datetime="<?php the_time( 'c' ); ?>"><?php the_time('j M,  Y'); ?></time></li>  
                <?php }?>

                <?php if (isset($themeum_options['blog-category']) && $themeum_options['blog-category'] ) { ?>
                <li class="category"><i class="fa fa-folder-open-o"></i><?php echo get_the_category_list(', '); ?></li>
                <?php }?>
                
                <?php if (isset($themeum_options['blog-tag']) && $themeum_options['blog-tag'] ) { ?>
                <li class="tag"><i class="fa fa-tags"></i><?php the_tags('', ', ', '<br />'); ?> </li>
                <?php }?>

                <?php if (isset($themeum_options['blog-comment']) && $themeum_options['blog-comment'] ){ ?> 
                <?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
                    <li class="comments-link">
                        <i class="fa fa-comments-o"></i> <?php comments_popup_link( '<span class="leave-reply">' . __( 'No comment', 'themeum' ) . '</span>', __( 'One comment', 'themeum' ), __( '% comments', 'themeum' ) ); ?>
                    </li>
                <?php endif; //.comment-link ?>
                <?php } ?>

                <?php if (isset($themeum_options['blog-edit-en']) && $themeum_options['blog-edit-en']) { ?>
                    <li class="edit-link">
                         <?php edit_post_link( __( 'Edit', 'themeum' ), '<span class="edit-link"><i class="fa fa-edit"></i>', '</span>' ); ?>
                    </li>
                <?php } ?>
            </ul>
        </div> <!--/.entry-meta -->

        <div class="entry-summary">
            <?php if ( is_single() ) {
                the_content();
            } else {
                the_excerpt();  
            } 
            wp_link_pages( array(
                'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'themeum' ) . '</span>',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
            ) );

            ?>
        </div> <!-- //.entry-summary -->
        <?php
         if (isset($themeum_options['blog-social']) && $themeum_options['blog-social'] ){
            if(is_single()) {
                get_template_part( 'post-format/social-buttons' );
            }
        }
        ?>
    </div>
