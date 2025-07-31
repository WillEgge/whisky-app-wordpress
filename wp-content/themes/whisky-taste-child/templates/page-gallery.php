<?php
/**
 * Template Name: Gallery Page
 * Description: Custom template for displaying photo gallery
 *
 * @package WhiskyTaste_Child
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        
        <?php while (have_posts()) : the_post(); ?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                </header>
                
                <div class="entry-content">
                    <?php the_content(); ?>
                    
                    <div class="wtp-gallery-container">
                        <?php
                        // Get gallery images from page meta or ACF field
                        $gallery_images = get_post_meta(get_the_ID(), 'wtp_gallery_images', true);
                        
                        // If using ACF
                        if (function_exists('get_field')) {
                            $acf_gallery = get_field('gallery_images');
                            if ($acf_gallery) {
                                $gallery_images = $acf_gallery;
                            }
                        }
                        
                        // Fallback to attached images
                        if (empty($gallery_images)) {
                            $gallery_images = get_posts(array(
                                'post_type' => 'attachment',
                                'posts_per_page' => -1,
                                'post_parent' => get_the_ID(),
                                'post_mime_type' => 'image',
                                'orderby' => 'menu_order',
                                'order' => 'ASC',
                            ));
                        }
                        
                        if (!empty($gallery_images)) : ?>
                            
                            <div class="wtp-gallery-filters">
                                <button class="wtp-gallery-filter active" data-filter="*">
                                    <?php _e('All', 'whiskytaste-child'); ?>
                                </button>
                                <button class="wtp-gallery-filter" data-filter=".tastings">
                                    <?php _e('Tastings', 'whiskytaste-child'); ?>
                                </button>
                                <button class="wtp-gallery-filter" data-filter=".events">
                                    <?php _e('Events', 'whiskytaste-child'); ?>
                                </button>
                                <button class="wtp-gallery-filter" data-filter=".venue">
                                    <?php _e('Venue', 'whiskytaste-child'); ?>
                                </button>
                                <button class="wtp-gallery-filter" data-filter=".whisky">
                                    <?php _e('Whisky Collection', 'whiskytaste-child'); ?>
                                </button>
                            </div>
                            
                            <div class="wtp-gallery-grid" id="wtp-gallery">
                                <?php
                                foreach ($gallery_images as $image) :
                                    if (is_array($image)) {
                                        // ACF gallery format
                                        $image_id = $image['ID'];
                                        $image_url = $image['url'];
                                        $image_thumb = $image['sizes']['wtp-gallery-thumb'];
                                        $image_caption = $image['caption'];
                                        $image_alt = $image['alt'];
                                    } else {
                                        // Standard attachment format
                                        $image_id = $image->ID;
                                        $image_url = wp_get_attachment_url($image_id);
                                        $image_thumb = wp_get_attachment_image_url($image_id, 'wtp-gallery-thumb');
                                        $image_caption = wp_get_attachment_caption($image_id);
                                        $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                                    }
                                    
                                    // Get category from image meta
                                    $image_category = get_post_meta($image_id, 'wtp_image_category', true);
                                    if (empty($image_category)) {
                                        $image_category = 'general';
                                    }
                                    ?>
                                    
                                    <div class="wtp-gallery-item <?php echo esc_attr($image_category); ?>">
                                        <a href="<?php echo esc_url($image_url); ?>" 
                                           class="wtp-gallery-link" 
                                           data-lightbox="wtp-gallery"
                                           data-title="<?php echo esc_attr($image_caption); ?>">
                                            <img src="<?php echo esc_url($image_thumb); ?>" 
                                                 alt="<?php echo esc_attr($image_alt); ?>"
                                                 class="wtp-gallery-image">
                                            <div class="wtp-gallery-overlay">
                                                <span class="wtp-gallery-icon">+</span>
                                            </div>
                                        </a>
                                        <?php if ($image_caption) : ?>
                                            <p class="wtp-gallery-caption"><?php echo esc_html($image_caption); ?></p>
                                        <?php endif; ?>
                                    </div>
                                    
                                <?php endforeach; ?>
                            </div>
                            
                        <?php else : ?>
                            
                            <div class="wtp-gallery-placeholder">
                                <p><?php _e('Gallery coming soon! Check back later for photos from our whisky tasting experiences.', 'whiskytaste-child'); ?></p>
                            </div>
                            
                        <?php endif; ?>
                    </div>
                </div>
            </article>
            
        <?php endwhile; ?>
        
    </main>
</div>

<script>
jQuery(document).ready(function($) {
    // Gallery filtering
    $('.wtp-gallery-filter').on('click', function() {
        var filterValue = $(this).data('filter');
        
        $('.wtp-gallery-filter').removeClass('active');
        $(this).addClass('active');
        
        if (filterValue === '*') {
            $('.wtp-gallery-item').show();
        } else {
            $('.wtp-gallery-item').hide();
            $('.wtp-gallery-item' + filterValue).show();
        }
    });
    
    // Initialize lightbox if available
    if (typeof lightbox !== 'undefined') {
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true,
            'albumLabel': "<?php _e('Image %1 of %2', 'whiskytaste-child'); ?>"
        });
    }
});
</script>

<?php get_footer();