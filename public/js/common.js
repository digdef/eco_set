var common = {
	init: function() {
		common.scrollTop();
		common.fixNavigation();
		common.rangeSlider();
		common.main();
		common.carousel();
		common.select();
		common.submitForm();
	},
	scrollTop: function(){
		var btnTop = $('#topBtn');

		function checkScrollPos(){
			if ($(window).scrollTop() > 250) {
				btnTop.show();
			  } else {
				btnTop.hide();
			  }
		};

		checkScrollPos();

		$(window).scroll(function() {
			checkScrollPos();
		});

		btnTop.on('click', function(e) {
		  e.preventDefault();
		  $('html, body').animate({scrollTop:0}, '500');
		});

	},
	fixNavigation: function(){
		var header = $('header'),
		scrollPrev = 0;
		function fixNav(){
			var scrolled = $(window).scrollTop();
			if(scrolled == 0) {
				header.removeClass('out');
				header.removeClass('fixed');
				$('body').css('margin-top', 0);
			}else if(scrolled > header.outerHeight() && scrolled > scrollPrev){
				header.addClass('out');
				header.addClass('fixed');
				if($(window).width() < 993) {
					$('body').css('margin-top', header.outerHeight());
				}else {
					$('body').css('margin-top', $('.header-navigation').outerHeight());
				}

			}else {
				header.removeClass('out');
			}
			scrollPrev = scrolled;
		};


		$(window).scroll(function() {
			fixNav();
		});
	},
	rangeSlider: function(){

	},
	main: function(){

		new WOW().init();

		$('.row-hidden-trigger').click(function(e){
			e.preventDefault();
			var rowHidden = $(this).closest('.row-hidden');
			if(rowHidden.hasClass('row-hidden-cnt') == false) {
				rowHidden.toggleClass('open');
				rowHidden.find('.row-hidden-cnt').removeClass('open-double');
			}else {
				rowHidden.toggleClass('open-double');
			}
		});



		if($(window).width() < 994) {
			$('.filter-item-info').click(function(e){
				e.preventDefault()
				$(this).closest('.filter-item').toggleClass('open')
				$(this).closest('.filter-item-title').toggleClass('active')
				$(this).addClass('active')
			});
			$('.filter-item-info-hidden img').click(function(e){
				e.preventDefault();
				setTimeout(function() {
					$(this).closest('.filter-item').toggleClass('open')
					$(this).closest('.filter-item-title').toggleClass('active')
					$('.filter-item-info').removeClass('active')
				}, 200)
			});
		}

		$('.item-trigger:not(.card-item-add-trigger)').click(function(){
			$(this).toggleClass('active');
		});
		$('.card-item-add-link').click(function(){
			$(this).toggleClass('active');
		});


		$('.cart-quantity button').click(function(e){
			e.preventDefault();
			var activeQuantity = $(this).closest('.quantity-row').find('input').val();

			if($(this).hasClass('quantity-plus')) {
                $(this).closest('.cart-item').find('#quantity').val(Number(activeQuantity) + 1);
                $(this).closest('.quantity-row').find('input').val(Number(activeQuantity) + 1);
                var price = Number($(this).closest('.quantity-row').find('.price-val').html()) * (Number(activeQuantity) + 1);
                $(this).closest('.cart-item').find('.cart-price-new').html(price + ' <span>руб</span>');
            }
			if($(this).hasClass('quantity-minus')) {
				if(activeQuantity !== '1') {
                    $(this).closest('.cart-item').find('#quantity').val(Number(activeQuantity) - 1);
                    $(this).closest('.quantity-row').find('input').val(Number(activeQuantity) - 1);
                    var price = Number($(this).closest('.quantity-row').find('.price-val').html()) * (Number(activeQuantity) - 1);
                    $(this).closest('.cart-item').find('.cart-price-new').html(price + ' <span>руб</span>');
				}
			}

            var form = $(this).closest('.cart-item').find('.cart-quantity').serialize();

            $.ajax({
                url: '/cart-plus',
                type: "POST",
                data: form,
                success: function (data) {
                	$('.cart-buttons-price').html(data + ' <span>руб</span>')
				},
                error: function (msg) {
                    alert('Ошибка');
                }

            });
		});


		$('.filter-item-title').click(function(){
			$(this).toggleClass('active');
			$(this).closest('.filter-item').toggleClass('open');
		});


		$('.catalog-filter-trigger').click(function(e){
			e.preventDefault();
			$(this).closest('.catalog-filter-section').find('.catalog-filter').addClass('active');
			$(this).closest('.catalog-filter-section').addClass('active');
		});
		$('.filter-close').click(function(e){
			e.preventDefault();
			$(this).closest('.catalog-filter-section').find('.catalog-filter').removeClass('active');
			$(this).closest('.catalog-filter-section').removeClass('active');
		});

		$('.delete-favorite').click(function(e){
			e.preventDefault();
            var form = $(this).closest('.favorites-form').serialize();
            $.ajax({
                url: '/add-in-favorites',
                type: "POST",
                data: form,
                success: function (data) {
                    if (data == 'add') {
                        $('.favorites_count').html(Number($('.favorites_count').html()) + 1);
                    } else {
                        $('.favorites_count').html($('.favorites_count').html() - 1);
                    }
                    console.log(123);
                },
                error: function (msg) {
                    alert('Ошибка');
                }

            });
			var list = $(this).closest('.catalog-list');
			$(this).closest('.catalog-item').remove();
			if($('.favorites .catalog-item').length == 0) {
				list.addClass('no-cnt');
			}
		});

		$('.delete-cart-item').click(function(e){
			e.preventDefault();
            var form = $(this).closest('.cart-form').serialize();
            var price = Number($('.price-all').html()) - Number($(this).closest('.cart-item').find('.price-val').html());
            $('.cart-buttons-price').html(price + ' <span>руб</span>');

            $.ajax({
                url: '/del-in-cart',
                type: "POST",
                data: form,
                success: function (data) {
                    if (data == 'add') {
                        $('.cart_count').html(Number($('.cart_count').html()) + 1);
                    } else {
                        $('.cart_count').html($('.cart_count').html() - 1);
                    }

                    $('.cart-buttons-price').html(price + ' <span>руб</span>')
                },
                error: function (msg) {
                    alert('Ошибка');
                }

            });
			var list = $(this).closest('.cart-list');
			$(this).closest('.cart-item').remove();
			if($('.cart-list .cart-item').length == 0) {
				list.addClass('no-cnt');
			}
		});
		$('.delete-comparison').click(function(e){
			e.preventDefault();
            var form = $(this).closest('.comparison-form').serialize();
            $.ajax({
                url: '/post-comparison',
                type: "POST",
                data: form,
                success: function (data) {
                    if (data == 'add') {
                        $('.comparison_count').html(Number($('.comparison_count').html()) + 1);
                    } else {
                        $('.comparison_count').html($('.comparison_count').html() - 1);
                    }
                },
                error: function (msg) {
                    alert('Ошибка');
                }

            });
			var list = $(this).closest('.comparison-list');
			$(this).closest('.comparison-item').remove();
			if($('.comparison-list .comparison-item').length == 0) {
				list.addClass('no-cnt');
			}
		});

		$('.tabs-section a').click(function(e){
			e.preventDefault();
			if($(this).hasClass('.active') == false) {
				var tabCnt = '.' + $(this).attr('data-cnt');
				$(this).closest('.tabs-wrapper').find('.tabs-section a.active, .tab-cnt').removeClass('active')
				$(tabCnt).addClass('active')
				$(this).addClass('active');
				var bLazy = new Blazy({});
			}
		});

		jQuery(function($){
			$(document).mouseup(function (e){
				var popup = $(".popup");
				if (!popup.is(e.target)
					&& popup.has(e.target).length === 0) {
						if($('.popup-wrapper').hasClass('active') == true){
							$('body').removeClass('hidden');
							$('.popup-wrapper').hide();
							$('.popup-wrapper').removeClass('active');
						}
				}
			});
		});

		$('.call-popup').click(function(event){
			event.preventDefault();
			var popup  = '#' + $(this).attr('data-popup');
			if($(this).closest('.catalog-item')) {
				var popupText = $(this).closest('.catalog-item').find('.catalog-item-title').text();
				if (popupText === '') {
                    var popupText = $('.title-s').text();
				}
				$('#oneClick').find('.popup-title span').text('');
				$(popup).find('.popup-title span').text(popupText);
                $(popup).find('.inp-title').val($(popup).find('.inp-title').val() + ' ' + popupText);
			}

            if( $(this).attr('data-popup') === 'callbackPopupInstallation') {
                var popupText = $('.title-s').text();
                $('#oneClick').find('.popup-title span').text('');
                $(popup).find('.popup-title span').text(popupText);
                $(popup).find('.inp-title').val($(popup).find('.inp-title').val() + ' ' + popupText);
            }

			$('.popup-wrapper').addClass('active');
			$('.popup-wrapper').hide();
			$('header').removeClass('open');
			setTimeout(function(){
				$('.caller').removeClass('open');
			}, 100);
			$('body').addClass('hidden');
			$(popup).show();
		});

        $('.call-popup-product-page').click(function(event){
            event.preventDefault();
            var popup  = '#' + $(this).attr('data-popup');
            if($(this).closest('.catalog-item')) {
                var popupText = $('.title-s').text();
                $('#oneClick').find('.popup-title span').text('');
                $(popup).find('.popup-title span').text(popupText);
            }
            $('.popup-wrapper').addClass('active');
            $('.popup-wrapper').hide();
            $('header').removeClass('open');
            setTimeout(function(){
                $('.caller').removeClass('open');
            }, 100);
            $('body').addClass('hidden');
            $(popup).show();
        });


		$('.popup-close').click(function(){
			$('body').removeClass('hidden');
			$(this).closest('.popup-wrapper').hide();
			$('.popup-wrapper').removeClass('active');
		});

		var bLazy = new Blazy({});

		// if($(window).width() < 1025) {
		// 	$('.nav-link-trigger').click(function(){
		// 		if($(this).closest('.nav-link').hasClass('active')) {
		// 			$('.nav-link').removeClass('active');
		// 		}else{
		// 			$('.nav-link').removeClass('active');
		// 			$(this).closest('.nav-link').addClass('active');
		// 		}
		// 	});
		// }
		// $('.menu-trigger').click(function(){
		// 	$('.header').addClass('open');
		// });
		// $('.menu-mob-close').click(function(){
		// 	$('.header').removeClass('open');
		// });

		$('.phone-mask').mask("+7(999) 999-99-99");
	},
	carousel: function(){

		$('.banner-slider').owlCarousel({
			loop:true,
			nav: false,
			dots: true,
			items: 1,
			margin:20,
			autoplay:true,
			autoplayTimeout:5000,
			autoplayHoverPause:true,
		});

		var sliderLettersItem = $('.slider-letters .slider'),
			sliderVideosItem = $('.slider-videos .slider'),
			sliderAudioItem = $('.slider-audio .slider'),
			sliderRevsItem = $('.slider-revs .slider');

		sliderLettersItem.owlCarousel({
			loop:true,
			nav: false,
			dots: false,
			items: 5,
			margin:20,
			autoplay:true,
			autoplayTimeout:5000,
			autoplayHoverPause:true,
			responsive:{
				0:{
					items:1
				},
				359:{
					items: 2
				},
				550:{
					items:3
				},
				768:{
					items:4
				},
				993:{
					items:5
				}
			}
		});

		sliderVideosItem.owlCarousel({
			loop:true,
			nav: false,
			dots: false,
			items: 3,
			margin:20,
			autoplay:false,
			autoplayTimeout:5000,
			autoplayHoverPause:true,
			responsive:{
				0:{
					items:1
				},
				550:{
					items:2
				},
				993:{
					items:3
				}
			}
		});

		sliderAudioItem.owlCarousel({
			loop:true,
			nav: false,
			dots: false,
			items: 5,
			margin:20,
			autoplay:false,
			autoplayTimeout:5000,
			autoplayHoverPause:true,
			responsive:{
				0:{
					items:1
				},
				359:{
					items: 2
				},
				550:{
					items:3
				},
				768:{
					items:4
				},
				993:{
					items:5
				}
			}
		});

		sliderRevsItem.owlCarousel({
			loop:true,
			nav: false,
			dots: false,
			autoHeight: true,
			items: 1,
			margin:0,
			autoplay:false,
			autoplayTimeout:5000,
			autoplayHoverPause:true,
		});


		$('.slider-item .am-prev').click(function() {
			var dataSlider = $(this).attr('data-slider')
			$(dataSlider).trigger('prev.owl.carousel', [300]);
			var bLazy = new Blazy({});
		})

		$('.slider-item .am-next').click(function() {
			var dataSlider = $(this).attr('data-slider')
			$(dataSlider).trigger('next.owl.carousel', [300]);
			var bLazy = new Blazy({});
		})

		$('.owl-carousel').on('translated.owl.carousel', function(event) {
			var bLazy = new Blazy({});
		})

	},
	select: function() {
		var x, i, j, l, ll, selElmnt, a, b, c;
		/* Look for any elements with the class "custom-select": */
		x = document.getElementsByClassName("custom-select");
		l = x.length;
		for (i = 0; i < l; i++) {
		selElmnt = x[i].getElementsByTagName("select")[0];
		ll = selElmnt.length;
		/* For each element, create a new DIV that will act as the selected item: */
		a = document.createElement("DIV");
		a.setAttribute("class", "select-selected");
		a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
		x[i].appendChild(a);
		/* For each element, create a new DIV that will contain the option list: */
		b = document.createElement("DIV");
		b.setAttribute("class", "select-items select-hide");
		for (j = 1; j < ll; j++) {
			/* For each option in the original select element,
			create a new DIV that will act as an option item: */
			c = document.createElement("DIV");
			c.innerHTML = selElmnt.options[j].innerHTML;
			c.addEventListener("click", function(e) {
				/* When an item is clicked, update the original select box,
				and the selected item: */
				var y, i, k, s, h, sl, yl;
				s = this.parentNode.parentNode.getElementsByTagName("select")[0];
				sl = s.length;
				h = this.parentNode.previousSibling;
				for (i = 0; i < sl; i++) {
				if (s.options[i].innerHTML == this.innerHTML) {
					s.selectedIndex = i;
					h.innerHTML = this.innerHTML;
					y = this.parentNode.getElementsByClassName("same-as-selected");
					yl = y.length;
					for (k = 0; k < yl; k++) {
					y[k].removeAttribute("class");
					}
					this.setAttribute("class", "same-as-selected");
					break;
				}
				}
				h.click();
			});
			b.appendChild(c);
		}
		x[i].appendChild(b);
		a.addEventListener("click", function(e) {
			/* When the select box is clicked, close any other select boxes,
			and open/close the current select box: */
			e.stopPropagation();
			closeAllSelect(this);
			this.nextSibling.classList.toggle("select-hide");
			this.classList.toggle("select-arrow-active");
		});
		}

		function closeAllSelect(elmnt) {
		/* A function that will close all select boxes in the document,
		except the current select box: */
		var x, y, i, xl, yl, arrNo = [];
		x = document.getElementsByClassName("select-items");
		y = document.getElementsByClassName("select-selected");
		xl = x.length;
		yl = y.length;
		for (i = 0; i < yl; i++) {
			if (elmnt == y[i]) {
			arrNo.push(i)
			} else {
			y[i].classList.remove("select-arrow-active");
			}
		}
		for (i = 0; i < xl; i++) {
			if (arrNo.indexOf(i)) {
			x[i].classList.add("select-hide");
			}
		}
		}

		/* If the user clicks anywhere outside the select box,
		then close all select boxes: */
		document.addEventListener("click", closeAllSelect);
	},
	// submitForm: function() {
	// 	$("form").submit(function(event){
	// 		event.preventDefault();
	// 		formField = $(this).find(".field:not(.field-norequired)")
	//
	// 		formField.each(function(){
	// 			var thisEl = $(this);
	// 			if (! thisEl.val().length) {
	// 				thisEl.addClass('error')
	// 				setTimeout(function(){
	// 					thisEl.removeClass('error')
	// 				}, 3000)
	// 				thisEl.addClass('form-error')
	// 			}else { thisEl.removeClass('form-error')}
	// 		});
	// 		if(formField.hasClass('form-error') == false){
	// 			if($(this).closest('.cart').hasClass('cart') == true) {
	// 				document.location.href = "./checkout.html";
	// 			}else if($(this).find('input[type="submit"]').hasClass('filter-btn-trigger') == false) {
	// 				document.location.href = "./thanks.html";
	// 			}
	// 		}
	// 	});
	// }
};

(function() {
	common.init();
}());



