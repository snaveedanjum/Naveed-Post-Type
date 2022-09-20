<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
function npt_add_new_page() {
	$url = npt_get_setting('url' );
	$home_url         = admin_url( 'admin.php?page=naveed-post-types' );
	$npt_post_url     = admin_url( 'edit.php?post_type=npt-post-type' );
	$npt_new_post_url     = admin_url( 'post-new.php?post_type=npt-post-type' );
	$npt_taxonomy_url = admin_url( 'edit.php?post_type=npt-taxonomy' );
	$npt_new_taxonomy_url = admin_url( 'post-new.php?post_type=npt-taxonomy' );
	?>


	<div class = "npt-wrap" id="poststuff">
		<div class="postbox postbox-container" id="postbox-container-2">
			<div class="postbox-header ">
				<h2 class="hndle ui-sortable-handle meta-box-header">Post Types</h2>
			</div>
			<div class="settings">
				<div class="registered-post-outer">
					<div class="posts-registered">
						<?php $count = wp_count_posts('npt-post-type')->publish;
						if ($count > 1) {
							$post_type_text = 'Post Types';
						} else {
							$post_type_text = 'Post Type';
						}
						if ($count == 0) {
							$publish_text = '';
						}else {
							$publish_text = '<h5>Recently Published</h5>';
						} ?>
						<h4><?php echo $count; ?> <?php echo $post_type_text; ?> Registered</h4>
						<?php echo $publish_text; ?>
					</div>
					<div class="register-new">
						<a href="<?php echo $npt_new_post_url; ?>"><span class="dashicons dashicons-plus-alt2"></span>Register New</a>
					</div>
				</div>
				<?php 
				$args = array(
					'numberposts' => 2,
					'post_type'   => 'npt-post-type'
				);
				$npt_posts = get_posts( $args );
				if ($npt_posts) {
					?>
					<ul class="registered-ul">
						<?php  foreach($npt_posts as $post) { ?>
							<li>
								<a href="<?php echo get_edit_post_link( $post->ID ); ?>"><?php echo $post->post_title; ?></a>
								<a href="<?php echo get_edit_post_link( $post->ID ); ?>"><span class="dashicons dashicons-edit-page"></span>Edit</a>
							</li>
						<?php  } ?>
					</ul>
				<?php  } ?>
				<div id="major-publishing-actions">
					<div id="publishing-action">
						<a href="<?php echo $npt_post_url; ?>" class="button button-primary button-large">View All</a>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>





		<div class="postbox postbox-container" id="postbox-container-2">
			<div class="postbox-header ">
				<h2 class="hndle ui-sortable-handle meta-box-header">Taxonomies</h2>
			</div>
			<div class="settings">
				<div class="registered-post-outer">
					<div class="posts-registered">
						<?php $count = wp_count_posts('npt-taxonomy')->publish;
						if ($count > 1) {
							$taxonomy_text = 'Taxonomies';
						} else {
							$taxonomy_text = 'Taxonomy';
						}
						if ($count == 0) {
							$publish_text = '';
						}else {
							$publish_text = '<h5>Recently Published</h5>';
						} ?>
						<h4><?php echo $count; ?> <?php echo $taxonomy_text; ?> Registered</h4>
						<?php echo $publish_text; ?>
					</div>
					<div class="register-new">
						<a href="<?php echo $npt_new_taxonomy_url; ?>"><span class="dashicons dashicons-plus-alt2"></span>Register New</a>
					</div>
				</div>
				<?php 
				$args = array(
					'numberposts' => 2,
					'post_type'   => 'npt-taxonomy'
				);
				$npt_taxonomy = get_posts( $args );
				if ($npt_taxonomy) {
					?>
					<ul class="registered-ul">
						<?php  foreach($npt_taxonomy as $taxonomy) { ?>
							<li>
								<a href="<?php echo get_edit_post_link( $taxonomy->ID ); ?>"><?php echo $taxonomy->post_title; ?></a>
								<a href="<?php echo get_edit_post_link( $taxonomy->ID ); ?>"><span class="dashicons dashicons-edit-page"></span>Edit</a>
							</li>
						<?php  } ?>
					</ul>
				<?php  } ?>
				<div id="major-publishing-actions">
					<div id="publishing-action">
						<a href="<?php echo $npt_taxonomy_url; ?>" class="button button-primary button-large">View All</a>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>
	<?php
}