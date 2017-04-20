<?php global $themeum_options; ?>

<?php if ($themeum_options['sidebar-prfile-en']) {?>

	<div class="my-profile clearfix">
		<div class="profile-bg">
			<?php if (isset($themeum_options['profile-lg-img'])) {?>
			<img class="img-responsive" src="<?php echo $themeum_options['profile-lg-img']['url']; ?>">
			<?php }?>

			<?php if (isset($themeum_options['profile-sm-img'])) {?>
			<div class="profile-img">
				<img class="img-responsive" src="<?php echo $themeum_options['profile-sm-img']['url']; ?>">
			</div>
			<?php }?>
		</div>

		<div class="profile-desc">
			<?php if (isset($themeum_options['profile-name'])) {?>
				<h2><?php echo $themeum_options['profile-name']; ?></h2>
			<?php }?>
			<?php if (isset($themeum_options['profile-desg'])) {?>
				<span><?php echo $themeum_options['profile-desg']; ?></span>
			<?php }?>
			<?php if (isset($themeum_options['profile-desc'])) {?>
			<p><?php echo $themeum_options['profile-desc']; ?></p>
			<?php }?>
		</div>

		<?php get_template_part( 'social-share'); ?>
	</div>

<?php }?>
