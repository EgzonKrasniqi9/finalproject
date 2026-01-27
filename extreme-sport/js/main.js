/**
 * Extreme Sports Elite Theme - Main JavaScript
 * 
 * Handles dynamic functionality and enhancements
 */

(function($) {
    'use strict';

    var ExtremeSports = {
        /**
         * Initialize the theme
         */
        init: function() {
            this.mobileMenu();
            this.smoothScroll();
            this.lazyLoadImages();
            this.searchFormEnhancement();
            this.commentReply();
            this.postNavigation();
            this.ajaxLoadMore();
        },

        /**
         * Mobile Menu Toggle
         */
        mobileMenu: function() {
            var $body = $('body');
            var $navToggle = $('.nav-toggle');
            var $navMenu = $('.site-nav');

            if ($navToggle.length > 0) {
                $navToggle.on('click', function(e) {
                    e.preventDefault();
                    $navMenu.slideToggle(300);
                    $navToggle.toggleClass('active');
                });

                // Close menu on link click
                $navMenu.find('a').on('click', function() {
                    $navMenu.slideUp(300);
                    $navToggle.removeClass('active');
                });
            }

            // Close menu on window resize
            $(window).on('resize', function() {
                if ($(window).width() > 768) {
                    $navMenu.removeAttr('style');
                    $navToggle.removeClass('active');
                }
            });
        },

        /**
         * Smooth Scroll for anchors
         */
        smoothScroll: function() {
            $('a[href*="#"]').on('click', function(e) {
                var href = $(this).attr('href');
                
                // Don't smooth scroll for empty or external links
                if (href === '#' || href.indexOf('http') === 0) {
                    return;
                }

                var $target = $(href);
                
                if ($target.length > 0) {
                    e.preventDefault();
                    $('html, body').animate({
                        scrollTop: $target.offset().top - 100
                    }, 800);
                }
            });
        },

        /**
         * Lazy Load Images
         */
        lazyLoadImages: function() {
            // Check if Intersection Observer is supported
            if ('IntersectionObserver' in window) {
                var imageObserver = new IntersectionObserver(function(entries, observer) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            var img = entry.target;
                            img.src = img.dataset.src;
                            img.classList.remove('lazy');
                            imageObserver.unobserve(img);
                        }
                    });
                });

                $('.lazy').each(function() {
                    imageObserver.observe(this);
                });
            }
        },

        /**
         * Search Form Enhancement
         */
        searchFormEnhancement: function() {
            var $searchForms = $('.search-form');
            
            $searchForms.on('submit', function(e) {
                var $input = $(this).find('input[type="search"]');
                
                // Prevent empty search
                if ($.trim($input.val()) === '') {
                    e.preventDefault();
                    $input.focus();
                    $input.css('border-color', '#e74c3c');
                    
                    setTimeout(function() {
                        $input.css('border-color', '');
                    }, 2000);
                }
            });

            // Clear error on focus
            $searchForms.find('input[type="search"]').on('focus', function() {
                $(this).css('border-color', '');
            });
        },

        /**
         * Comment Reply Link Handler
         */
        commentReply: function() {
            // WordPress native comment reply functionality
            if (typeof addComment !== 'undefined') {
                $('.comment-reply-link').on('click', function(e) {
                    e.preventDefault();
                    var commentId = $(this).data('commentid');
                    addComment.moveForm('comment-' + commentId, commentId, 'respond', '0');
                });
            }
        },

        /**
         * Post Navigation Enhancement
         */
        postNavigation: function() {
            var $prevPost = $('.post-nav-prev');
            var $nextPost = $('.post-nav-next');

            // Add hover effects
            $prevPost.on('mouseenter', function() {
                $(this).animate({ marginRight: '10px' }, 200);
            }).on('mouseleave', function() {
                $(this).animate({ marginRight: '0' }, 200);
            });

            $nextPost.on('mouseenter', function() {
                $(this).animate({ marginLeft: '10px' }, 200);
            }).on('mouseleave', function() {
                $(this).animate({ marginLeft: '0' }, 200);
            });
        },

        /**
         * AJAX Load More Posts
         */
        ajaxLoadMore: function() {
            $('.load-more-btn').on('click', function(e) {
                e.preventDefault();
                
                var $button = $(this);
                var paged = $button.data('paged') || 2;
                var postType = $button.data('post-type') || 'post';

                $.ajax({
                    url: extremeSportsData.ajaxUrl,
                    type: 'POST',
                    data: {
                        action: 'load_more_posts',
                        paged: paged,
                        post_type: postType,
                        nonce: extremeSportsData.nonce
                    },
                    success: function(response) {
                        if (response.success && response.data.html) {
                            $('.posts-grid').append(response.data.html);
                            $button.data('paged', paged + 1);

                            // Check if there are more posts
                            if (!response.data.hasMore) {
                                $button.text(extremeSports.translate('No more posts')).prop('disabled', true);
                            }
                        }
                    },
                    error: function() {
                        $button.text(extremeSports.translate('Error loading posts')).addClass('error');
                    }
                });
            });
        },

        /**
         * Translation helper
         */
        translate: function(text) {
            var translations = {
                'No more posts': 'No more posts',
                'Error loading posts': 'Error loading posts'
            };
            return translations[text] || text;
        }
    };

    // Initialize on document ready
    $(document).ready(function() {
        ExtremeSports.init();
    });

})(jQuery);

// Add to window for external use
window.ExtremeSports = ExtremeSports;
