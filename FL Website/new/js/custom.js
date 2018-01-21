(function($) {
    'use strict'; // Start of use strict
    var body_s = $('body'),
        window_var = $(window);
    /*------------------------------------------------------------------
        Header Navigation
    ------------------------------------------------------------------*/
    var windowSize = $(window).width();

    if (windowSize >= 767) {
        $('ul.nav').find('li.dropdown').hover(function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
        }, function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
        });
    }

    /*------------------------------------------------------------------
        Gallery
    ------------------------------------------------------------------*/
    $("div[id^='myModal']").each(function() {

        var currentModal = $(this);

        //click next
        currentModal.find('.btn-next').click(function() {
            currentModal.modal('hide');
            var modalid = $(this).attr('data-modal')
            $("div[data-modal='" + modalid + "']").first().modal('show');
        });

        //click prev
        currentModal.find('.btn-prev').click(function() {
            currentModal.modal('hide');
            var modalid = $(this).attr('data-modal')
            $("div[data-modal='" + modalid + "']").first().modal('show');
        });

    });


    /*------------------------------------------------------------------
    	Scrool Top
    ------------------------------------------------------------------*/
    $.scrollUp({
        scrollText: '<i class="fa fa-angle-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });
    /*------------------------------------------------------------------
        Loader
    ------------------------------------------------------------------*/
    $(window).on("load scroll", function() {
        $("#dvLoading").fadeOut("fast");
    });

    /*------------------------------------------------------------------
    	Header Search
    ------------------------------------------------------------------*/
    $("#search-form").hide();
    $(".logo-wrapper").find('.fa-search').on('click', function() {
        $("#search-form").toggle();
        $("#search-form").fadeIn().addClass("open");
    });
    $("#search-form").find('.close').on('click', function() {
        $("#search-form").fadeOut().removeClass("open");
        $("#this").hide();
    });
    /*------------------------------------------------------------------
       Get a Free Quote
    ------------------------------------------------------------------*/
    $('.quote').find('a').on('click', function() {
        $('.quote-popup').show();
    });
    $('.quote-popup').find('.fa-times').on('click', function() {
        $('.quote-popup').hide();
    });
    /*------------------------------------------------------------------
    Owl Carousel for Services
	------------------------------------------------------------------*/
    var owl = $("#services");
    owl.owlCarousel({
        nav: true,
        margin: 10,
        loop: true,
        responsive: {
            0: {
                items: 1
            },
            450: {
                items: 1
            },
            600: {
                items: 2
            },
            700: {
                items: 2
            },
            1000: {
                items: 3
            },
            1200: {
                items: 3
            },
            1400: {
                items: 3
            },
            1600: {
                items: 3
            }
        }
    });
    /*------------------------------------------------------------------
       Animation Numbers
       ------------------------------------------------------------------*/
    jQuery('.animateNumber').each(function() {
        var num = jQuery(this).attr('data-num');

        var top = jQuery(document).scrollTop() + (jQuery(window).height());
        var pos_top = jQuery(this).offset().top;
        if (top > pos_top && !jQuery(this).hasClass('active')) {
            jQuery(this).addClass('active').animateNumber({
                number: num
            }, 2000);
        }
    });
    /*----------------------------------------------------
                     Portfolio Isotope
      ----------------------------------------------------*/

    //======= ISOTOP FILTERING JS  ========//
    window_var.on('load', function() {
        var grid_container = $('.portfolio-container'),
            grid_item = $('.work');


        grid_container.imagesLoaded(function() {
            grid_container.isotope({
                itemSelector: '.work',
                layoutMode: 'masonry'
            });
        });

        $('.portfolio-filter').find('li').on('click', function(e) {
            $('.portfolio-filter li.active').removeClass('active');
            $(this).addClass('active');
            var selector = $(this).attr('data-filter');
            grid_container.isotope({
                filter: selector
            });
            return false;
            e.preventDefault();
        });
    });


    //======= MAGNIFIC POPUP ========//
    $('.work a').magnificPopup({
        type: 'inline'
    });
   //======= Pop-up Slider ========//
    $('.with-caption').magnificPopup({
        type: 'image',
        closeBtnInside: false,
        mainClass: 'mfp-with-zoom mfp-img-mobile',

        image: {
            verticalFit: true,
            titleSrc: function(item) {

            }
        },
        gallery: {
            enabled: true
        },

        callbacks: {
            open: function() {
                this.wrap.on('click.pinhandler', '.pin-it', function(e) {

                });
            },
            beforeClose: function() {}
        }
    });
    /*------------------------------------------------------------------
    Count Down
    ------------------------------------------------------------------*/
    if ($(".count-down").length) {
        var year = parseInt($(".count-down").attr("data-countdown-year"), 10);
        var month = parseInt($(".count-down").attr("data-countdown-month"), 3) - 1;
        var day = parseInt($(".count-down").attr("data-countdown-day"), 10);
        $(".count-down").countdown({
            until: new Date(year, month, day),
            padZeroes: true
        });
    }



      var typed = new Typed('#textype', {
            strings: ["Start","Stop", "Add Services"],
            typeSpeed: 100,
            startDelay: 1000,
            showCursor: false,
            loop: true,
            loopCount: Infinity,
            backDelay: 2000
          });

// Get the modal
var modal = document.getElementById('modal-address');
var btn = document.getElementById("open-address");
var span = document.getElementsByClassName("pop-close")[0];
btn.onclick = function() {
    modal.style.display = "block";
}
span.onclick = function() {
    modal.style.display = "none";
}

$('#intro-form').on('submit', function() {
    $("#dvLoading").fadeIn(1500);
    $(this).reset();
});
$("#phone").mask("(000) 000-0000");

$('#getaddress').on('keypress', function() {
    if ($("#getaddress").focus()){
        console.log($("#getaddress").val())
        console.log($('#postal_code').attr('value'))
        setInterval(function(){
            if( $("#getaddress").val() != "" && $("#postal_code").val() != "" )
               $(".saddress").fadeIn(1000);
           else
               $(".saddress").fadeOut(1000);
           }
            , 2000);
    } 
   
});


function fixDiv() {
    var $div = $("#divquote");
    if ($(window).scrollTop() > $div.data("top")) { 
        $('#divquote').css({'position': 'fixed', 'top': '0', 'width': '100%'}); 
    }
    else {
        $('#divquote').css({'position': 'static', 'top': 'auto', 'width': '100%'});
    }
}



})(jQuery);