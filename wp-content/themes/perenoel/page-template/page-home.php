<?php

/**
 * Template Name: Home page
 */

get_header();
$hID = get_the_ID();
$banner_image           = get_field('banner_image',$hID);
$banner_short_text      = get_field('banner_short_text',$hID);

$about_title            = get_field('about_title',$hID);
$about_content          = get_field('about_content',$hID);
$about_section_image    = get_field('about_section_image',$hID);

$block_title            = get_field('block_title',$hID);
$block_sub_text         = get_field('block_sub_text',$hID);
$phone_number           = get_field('phone_number',$hID);
$email_address          = get_field('email_address',$hID);
$instagram_account_name = get_field('instagram_account_name',$hID);
$instagram_account_link = get_field('instagram_account_link',$hID);
$contact_form           = get_field('contact_form',$hID);

$photos_args = array(
	'post_type' => 'photos',
	'orderby'=>'date',
	'order'=>'desc', 
	'posts_per_page'=>6,
	'paged'=>1,
);

$photoPosts = new WP_Query( $photos_args );

if (pll_current_language() == 'en') {
    $redirectLink = get_the_permalink(pll_get_post(get_page_by_path( 'gallery' )->ID));;
} else if (pll_current_language() == 'fr') {
    $redirectLink = get_the_permalink(pll_get_post(get_page_by_path( 'galerie' )->ID));;
}

?>
<!-- banner-block -->
    <div class="banner-block">
        <div class="container">
            <div class="caption">
                <?php if(!empty($banner_short_text)) { ?>
                    <h1><?php echo $banner_short_text; ?></h1>
                <?php } ?>
                <div class="btn-group">
                    <a class="btn btn-gallary" href="<?php echo $redirectLink; ?>">Gallery</a>
                    <a class="btn btn-contact" href="#contact">Contact</a>
                </div>
            </div>
            <?php if(!empty($banner_image)) { ?>
                <figure><img class="img-full" src="<?php echo $banner_image['url']; ?>" alt=""></figure>
            <?php } ?>
        </div>
    </div>
	
	<!-- content area part --> 
    <div id="content-area">
        <div class="aboutme-block" id="about">
            <div class="container">
                <div class="caption-block">
                    <?php if(!empty($about_title)) { ?>
                        <h2 class="title"><?php echo $about_title; ?></h2>
                    <?php } ?>
                    <div class="caption">
                        <?php echo $about_content ?>
                    </div>
                </div>
                <figure><img class="img-full" src="<?php echo $about_section_image['url']; ?>" alt=""></figure>
            </div>
        </div>

        <!-- dailyImages-block -->
        <div class="dailyImages-block">
            <div class="container">
                <div class="title-block">
                    <h3 class="title">
                         
                        <?php
                            if (pll_current_language() == 'en') {
                                echo 'My life in daily photos';
                            } else if (pll_current_language() == 'fr') {
                                echo 'Ma vie en photos quotidiennes';
                            }   
                        ?>
                    </h3>
                </div>
                <div class="img-group">
                    <?php  
                        while($photoPosts->have_posts()):
                            echo loadGalleryImage($photoPosts, $j=0);
                            $j++;
                        endwhile;
                    ?>
                </div>
            </div>
            <div class="btn-viewMore">
                <a href='<?php echo $redirectLink; ?>' class="btn-viewMore">
                    
                    <?php 
                        if (pll_current_language() == 'en') {
                            echo "View More";
                        } else if (pll_current_language() == 'fr') {
                            echo "Voir plus";
                        }
                    ?>
                </a>
            </div>
        </div>

        <!-- getIn-touch-block -->
        <div class="getIn-touch-block" id="contact">
            <div class="container">
                <div class="left">
                    <div class="title-block">
                        <?php
                            if (pll_current_language() == 'en') {
                                echo '<span>Get in touch</span>';
                            } else if (pll_current_language() == 'fr') {
                                echo '<span>Entrer En Contact</span>';
                            }   
                        ?>
                        <?php if(!empty($block_title)) { ?>
                            <h4 class="title"><?php echo $block_title; ?></h4>
                        <?php } ?>

                        <?php if(!empty($block_sub_text)) { ?>
                            <p><?php echo $block_sub_text; ?></p>
                        <?php } ?>
                    </div>
                    <div class="link-group">
                        <?php if(!empty($phone_number)) { ?>
                            <a href="tel:<?php echo $phone_number; ?>"><?php echo $phone_number; ?></a>
                        <?php } ?>
                        
                        <?php if(!empty($email_address)) { ?>
                            <a href="mailto:<?php echo $email_address; ?>"><?php echo $email_address; ?></a>
                        <?php } ?>

                        <?php if(!empty($instagram_account_link)) { ?>
                            <a href="<?php echo $instagram_account_link;?>"><?php echo $instagram_account_name; ?></a>
                        <?php } ?>
                    </div>
                </div>
                <div class="right">
                    <?php
                        echo do_shortcode('[contact-form-7 id="'.$contact_form->ID .'" title="'.$contact_form->post_title .'"]');
                    ?>
                </div>
            </div>
        </div>
		
	</div>
<?php
get_footer();
