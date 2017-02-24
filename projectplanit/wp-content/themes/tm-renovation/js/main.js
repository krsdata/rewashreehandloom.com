/*--------------------------------------------------------------
 Renovation Theme
 --------------------------------------------------------------*/
'use strict';

(function ($) {

    window.renovation = {

        init: function () {

            this.mobileMenu();

            this.initParallax();

            this.mfnPopup();

            this.galleryProject();

            this.miniCart();

            this.searchButton();

            this.megaMenuHeader02();

            this.header03();

            this.generateResponsiveSpacing();

        },

        /**
         * Mobile Menu
         */
        mobileMenu: function () {
            var snapper = new Snap({
                element: document.getElementById('page'),
                dragger: document.getElementsByClassName('page'),
                //disable: 'right',
                slideIntent: 10,
            });
            var addEvent = function addEvent(element, eventName, func) {
                if (element == null) {
                    return;
                }
                if (element.addEventListener) {
                    return element.addEventListener(eventName, func, false);
                } else if (element.attachEvent) {
                    return element.attachEvent("on" + eventName, func);
                }
            };
            addEvent(document.getElementById('open-left'), 'click', function () {
                snapper.open('left');
            });
            addEvent(document.getElementById('open-right'), 'click', function () {
                snapper.open('right');
            });
        },

        /**
         * init parallax page title image
         */
        initParallax: function () {
            $.stellar({
                horizontalScrolling: false,
                scrollProperty: 'scroll',
                responsive: true,
                positionProperty: 'position'
            });
        },

        /**
         * Magnific Popup
         */
        mfnPopup: function () {

            // project details page
            $('.gallery,.single-featured').magnificPopup({
                delegate: 'a', // child items selector, by clicking on it popup will open
                type: 'image',
                removalDelay: 300,
                mainClass: 'mfp-fade',
                gallery: {
                    enabled: true
                },
                zoom: {
                    enabled: true,
                    duration: 300,
                    easing: 'ease-in-out'
                }
            });

        },

        /**
         * Gallery on project page
         */
        galleryProject: function () {
            $(".single-project .gallery").owlCarousel({
                nav: false,
                dots: false,
                autoplay: true,
                autoplayHoverPause: true,
                autoplayTimeout: 3000,
                margin: 15,
                responsive: {
                    0: {
                        items: 2
                    },
                    768: {
                        items: 3
                    },
                    1024: {
                        items: 6
                    }
                }
            });
        },

        /**
         * Mini Cart
         */
        miniCart: function () {
            var $mini_cart = $('.mini-cart');
            $mini_cart.on('click', function (e) {
                $(this).addClass('open');
            });

            $(document).on('click', function (e) {
                if ($(e.target).closest($mini_cart).length == 0) {
                    $mini_cart.removeClass('open');
                }
            });
        },

        searchButton: function () {

            var $search_btn = $('.search-box > i'),
                $search_form = $('form.search-form');

            $search_btn.on('click', function () {
                $search_form.toggleClass('open');

                setTimeout(function () {
                    $('.search-field', $search_form).focus();
                }, 500);
            });

            $(document).on('click', function (e) {
                if ($(e.target).closest($search_btn).length == 0
                    && $(e.target).closest('input.search-field').length == 0
                    && $search_form.hasClass('open')) {
                    $search_form.removeClass('open');
                }
            });

        },

        /**
         * Calculating position of MegaMenu for header02
         */
        megaMenuHeader02: function () {

            var $leftVal = 0;

            $('.header02 #site-navigation .menu > li').each(function () {
                if (!$(this).hasClass('mega-menu')) {
                    $leftVal += $(this).outerWidth();
                } else {
                    $('.header02 #site-navigation li.mega-menu > .sub-menu').css('left', '-' + $leftVal + 'px');
                    return;
                }
            });

        },

        /**
         * Calculating dynamic padding top value for navigation of header03
         */
        header03: function () {

            var caculatePaddingTop = function (element) {

                var $this = $(element);
                var $header_height = $('.site-header')[0].getBoundingClientRect().top;
                var $height = $this[0].getBoundingClientRect().top;
                var $padding_top = ($height - $header_height);

                console.log($header_height);
                console.log($height);

                if (!$this.parent().hasClass('menu-item-has-children')) {
                    $padding_top -= 1;
                }

                return $padding_top;

            }

            $('.header03 #site-navigation .menu > li > a').each(function () {
                $(this).css('padding-top', caculatePaddingTop($(this)) + 'px');
            });
        },

        generateResponsiveSpacing: function () {

            var lg_css_tmp = {}, md_css_tmp = {}, sm_css_tmp = {}, xs_css_tmp = {};
            var lg_only_css_tmp = {}, md_only_css_tmp = {}, sm_only_css_tmp = {}, xs_only_css_tmp = {};
            var css = '';

            $('[class*=padding-], [class*=margin-]').each(function () {

                var matches = this.className.match(/(padding|margin)-(xs|sm|md|lg)(-only)?(-top|-right|-bottom|-left)?-{1,2}\d+(-important)?/gi);

                if (matches != null) {
                    for (var i = 0; i < matches.length; i++) {
                        var match = matches[i];
                        var css_tmp = '';

                        var arr = match.split('-');
                        var num, direction, important = '';

                        // check media-only CSS
                        if (arr[2] == 'only') {

                            direction = arr[3];

                            // check spacing for all directions
                            if (direction != 'top' && direction != 'right' && direction != 'bottom' && direction != 'left') {

                                direction = '';

                                // check negative value
                                if (arr[3] == '') {
                                    num = '-' + arr[4];
                                } else {
                                    num = arr[3];
                                }

                            } else {

                                // check negative value
                                if (arr[4] == '') {
                                    num = '-' + arr[5];
                                } else {
                                    num = arr[4];
                                }
                            }
                        } else {

                            direction = arr[2];

                            // check spacing for all directions
                            if (direction != 'top' && direction != 'right' && direction != 'bottom' && direction != 'left') {

                                direction = '';

                                // check negative value
                                if (arr[2] == '') {
                                    num = '-' + arr[3];
                                } else {
                                    num = arr[2];
                                }

                            } else {

                                // check negative value
                                if (arr[3] == '') {
                                    num = '-' + arr[4];
                                } else {
                                    num = arr[3];
                                }
                            }
                        }

                        // chech !important tag
                        if (arr[arr.length - 1] == 'important') {
                            important = ' !important';
                        }

                        if (!$(this).hasClass('wpb_content_element vc_column_container')) {
                            css_tmp = '.' + match + '{' + arr[0] + (direction ? '-' + direction : '') + ':' + num + 'px' + (important ? important : '' ) + ';}';
                        }

                        if ($(this).hasClass('wpb_content_element')) {
                            css_tmp = '.wpb_content_element.' + match + '{' + arr[0] + (direction ? '-' + direction : '') + ':' + num + 'px' + (important ? important : '' ) + ';}';
                            match += '-wpb_content_element';
                        }

                        if ($(this).hasClass('vc_column_container')) {

                            var important_tag = $(this).hasClass('vc_col-has-fill') ? ' !important' : '';

                            if (important) {
                                important_tag = important;
                            }

                            css_tmp = '.vc_column_container.' + match + ' > .vc_column-inner' + '{' + arr[0] + (direction ? '-' + direction : '') + ':' + num + 'px' + important_tag + ';}';
                            css_tmp += '.vc_column_container.' + match + '{' + arr[0] + (direction ? '-' + direction : '') + ':' + '0px;}';
                            match += '-vc_column_container';
                        }

                        if (arr[2] != 'only') {

                            switch (arr[1]) {
                                case 'lg':
                                    if (typeof lg_css_tmp[match] == 'undefined') {
                                        lg_css_tmp[match] = css_tmp;
                                    }
                                    break;
                                case 'md':
                                    if (typeof md_css_tmp[match] == 'undefined') {
                                        md_css_tmp[match] = css_tmp;
                                    }
                                    break;
                                case 'sm':
                                    if (typeof sm_css_tmp[match] == 'undefined') {
                                        sm_css_tmp[match] = css_tmp;
                                    }
                                    break;
                                case 'xs':
                                    if (typeof xs_css_tmp[match] == 'undefined') {
                                        xs_css_tmp[match] = css_tmp;
                                    }
                                    break;
                                default:
                                    break;
                            }
                        } else {

                            switch (arr[1]) {
                                case 'lg':
                                    if (typeof lg_only_css_tmp[match] == 'undefined') {
                                        lg_only_css_tmp[match] = css_tmp;
                                    }
                                    break;
                                case 'md':
                                    if (typeof md_only_css_tmp[match] == 'undefined') {
                                        md_only_css_tmp[match] = css_tmp;
                                    }
                                    break;
                                case 'sm':
                                    if (typeof sm_only_css_tmp[match] == 'undefined') {
                                        sm_only_css_tmp[match] = css_tmp;
                                    }
                                    break;
                                case 'xs':
                                    if (typeof xs_only_css_tmp[match] == 'undefined') {
                                        xs_only_css_tmp[match] = css_tmp;
                                    }
                                    break;
                                default:
                                    break;
                            }

                        }
                    }
                }
            });

            var xs_css = '', sm_css = '', md_css = '', lg_css = '';
            var xs_only_css = '', sm_only_css = '', md_only_css = '', lg_only_css = '';

            $.each(xs_css_tmp, function (k, v) {
                xs_css += v;
            });

            $.each(sm_css_tmp, function (k, v) {
                sm_css += v;
            });

            $.each(md_css_tmp, function (k, v) {
                md_css += v;
            });

            $.each(lg_css_tmp, function (k, v) {
                lg_css += v;
            });

            $.each(xs_only_css_tmp, function (k, v) {
                xs_only_css += v;
            });

            $.each(sm_only_css_tmp, function (k, v) {
                sm_only_css += v;
            });

            $.each(md_only_css_tmp, function (k, v) {
                md_only_css += v;
            });

            $.each(lg_only_css_tmp, function (k, v) {
                lg_only_css += v;
            });

            if (xs_css != '') {
                css += '@media (min-width: 20em){' + xs_css + '}';
            }
            if (sm_css != '') {
                css += '@media (min-width: 48em){' + sm_css + '}';
            }

            if (md_css != '') {
                css += '@media (min-width: 64em){' + md_css + '}';
            }
            if (lg_css != '') {
                css += '@media (min-width: 80em){' + lg_css + '}';
            }

            if (xs_only_css != '') {
                css += '@media (min-width: 20em) and (max-width: 47.9em){' + xs_only_css + '}';
            }
            if (sm_only_css != '') {
                css += '@media (min-width: 48em) and (max-width: 63.9em){' + sm_only_css + '}';
            }

            if (md_only_css != '') {
                css += '@media (min-width: 64em) and (max-width: 79.9em){' + md_only_css + '}';
            }
            if (lg_only_css != '') {
                css += '@media (min-width: 80em){' + lg_only_css + '}';
            }

            var tm_renovation_style = document.getElementById('tm-renovation-inline-css');
            if (tm_renovation_style !== null) {
                tm_renovation_style.textContent += css;
            }
        },
    };

})(jQuery);

jQuery(document).ready(function () {

    renovation.init();

});