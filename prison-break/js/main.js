/**
 * Prison Break Elite Theme - Main JavaScript
 * 
 * @package Prison_Break_Elite
 * @version 1.0.0
 */

(function($) {
    'use strict';

    // Mobile Menu Toggle
    function initMobileMenu() {
        const menuToggle = $('.menu-toggle');
        const mainNav = $('.main-navigation');

        menuToggle.on('click', function(e) {
            e.preventDefault();
            $(this).toggleClass('active');
            mainNav.toggleClass('active');
        });

        // Close menu when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.site-header').length) {
                menuToggle.removeClass('active');
                mainNav.removeClass('active');
            }
        });
    }

    // Season Menu Items Hover
    function initSeasonMenus() {
        const seasonMenuItems = $('.season-menu-item');
        
        seasonMenuItems.on('mouseenter', function() {
            $(this).find('.season-submenu').fadeIn(200);
        });
        
        seasonMenuItems.on('mouseleave', function() {
            $(this).find('.season-submenu').fadeOut(200);
        });

        // Mobile touch support
        seasonMenuItems.on('click', function(e) {
            if ($(window).width() < 768) {
                e.preventDefault();
                const submenu = $(this).find('.season-submenu');
                submenu.stop(true, true).slideToggle(200);
            }
        });
    }

    // Seasons Dropdown Toggle (if using separate dropdown)
    function initSeasonsDropdown() {
        const seasonsToggle = $('.seasons-toggle');
        const seasonsDropdown = $('.seasons-dropdown');

        if (seasonsToggle.length) {
            seasonsToggle.on('click', function(e) {
                e.preventDefault();
                seasonsDropdown.toggleClass('active');
            });

            // Close when clicking outside
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.seasons-dropdown').length) {
                    seasonsDropdown.removeClass('active');
                }
            });
        }

        // Close on ESC key
        $(document).on('keydown', function(e) {
            if (e.keyCode === 27) {
                seasonsDropdown.removeClass('active');
            }
        });
    }

    // Lazy Load Images
    function initLazyLoad() {
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.removeAttribute('data-src');
                        imageObserver.unobserve(img);
                    }
                });
            });

            document.querySelectorAll('img[data-src]').forEach(img => imageObserver.observe(img));
        }
    }

    // Smooth Scroll for Anchor Links
    function initSmoothScroll() {
        $('a[href*="#"]').on('click', function(e) {
            const href = $(this).attr('href');
            const target = $(href);

            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'easeInOutQuad');
            }
        });
    }

    // Search Suggestions via AJAX
    function initSearchSuggestions() {
        const searchInput = $('.search-input');
        const suggestionsContainer = $('<ul class="search-suggestions"></ul>');

        searchInput.after(suggestionsContainer);

        searchInput.on('keyup', function() {
            const query = $(this).val();

            if (query.length < 2) {
                suggestionsContainer.hide();
                return;
            }

            $.ajax({
                url: prisonBreakData.ajaxUrl,
                type: 'POST',
                data: {
                    action: 'prison_break_search_suggestions',
                    query: query,
                    nonce: prisonBreakData.nonce
                },
                success: function(response) {
                    if (response) {
                        suggestionsContainer.html(response).show();
                    }
                }
            });
        });

        // Close suggestions on blur
        searchInput.on('blur', function() {
            setTimeout(function() {
                suggestionsContainer.hide();
            }, 200);
        });
    }

    // Form Validation
    function initFormValidation() {
        const forms = $('form');

        forms.on('submit', function(e) {
            let isValid = true;
            const requiredFields = $(this).find('[required]');

            requiredFields.each(function() {
                if (!$(this).val()) {
                    $(this).addClass('error');
                    isValid = false;
                } else {
                    $(this).removeClass('error');
                }
            });

            if (!isValid) {
                e.preventDefault();
            }
        });

        forms.find('input, textarea').on('input', function() {
            if ($(this).val()) {
                $(this).removeClass('error');
            }
        });
    }

    // Add Animation to Post Cards
    function initCardAnimations() {
        const cards = $('.post-card');

        cards.each(function(index) {
            $(this).css({
                'animation-delay': (index * 100) + 'ms'
            });
        });
    }

    // Keyboard Navigation
    function initKeyboardNav() {
        $(document).on('keydown', function(e) {
            // ESC to close mobile menu
            if (e.keyCode === 27) {
                $('.menu-toggle').removeClass('active');
                $('.main-navigation').removeClass('active');
            }
        });
    }

    // Print Friendly Functionality
    function initPrintFunctionality() {
        const printLink = $('a.print-link');

        printLink.on('click', function(e) {
            e.preventDefault();
            window.print();
        });
    }

    // Add "Back to Top" Button
    function initBackToTop() {
        const backToTopBtn = $('<button class="back-to-top" style="display: none;">↑</button>');
        $('body').append(backToTopBtn);

        $(window).on('scroll', function() {
            if ($(this).scrollTop() > 300) {
                backToTopBtn.fadeIn();
            } else {
                backToTopBtn.fadeOut();
            }
        });

        backToTopBtn.on('click', function() {
            $('html, body').animate({
                scrollTop: 0
            }, 800);
        });
    }

    // Initialize all on document ready
    $(document).ready(function() {
        initMobileMenu();
        initSeasonMenus();
        initSeasonsDropdown();
        initLazyLoad();
        initSmoothScroll();
        initSearchSuggestions();
        initFormValidation();
        initCardAnimations();
        initKeyboardNav();
        initPrintFunctionality();
        initBackToTop();
    });

})(jQuery);

// Custom CSS Animations
const style = document.createElement('style');
style.textContent = `
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .post-card {
        animation: fadeInUp 0.6s ease-out forwards;
        opacity: 0;
    }

    .back-to-top {
        position: fixed;
        bottom: 30px;
        right: 30px;
        background: linear-gradient(135deg, #d32f2f 0%, #b71c1c 100%);
        color: white;
        border: none;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        font-size: 24px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
    }

    .back-to-top:hover {
        background: linear-gradient(135deg, #ff5252 0%, #d32f2f 100%);
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(211, 47, 47, 0.4);
    }

    input.error,
    textarea.error {
        border-color: #ff5252 !important;
        background-color: rgba(255, 82, 82, 0.1) !important;
    }

    .search-suggestions {
        position: absolute;
        background: #1a1f3a;
        border: 1px solid #d32f2f;
        border-radius: 4px;
        width: 100%;
        max-height: 300px;
        overflow-y: auto;
        list-style: none;
        margin: 0;
        padding: 0;
        z-index: 10;
        top: 100%;
    }

    .search-suggestions li {
        padding: 0.8rem 1rem;
        border-bottom: 1px solid rgba(211, 47, 47, 0.2);
        cursor: pointer;
    }

    .search-suggestions li:last-child {
        border-bottom: none;
    }

    .search-suggestions li:hover {
        background: rgba(211, 47, 47, 0.2);
    }

    .search-suggestions a {
        color: #e0e0e0;
        text-decoration: none;
        display: block;
    }

    .search-suggestions a:hover {
        color: #d32f2f;
    }
`;
document.head.appendChild(style);
