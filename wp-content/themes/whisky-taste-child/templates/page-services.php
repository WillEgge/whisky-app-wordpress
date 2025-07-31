<?php
/**
 * Template Name: Services Page
 * Description: Custom template for displaying all services
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
                </div>
            </article>
            
            <section class="wtp-services-grid">
                <div class="container">
                    <div class="row">
                        <?php
                        $services = new WP_Query(array(
                            'post_type' => 'wtp_service',
                            'posts_per_page' => -1,
                            'orderby' => 'menu_order',
                            'order' => 'ASC',
                        ));
                        
                        if ($services->have_posts()) :
                            while ($services->have_posts()) : $services->the_post(); ?>
                                
                                <div class="col-md-4 col-sm-6 wtp-service-item">
                                    <div class="wtp-service-card">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="wtp-service-image">
                                                <?php the_post_thumbnail('wtp-service-thumb'); ?>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <div class="wtp-service-content">
                                            <h3 class="wtp-service-title">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h3>
                                            
                                            <div class="wtp-service-excerpt">
                                                <?php the_excerpt(); ?>
                                            </div>
                                            
                                            <div class="wtp-service-meta">
                                                <span class="wtp-service-price">
                                                    <?php echo wtp_get_service_price(get_the_ID()); ?>
                                                </span>
                                                
                                                <a href="<?php the_permalink(); ?>" class="wtp-service-link">
                                                    <?php _e('Learn More', 'whiskytaste-child'); ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            <?php endwhile;
                            wp_reset_postdata();
                        else : ?>
                            
                            <div class="col-12">
                                <p class="wtp-no-services">
                                    <?php _e('No services available at the moment. Please check back soon!', 'whiskytaste-child'); ?>
                                </p>
                            </div>
                            
                        <?php endif; ?>
                    </div>
                </div>
            </section>
            
        <?php endwhile; ?>
        
    </main>
</div>

<?php
get_sidebar('wtp-service-sidebar');
get_footer();