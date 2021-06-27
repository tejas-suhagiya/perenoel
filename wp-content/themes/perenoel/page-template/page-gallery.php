<?php

/**
 * Template Name: Gallery page
 */

get_header();

$photos_args = array(
	'post_type' => 'photos',
	'orderby'=>'date',
	'order'=>'desc', 
	'posts_per_page'=>6,
	'paged'=>1,
);

$photoPosts = new WP_Query( $photos_args );
?>

<!-- content area part --> 
    <div id="content-area">
        <!-- page-title-block -->
        <div class="page-title-block">
            <div class="container">
                <div class="title-block">
                    <h1 class="title">Gallery</h1>
                </div>
            </div>
        </div>

        <?php
            if($photoPosts->have_posts()) { $j = 1;
                ?>
                <!-- gallery-block -->
                <div class="gallery-block">
                    <div class="container">
                        <div class="gallery gallery-image">
                            <?php  
                                while($photoPosts->have_posts()):
                                    echo loadGalleryImage($photoPosts, $j);
                                    $j++;
                                endwhile;
                            ?>
                        </div>
                        <div class="no-post" style="display:none;">
                            no post found
                        </div>
                        <input type="hidden" id="page_number" name="page_number" value="1">
                        <input type="hidden" id="total_pages" name="total_pages" value="<?php echo $photoPosts->max_num_pages; ?>">
                        <?php if($photoPosts->max_num_pages > 1) { ?>
                            <div class="btn-viewMore" id="view-more-photo">
                                <button class="btn-viewMore">
                                    View More
                                </button>
                            </div>
                            <img src="<?php echo get_template_directory_uri().'/images/ajax-loader.gif'; ?>" class="post_loader" style="display:none;">
                        <?php } ?>
                    </div>
                </div>
                <?php
            }
        ?>
		
	</div>

<?php
get_footer();