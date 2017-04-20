
    <?php global $themeum_options; ?>
    <footer id="footer">
        <div class="container">
            <div class="footer">
                <div class="row">
                    <?php if (isset($themeum_options['copyright-en']) && $themeum_options['copyright-en']){?>
                        <div class="col-sm-6">
                          <?php if(isset($themeum_options['copyright-text'])) echo $themeum_options['copyright-text']; ?>
                        </div>
                    <?php }?>

                    <?php if (isset($themeum_options['footer-menu']) && $themeum_options['footer-menu']) {?>
                        <div class="col-sm-6">
                            <?php if(has_nav_menu('secondary')): ?>
                                <?php wp_nav_menu( array( 'theme_location' => 'secondary', 'container'  => false, 'menu_class' => 'footer-menu','depth' => 1 ) ); ?>
                            <?php endif; ?>
                        </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->
</div>
<?php if(isset($themeum['before_body']))  echo $themeum['before_body']; ?>
<?php if(isset($themeum_options['google-analytics'])) echo $themeum_options['google-analytics'];?>

<?php wp_footer(); ?>
</body>
</html>