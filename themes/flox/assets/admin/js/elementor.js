( function ($, elementor) {
	"use strict";

	var Ckav = {
		theme_fn: window.ckav,
		init: function () {
			
			var widgets = {
				'ckav-testimonials.default': Ckav.testimonials,
				'ckav-blogposts.default': Ckav.posts,
				'ckav-portfolio.default': Ckav.portfolio,
				
			};
			$.each(widgets, function (widget, callback) {
				elementor.hooks.addAction('frontend/element_ready/' + widget, callback);
				elementor.hooks.addAction( 'panel/open_editor/' + widget, callback);
			});

			
		},
		
		testimonials: function($scope) {
			var owlObj = $($scope).find('.carousel-widget'),
				owlId = 'testi-'+$($scope).attr('data-id');

				owlObj.attr("id", owlId);
				owlObj.css({ opacity: 0 });
				Ckav.theme_fn.slider("#" + owlId);
		},

		posts: function($scope) {

			if ($($scope).find(".masonry-wrp").length > 0) {
				$($scope).find(".masonry-wrp").css({
					opacity: 1,
				});
			} else {
				var owlObj = $($scope).find('.carousel-widget'),
					owlId = 'post-'+$($scope).attr('data-id');

					owlObj.attr("id", owlId);
					owlObj.css({ opacity: 0 });
					Ckav.theme_fn.slider("#" + owlId);
			}
		},

		portfolio: function($scope) {
			
			var ckavfilterableObj = $($scope).find(".ckav-filterable").length > 0 ? $($scope).find(".ckav-filterable") : false,
				ckavfilterableId = 'ckavfilter-'+$($scope).attr('data-id');

				ckavfilterableObj.attr("id", ckavfilterableId);
				ckavfilterableObj.css({ opacity: 0 });
			
			if (ckavfilterableObj) {
				ckav.filterable("#" + ckavfilterableId);
			}
		},

		Popup: function($scope) {
			
			$($scope).find('.popup-id').text('#popup-'+$($scope).attr('data-id'));
			$($scope).find('.popup-id').val('#popup-'+$($scope).attr('data-id'));
			$($scope).find('.popup-link').attr('href', '#popup-'+$($scope).attr('data-id') );

			$($scope).find('.ckav-popup').attr( {
				'id': 'popup-'+$($scope).attr('data-id'),
				'data-popupid': $($scope).attr('data-id'),
			});

			var ckav_modal = $("[href*='#popup-']").length > 0 ? $("[href*='#popup-']") : false;
			if (ckav_modal) {
				ckav.popup(ckav_modal);
			}
			
		},
		Clock_fn: function( $scope ) {
			Ckav.Inline_fn($scope);
			var countdownwidget = $(".countdown-widget").length > 0 ? $(".countdown-widget") : false;
			if (countdownwidget) {
				for (var i = 0; i < countdownwidget.length; i++) {
					$(countdownwidget[i]).children('div').attr("id", 'countdown' + i);
					ckav.countdown("#countdown" + i);
				}
			}
		},
		Button_fn: function( $scope ) {
			Ckav.Inline_fn($scope);
			Ckav.Popup($scope);
		},

		Icon_fn: function( $scope ) {
			Ckav.Inline_fn($scope);
			Ckav.Popup($scope);
		},

		Inline_fn: function (scope) {
			if($(scope).find('[data-wrpaddclass]').length > 0){
				$(scope).addClass($(scope).find('[data-wrpaddclass]').attr('data-wrpaddclass'));
			} else {
				$(scope).removeClass($(scope).find('[data-wrpremoveclass]').attr('data-wrpremoveclass'));
			}
		},
		Section_fn: function( $scope ) {
		},
		
	};

	$(window).on('elementor/frontend/init', Ckav.init);

	

}(jQuery, window.elementorFrontend) );

