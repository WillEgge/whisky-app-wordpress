<?php
/**
 * Template Name: Booking Page
 * Description: Custom template for the booking system
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
                    
                    <?php if (wtp_is_booking_enabled()) : ?>
                        
                        <div class="wtp-booking-section">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="wtp-booking-form">
                                            <?php 
                                            // Amelia shortcode
                                            if (shortcode_exists('ameliabooking')) {
                                                echo do_shortcode('[ameliabooking]');
                                            }
                                            // Bookly shortcode
                                            elseif (shortcode_exists('bookly-form')) {
                                                echo do_shortcode('[bookly-form]');
                                            }
                                            // Fallback to custom booking form
                                            else {
                                                get_template_part('template-parts/booking', 'form');
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4">
                                        <aside class="wtp-booking-sidebar">
                                            <div class="wtp-booking-info">
                                                <h3><?php _e('Booking Information', 'whiskytaste-child'); ?></h3>
                                                
                                                <div class="wtp-booking-hours">
                                                    <h4><?php _e('Business Hours', 'whiskytaste-child'); ?></h4>
                                                    <p><?php echo nl2br(get_theme_mod('wtp_business_hours', 'Monday - Friday: 10:00 AM - 8:00 PM<br>Saturday: 12:00 PM - 10:00 PM<br>Sunday: 12:00 PM - 6:00 PM')); ?></p>
                                                </div>
                                                
                                                <div class="wtp-booking-contact">
                                                    <h4><?php _e('Contact Us', 'whiskytaste-child'); ?></h4>
                                                    <?php if ($phone = get_theme_mod('wtp_phone_number')) : ?>
                                                        <p><strong><?php _e('Phone:', 'whiskytaste-child'); ?></strong> <a href="tel:<?php echo esc_attr($phone); ?>"><?php echo esc_html($phone); ?></a></p>
                                                    <?php endif; ?>
                                                    
                                                    <?php if ($email = get_theme_mod('wtp_email_address')) : ?>
                                                        <p><strong><?php _e('Email:', 'whiskytaste-child'); ?></strong> <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></p>
                                                    <?php endif; ?>
                                                </div>
                                                
                                                <div class="wtp-booking-policies">
                                                    <h4><?php _e('Booking Policies', 'whiskytaste-child'); ?></h4>
                                                    <ul>
                                                        <li><?php _e('Minimum 24 hours advance booking required', 'whiskytaste-child'); ?></li>
                                                        <li><?php _e('Cancellations must be made at least 12 hours in advance', 'whiskytaste-child'); ?></li>
                                                        <li><?php _e('Groups of 6+ require special arrangement', 'whiskytaste-child'); ?></li>
                                                        <li><?php _e('Payment required at time of booking', 'whiskytaste-child'); ?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </aside>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    <?php else : ?>
                        
                        <div class="wtp-booking-notice">
                            <p><?php _e('Online booking is currently unavailable. Please contact us directly to schedule your whisky tasting experience.', 'whiskytaste-child'); ?></p>
                            
                            <?php if ($phone = get_theme_mod('wtp_phone_number')) : ?>
                                <p><a href="tel:<?php echo esc_attr($phone); ?>" class="button"><?php _e('Call Us Now', 'whiskytaste-child'); ?></a></p>
                            <?php endif; ?>
                        </div>
                        
                    <?php endif; ?>
                </div>
            </article>
            
        <?php endwhile; ?>
        
    </main>
</div>

<?php get_footer();