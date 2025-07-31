/**
 * WhiskyTaste Pro Custom JavaScript
 */

(function($) {
    'use strict';

    var WTP = {
        init: function() {
            this.bindEvents();
            this.initSmoothScroll();
            this.initMobileMenu();
            this.initGallery();
            this.initBookingForm();
            this.initLoadMore();
        },

        bindEvents: function() {
            $(window).on('scroll', this.onScroll.bind(this));
            $(window).on('resize', this.onResize.bind(this));
        },

        onScroll: function() {
            var scrollTop = $(window).scrollTop();
            
            // Sticky header
            if (scrollTop > 100) {
                $('.site-header').addClass('sticky');
            } else {
                $('.site-header').removeClass('sticky');
            }

            // Back to top button
            if (scrollTop > 500) {
                $('#wtp-back-to-top').fadeIn();
            } else {
                $('#wtp-back-to-top').fadeOut();
            }
        },

        onResize: function() {
            // Handle responsive adjustments
        },

        initSmoothScroll: function() {
            $('a[href*="#"]').not('[href="#"]').not('[href="#0"]').on('click', function(e) {
                if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    
                    if (target.length) {
                        e.preventDefault();
                        $('html, body').animate({
                            scrollTop: target.offset().top - 100
                        }, 800);
                    }
                }
            });
        },

        initMobileMenu: function() {
            var $mobileToggle = $('.mobile-menu-toggle');
            var $mobileMenu = $('.mobile-navigation');
            
            $mobileToggle.on('click', function(e) {
                e.preventDefault();
                $(this).toggleClass('active');
                $mobileMenu.toggleClass('open');
                $('body').toggleClass('mobile-menu-open');
            });

            // Close on outside click
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.mobile-navigation, .mobile-menu-toggle').length) {
                    $mobileToggle.removeClass('active');
                    $mobileMenu.removeClass('open');
                    $('body').removeClass('mobile-menu-open');
                }
            });
        },

        initGallery: function() {
            // Gallery filtering (already in gallery template, but can be enhanced here)
            var $galleryItems = $('.wtp-gallery-item');
            var $filterButtons = $('.wtp-gallery-filter');

            // Lazy loading for gallery images
            if ('IntersectionObserver' in window) {
                var imageObserver = new IntersectionObserver(function(entries, observer) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            var image = entry.target;
                            image.src = image.dataset.src;
                            image.classList.add('loaded');
                            imageObserver.unobserve(image);
                        }
                    });
                });

                document.querySelectorAll('.wtp-gallery-image[data-src]').forEach(function(img) {
                    imageObserver.observe(img);
                });
            }
        },

        initBookingForm: function() {
            var $bookingForm = $('.wtp-booking-form');
            if (!$bookingForm.length) return;

            // Service selection
            $('.wtp-service-option').on('click', function() {
                $('.wtp-service-option').removeClass('selected');
                $(this).addClass('selected');
                $(this).find('input[type="radio"]').prop('checked', true);
                WTP.updateBookingSummary();
            });

            // Time slot selection
            $('.wtp-time-slot').not('.disabled').on('click', function() {
                $('.wtp-time-slot').removeClass('selected');
                $(this).addClass('selected');
                WTP.updateBookingSummary();
            });

            // Date picker enhancement
            if ($.fn.datepicker) {
                $('#booking-date').datepicker({
                    minDate: 1,
                    maxDate: '+3M',
                    dateFormat: 'yy-mm-dd',
                    beforeShowDay: function(date) {
                        // Disable Mondays (example)
                        return [date.getDay() !== 1];
                    }
                });
            }

            // Form validation
            $bookingForm.on('submit', function(e) {
                e.preventDefault();
                
                if (WTP.validateBookingForm($(this))) {
                    WTP.submitBookingForm($(this));
                }
            });
        },

        validateBookingForm: function($form) {
            var isValid = true;
            var requiredFields = $form.find('[required]');
            
            requiredFields.each(function() {
                var $field = $(this);
                if (!$field.val().trim()) {
                    $field.addClass('error');
                    isValid = false;
                } else {
                    $field.removeClass('error');
                }
            });

            if (!isValid) {
                WTP.showMessage('error', wtp_ajax.strings.error);
            }

            return isValid;
        },

        submitBookingForm: function($form) {
            var $submitBtn = $form.find('button[type="submit"]');
            var originalText = $submitBtn.text();
            
            $submitBtn.prop('disabled', true).html('<span class="wtp-loading"></span> ' + wtp_ajax.strings.loading);

            $.ajax({
                url: wtp_ajax.ajax_url,
                type: 'POST',
                data: {
                    action: 'wtp_submit_booking',
                    nonce: wtp_ajax.nonce,
                    formData: $form.serialize()
                },
                success: function(response) {
                    if (response.success) {
                        WTP.showMessage('success', response.data.message);
                        $form[0].reset();
                        $('.wtp-service-option, .wtp-time-slot').removeClass('selected');
                    } else {
                        WTP.showMessage('error', response.data.message || wtp_ajax.strings.error);
                    }
                },
                error: function() {
                    WTP.showMessage('error', wtp_ajax.strings.error);
                },
                complete: function() {
                    $submitBtn.prop('disabled', false).text(originalText);
                }
            });
        },

        updateBookingSummary: function() {
            // Update booking summary based on selections
            var service = $('.wtp-service-option.selected').text();
            var date = $('#booking-date').val();
            var time = $('.wtp-time-slot.selected').text();
            
            if (service) $('#summary-service').text(service);
            if (date) $('#summary-date').text(date);
            if (time) $('#summary-time').text(time);
            
            // Calculate and update total if needed
        },

        initLoadMore: function() {
            var $loadMoreBtn = $('#wtp-load-more');
            if (!$loadMoreBtn.length) return;

            var page = 2;
            var loading = false;

            $loadMoreBtn.on('click', function(e) {
                e.preventDefault();
                
                if (loading) return;
                
                loading = true;
                var $btn = $(this);
                var originalText = $btn.text();
                var postType = $btn.data('post-type') || 'post';
                
                $btn.html('<span class="wtp-loading"></span> ' + wtp_ajax.strings.loading);

                $.ajax({
                    url: wtp_ajax.ajax_url,
                    type: 'POST',
                    data: {
                        action: 'wtp_load_more',
                        nonce: wtp_ajax.nonce,
                        page: page,
                        post_type: postType
                    },
                    success: function(response) {
                        if (response.trim()) {
                            $('.wtp-posts-grid').append(response);
                            page++;
                            
                            // Re-init any necessary components
                            WTP.initGallery();
                        } else {
                            $btn.text('No more posts').prop('disabled', true);
                        }
                    },
                    error: function() {
                        WTP.showMessage('error', wtp_ajax.strings.error);
                    },
                    complete: function() {
                        loading = false;
                        if (!$btn.prop('disabled')) {
                            $btn.text(originalText);
                        }
                    }
                });
            });
        },

        showMessage: function(type, message) {
            var $message = $('<div class="wtp-booking-message ' + type + '">' + message + '</div>');
            
            $('.wtp-booking-form').prepend($message);
            
            setTimeout(function() {
                $message.fadeOut(function() {
                    $(this).remove();
                });
            }, 5000);
        }
    };

    // Initialize when DOM is ready
    $(document).ready(function() {
        WTP.init();
    });

    // Back to top button
    $('body').append('<button id="wtp-back-to-top" title="Back to Top"><span>↑</span></button>');
    
    $('#wtp-back-to-top').on('click', function() {
        $('html, body').animate({ scrollTop: 0 }, 600);
    });

})(jQuery);