/**
 * Champions League Elite Hub - Main JavaScript File
 * 
 * @package Champions_League_Elite_Hub
 */

(function ($) {
    'use strict';

    /**
     * Document Ready
     */
    $(document).ready(function () {
        initializeTheme();
    });

    /**
     * Initialize Theme Components
     */
    function initializeTheme() {
        mobileMenuToggle();
        smoothScroll();
        lazyLoadImages();
        enhancedSearch();
        formValidation();
        tooltips();
        initializeModals();
    }

    /**
     * Mobile Menu Toggle
     */
    function mobileMenuToggle() {
        $('.navbar-toggler').on('click', function () {
            $(this).toggleClass('active');
        });

        // Close menu when link is clicked
        $('.navbar-collapse a:not(.dropdown-toggle)').on('click', function () {
            $('.navbar-toggler').click();
        });
    }

    /**
     * Smooth Scroll for Anchor Links
     */
    function smoothScroll() {
        $('a[href^="#"]').on('click', function (e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').stop().animate({
                    scrollTop: target.offset().top - 100
                }, 1000);
            }
        });
    }

    /**
     * Lazy Load Images
     */
    function lazyLoadImages() {
        if ('IntersectionObserver' in window) {
            var images = document.querySelectorAll('img[loading="lazy"]');
            var imageObserver = new IntersectionObserver(function (entries, observer) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        var img = entry.target;
                        img.src = img.dataset.src;
                        img.removeAttribute('loading');
                        imageObserver.unobserve(img);
                    }
                });
            });

            images.forEach(function (img) {
                imageObserver.observe(img);
            });
        }
    }

    /**
     * Enhanced Search Functionality
     */
    function enhancedSearch() {
        var $searchForm = $('form.search-form');
        var $searchInput = $searchForm.find('input[type="search"]');

        // Highlight search query in results
        if ($('body').hasClass('search')) {
            var query = getUrlParameter('s');
            if (query) {
                highlightSearchResults(query);
            }
        }

        // Clear search input on focus
        $searchInput.on('focus', function () {
            $(this).select();
        });
    }

    /**
     * Highlight Search Results
     */
    function highlightSearchResults(query) {
        var regex = new RegExp('(' + query + ')', 'gi');
        $('article').find('h2, h3, p').each(function () {
            var text = $(this).text();
            if (text.match(regex)) {
                $(this).html(text.replace(regex, '<mark>$1</mark>'));
            }
        });
    }

    /**
     * Form Validation
     */
    function formValidation() {
        // Bootstrap form validation
        var forms = document.querySelectorAll('.needs-validation');
        
        Array.prototype.slice.call(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });

        // Custom email validation
        $('input[type="email"]').on('blur', function () {
            var email = $(this).val();
            var isValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
            
            if (email && !isValid) {
                $(this).addClass('is-invalid');
                $(this).after('<div class="invalid-feedback">Please enter a valid email.</div>');
            } else {
                $(this).removeClass('is-invalid');
                $(this).siblings('.invalid-feedback').remove();
            }
        });
    }

    /**
     * Initialize Tooltips
     */
    function tooltips() {
        if (typeof bootstrap !== 'undefined') {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        }
    }

    /**
     * Initialize Modals
     */
    function initializeModals() {
        // Handle modal actions
        $('.modal-trigger').on('click', function (e) {
            e.preventDefault();
            var modalId = $(this).data('modal-id');
            if (typeof bootstrap !== 'undefined') {
                var modal = new bootstrap.Modal(document.getElementById(modalId));
                modal.show();
            }
        });
    }

    /**
     * Get URL Parameter
     */
    function getUrlParameter(name) {
        name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
        var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
        var results = regex.exec(location.search);
        return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
    }

    /**
     * Intersection Observer for Animations
     */
    function observeElements() {
        if ('IntersectionObserver' in window) {
            var observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        $(entry.target).addClass('animated');
                    }
                });
            }, {
                threshold: 0.1
            });

            $('.post-card, .card, .animate-on-scroll').each(function () {
                observer.observe(this);
            });
        }
    }

    /**
     * Handle Pagination AJAX
     */
    $(document).on('click', '.pagination a', function (e) {
        if ($(this).attr('href').indexOf(window.location.pathname) !== -1) {
            e.preventDefault();
            loadPage($(this).attr('href'));
        }
    });

    function loadPage(url) {
        $.ajax({
            url: url,
            type: 'GET',
            success: function (data) {
                var newContent = $(data).find('.posts-grid, .archive-posts, .search-results');
                $('.posts-grid, .archive-posts, .search-results').fadeOut(function () {
                    $(this).html(newContent.html()).fadeIn();
                });
                
                // Reinitialize components
                lazyLoadImages();
                observeElements();
                
                // Scroll to top
                $('html, body').animate({ scrollTop: 0 }, 'slow');
            }
        });
    }

    /**
     * Custom Dropdown Handler
     */
    function setupDropdowns() {
        $('.dropdown-toggle').on('click', function (e) {
            e.preventDefault();
            var $dropdown = $(this).siblings('.dropdown-menu');
            $dropdown.toggleClass('show');
        });

        $(document).on('click', function (e) {
            if (!$(e.target).closest('.dropdown').length) {
                $('.dropdown-menu.show').removeClass('show');
            }
        });
    }

    /**
     * Initialize on Load
     */
    $(window).on('load', function () {
        observeElements();
        setupDropdowns();
    });

    /**
     * Window Resize Handler
     */
    $(window).on('resize', function () {
        // Handle responsive changes
        if (window.innerWidth < 768) {
            // Mobile-specific code
        } else {
            // Desktop-specific code
        }
    });

})(jQuery);

/**
 * Script for Enhanced Accessibility
 */
document.addEventListener('DOMContentLoaded', function () {
    // Add focus styles for keyboard navigation
    var links = document.querySelectorAll('a, button, input, select, textarea');
    links.forEach(function (link) {
        link.addEventListener('focus', function () {
            this.classList.add('focused');
        });
        link.addEventListener('blur', function () {
            this.classList.remove('focused');
        });
    });
});