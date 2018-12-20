(function ($, Drupal) {

    /*-----------------Default Starts-----------------*/
    var header_height = $('header').outerHeight();

    $('header .mob-menu').on('click', function() {
        $('nav').toggleClass('active');
        $(this).find('span').toggleClass('active');
    });

    if($(window).width() <= 1024) {
        $('header nav').css({'top': header_height});
        $('main').css({'margin-top': header_height});
    }

    /*-----------------Default Ends-----------------*/
    

    /*-----------------Product Rotate Starts-----------------*/
    if($(window).width() > 1024) {
        $(function(){
            setTimeout(function(){
                var src = $('iframe').attr('src');
                $('iframe').attr('src',src+'&wmode=opaque');
            },500);
    
            /*Fullpage-Js START*/
            if($('#fullpage').length) {
                $('#fullpage').fullpage({
                    'verticalCentered': false,
                    'css3': true,
                    /*'sectionsColor': ['#F0F2F4', '#fff', '#fff', '#fff'],*/
                    'navigation': true,
                    'navigationPosition': 'right',
                    'easingcss3': 'cubic-bezier(0.175, 0.885, 0.320, 1.275)',
                    'afterLoad': function(anchorLink, index){
                        $('#fullpage .section').eq(0).removeClass("moveDown");
                        if(index == 1){
                            //$('.section').eq(0).removeClass("init");
                            //$('#iphone3, #iphone2, #iphone4').addClass('active');
                        }
                    },
                    'onLeave': function(index, nextIndex, direction){
                        anim();                 
                        if(index==1){
                            $('.bg-img').addClass('active');
                        }
                        else
                        {
                            $('.bg-img').removeClass('active');
                        }
    
                        if((index==3 && direction =='down') || (index==4 && direction =='down') || (index==5 && direction =='up')){
                            $('#rotator').hide();
                        }
                        else
                        {
                            $('#rotator').fadeIn();
                        }
                        if(nextIndex == 2 && direction == "down"){
                            $('#fullpage .section').eq(index-1).addClass("moveUp")
                            $('#fullpage .section').eq(nextIndex-1).removeClass("moveDown");
                            $('.static').addClass("moveUp");
                        }
    
                        if(nextIndex == 1 && direction == "up"){
                            $('#fullpage .section').eq(nextIndex-1).removeClass("moveUp")
                            $('#fullpage .section').eq(index-1).addClass("moveDown");
                            $('.static').removeClass("moveUp");
                        }
                        
                    }
                });
            }
            /*Fullpage-Js END*/

            var lFollowX = 0,
            lFollowY = 0,
            x = 0,
            y = 0,
            friction = 1 / 30;
    
            function moveBackground() {
            x += (lFollowX - x) * friction;
            y += (lFollowY - y) * friction;
    
            translate = 'translate(' + x + 'px, ' + y + 'px) scale(1.1)';
    
            $('.petals').css({
            '-webit-transform': translate,
            '-moz-transform': translate,
            'transform': translate
            });
    
            window.requestAnimationFrame(moveBackground);
            }
    
            $(window).on('mousemove click', function(e) {
    
            var lMouseX = Math.max(-100, Math.min(100, $(window).width() / 2 - e.clientX));
            var lMouseY = Math.max(-100, Math.min(100, $(window).height() / 2 - e.clientY));
            lFollowX = (20 * lMouseX) / 100; // 100 : 12 = lMouxeX : lFollow
            lFollowY = (10 * lMouseY) / 100;
    
            });
    
            moveBackground();
            
        });
    
        function anim(){
                var rotator = $('#rotator');                     
                var x = 300;
                var productRotation = setInterval(function(){
                    var backgroundPos = $('#rotator').css('backgroundPosition').split(" ");
                    // alert(backgroundPos)
                    var xPos = backgroundPos[0];
                    var finalPos = parseInt(xPos)*(-1);
                    
                    // console.log(finalPos , "-="+ x)
                    if(finalPos==22200)
                    {
                        console.log("A");
                        clearInterval(productRotation);
                        setTimeout(function(){
                            rotator.css('background-position', '0 0');
                        },100);
                        
                    }
                    else{
                        // console.log("B");
                        $('#rotator').css('background-position','-='+x+'px');
                    }
                },15);
        }
    }
    /*-----------------Product Rotate Ends-----------------*/


    /*-----------------Prohance-M Page Starts-----------------*/
    if($(window).width() <= 1024) {
        if($('.pro-count.owl-carousel').length)
        {
            $('.pro-count.owl-carousel').owlCarousel({
                center: true,
                items: 1, 
                dots: true,
                loop: true,
                autoplay: true
            });
        }
        
    }
    /*-----------------Prohance-M Page Starts-----------------*/

    
    /*-----------------Prohance-D Page Starts-----------------*/

    //Section main-banner Starts
    var header_height = $('header').outerHeight();
    var footer_height = $('footer').outerHeight();
    if($(window).width() > 1024) {
        var sec_height = $('section.main-banner').css({'height': 'calc(100vh)'});
    }
    //Section main-banner Ends


    //Section video-scoop Starts
    $('section.video-scoop .wrapper').css({'height': 'calc(100vh)'});
    //Section video-scoop Ends

    /*-----------------Prohance-D Page Ends-----------------*/


    /*-----------------Landing Page Starts-----------------*/
    var total_height = header_height + footer_height + 'px';
    $('.landing-page main').css({'margin-top' : header_height});
    if($(window).width() > 1024) {
        $('section.product').css({'height': 'calc(100vh - '+ total_height +')'});
    }
    /*-----------------Landing Page Ends-----------------*/



    /*-----------------Inner Page Starts-----------------*/
    if($('.product-carousel').length || $('.advantages-info').length) {
        $('.product-carousel').owlCarousel({
            items: 2,
            loop: false,
            mouseDrag: false,
            touchDrag: false,
            pullDrag: false,
            // rewind: true,
            // margin: 50,
            nav: true,
            dots: false
        });
    
        $('.advantages-info').owlCarousel({
            items: 3,
            margin: 80,

            responsive : {
                // breakpoint from 0 up
                0 : {
                    items: 1,
                    margin: 0,
                },
                // breakpoint from 768 up
                768 : {
                    items: 2,
                    margin: 40,
                },
                // breakpoint from 991 up
                992 : {
                    items: 3
                }
            }

        });
    }

    // Product Carousel Thumnail image onclick change
    $('.inner-product .product-carousel .pro-slides img').click(function(){
        var img_id = $(this).attr('data-img');
        $('.'+img_id).show().siblings().hide();
    });	    

    // Product Tab in Desktop and Dropdown in Responsive - Starts
    $('.product-tabs .tabs li').on('click', function() {
        var n = $(this).index();
        $('.product-tabs .tabs li').removeClass('active');
        $(this).addClass('active');

        // $('.product-tabs .tab-desc').hide();
        // $('.product-tabs').find('.tab-desc').eq(n).fadeIn();

        $('.product-tabs .tab-desc .tab-info').hide();
        $('.product-tabs .tab-desc').find('.tab-info').eq(n).fadeIn();
        if($(window).width() <= 1024){  
            var this_text = $(this).text();
            //alert(this_text);
            $('.product-tabs .tabs').slideUp(300);
            $(this).parents('.product-tabs .tabs').prev('.tabs-dropdown').text(this_text);                     
        }
    }).eq(0).addClass('active').click();

    $('.tabs-dropdown').click(function() {
        $(this).next().slideToggle(300);
    });
    // Product Tab in Desktop and Dropdown in Responsive - Ends


    $('section.faq .question-wrp li').on('click', function() {

        if(!$(this).find('.answers').is(':visible')) {
            $('.question-wrp li .answers').slideUp();
            $(this).find('.answers').slideDown();

            $('.quest-txt .drop-sign').html('&plus;');
            $(this).find('.quest-txt .drop-sign').html('&minus;');
        }
    }).eq(0).click();

    $('.view-btn').on('click', function() {
        $('.overlay').fadeIn();
        $('.pop-wrp').fadeIn();
    });

    $('.cross-sign').on('click', function() {
        $('.overlay').fadeOut();
        $('.pop-wrp').fadeOut();
    });


    // Popup contact us
    $('.contact-btn').on('click', function() {
        $('.overlay-contact').fadeIn();
        $('.pop-contact-wrp').fadeIn();
    });

    $('.pop-contact-wrp .cross-sign').on('click', function() {
        $('.overlay-contact').fadeOut();
        $('.pop-contact-wrp').fadeOut();
    });

    /*-----------------Inner Page Ends-----------------*/


    $(document).scroll(function() {
        var y = $(this).scrollTop();
        if($('section.product-property').length)
        {
            var sec_property = $('section.product-property').offset().top - 200;
            var sec_benefits = $('section.benefits').offset().top - 500;
            var sec_health = $('section.health').offset().top - 500;
            // console.log(sec_property);
            // console.log(y);
            if(y > sec_property) {
                $('section.product-property').addClass('active');
            } else {
                $('section.product-property').removeClass('active');
            }

            if(y > sec_benefits) {
                $('section.benefits').addClass('active');
            } else {
                $('section.benefits').removeClass('active');
            }
            
            if(y > sec_health) {
                $('section.health').addClass('active');
            } else {
                $('section.health').removeClass('active');
            }
        }
    });
	
	$(document).on('click', '.recipes_loadmore', function() {
		var id = $('.recipe-wrp').last().attr('id');
		$.ajax({
			url: "/ajax/get-recipes",
			type:'POST',
			dataType: "json",
			data: { id:id },
			success: function(response) {
				if(response.lm == '0') {
					$('.load-wrp').remove();
				}
				if(response.res != '') {
					$('.recipe-listing .recpList').append(response.res);
				}

			}
		});
	});
	
	
})(jQuery, Drupal);