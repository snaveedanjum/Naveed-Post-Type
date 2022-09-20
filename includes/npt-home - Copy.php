<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function npt_add_new_page() {
	$url = npt_get_setting('url' );
	?>
	<style type="text/css">#wpcontent, #wpwrap { padding: 0; background-color: #fff; }</style>
    <div class = "npt-wrap">
        <div class="npt-header">
            <div class="npt-container npt-flex">
                <img src="<?php echo $url . 'assets/images/npt-logo.svg'; ?>"><h1>Naveed Post Types</h1>
                <ul class="npt-nav-list">
                	<?php 
					$home_url         = admin_url( 'admin.php?page=naveed-post-types' );
					$npt_post_url     = admin_url( 'edit.php?post_type=npt-post-type' );
					$npt_new_post_url     = admin_url( 'post-new.php?post_type=npt-post-type' );
					$npt_taxonomy_url = admin_url( 'edit.php?post_type=npt-taxonomy' );
					$npt_new_taxonomy_url = admin_url( 'post-new.php?post_type=npt-taxonomy' );
					?>
                    <li class="active"><a href="<?php echo $home_url ?>">Home</a></li>
                    <li class="nav-item"><a href="<?php echo $npt_post_url ?>">Post Types</a></li>
                    <li class="nav-item"><a href="<?php echo $npt_taxonomy_url ?>">Taxonomies</a></li>
                </ul>
            </div>
        </div>

        <div class="npt-container">

            <div class = "npt-post-box">
                <div class = "post-box-inner">
                    <table class = "table">
                        <tr valign = "middle">
                            <th scope = "row">
                                <div class = "table-field heading">
                                    <h2 class = "header-box">Post Types</h2>
                                </div>
                            </th>
                            <td>
                                <div class = "table-field data">
                                   <a href = "<?php echo $npt_post_url; ?>">View All Post Types</a>
                                    <a href = "<?php echo $npt_new_post_url; ?>">Register New Post Type</a>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class = "npt-post-box">
                <div class = "post-box-inner">
                    <table class = "table">
                        <tr valign = "middle">
                            <th scope = "row">
                                <div class = "table-field heading">
                                    <h2 class = "header-box">Taxonomies</h2>
                                </div>
                            </th>
                            <td>
                                <div class = "table-field data">
                                   <a href = "<?php echo $npt_taxonomy_url; ?>">View All Taxonomies</a>
                                    <a href = "<?php echo $npt_new_taxonomy_url; ?>">Register New Taxonomy</a>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <?php
}