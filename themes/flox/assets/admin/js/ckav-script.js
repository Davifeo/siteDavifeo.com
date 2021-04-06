; (function () {

	"use strict";
	
	var theme_color_data = {
		'reset': {
			'default': '',
			'primary': '',
			'dark': '',
			'light': '',
			'lighten': '',
			'basefontcolor': '',
		},
		'default': {
			'default': '#26abff', //'#47A4AA'
			'primary': '#FF5200',
			'dark': '#222222',
			'light': '#c9f3ff', //'#D1F1F3'
			'lighten': 'rgba(0, 0, 0, 0.035)',
			'basefontcolor': '#666',
		},
		'dark': {
			'default': '#4790ff', //'#47A4AA'
			'primary': '#FF5200',
			'dark': '#222222',
			'light': '#8782fc', //'#D1F1F3'
			'lighten': 'rgba(0, 0, 0, 0.15)',
			'basefontcolor': 'rgba(255, 255, 255, 0.7)',
		},
		'theme1':{
			'default': '#3D8EF7',
			'primary': '#F81E50',
			'dark': '#192A57',
			'light': '#F7F9FB',
			'lighten': 'rgba(0, 0, 0, 0.035)',
			'basefontcolor': '#666',
		},
		'theme2':{
			'default': '#4A63E8',
			'primary': '#62CA97',
			'dark': '#0A1F69',
			'light': '#F7F9FB',
			'lighten': 'rgba(0, 0, 0, 0.035)',
			'basefontcolor': '#666',
		},
		'theme3':{
			'default': '#26C8C8',
			'primary': '#FB575A',
			'dark': '#32323B',
			'light': '#F7F9FB',
			'lighten': 'rgba(0, 0, 0, 0.035)',
			'basefontcolor': '#666',
		},
		'theme4':{
			'default': '#FF8465',
			'primary': '#496096',
			'dark': '#333A56',
			'light': '#F7F9FB',
			'lighten': 'rgba(0, 0, 0, 0.035)',
			'basefontcolor': '#666',
		},
	};

	jQuery(document).ready(function ($) {
		
		if (typeof fwEvents !== 'undefined') {

			var skinModal = false;
			fwEvents.on('fw:options-modal:open', function(data){
				skinModal = data;
			});

			fwEvents.on('fw:options:init', function (data) {
				var $opt = $(".fw-backend-option");
				for (var i = 0; i < $opt.length; i++) {
					$($opt[i]).find('.fw-backend-option-desc').appendTo($($opt[i]).find("> .fw-backend-option-label"));
					
				}

				/*== Add inline form class for customizer options ===============*/
				var $fwinline = $(".fw-frm-inline");
				for (var i = 0; i < $fwinline.length; i++) {
					$($fwinline[i]).closest('.customize-control').addClass('fw-frm-inline-wrp');
				}

				/*== Theme skin selector ===============*/
				jQuery('.fw-option-type-select#fw-edit-options-modal-theme-skins').on('change', function(event, data){
					
					var selectedTheme = jQuery(this).val() !== '' ? jQuery(this).val() : 'default',
						ckavThemeSkin = theme_color_data[selectedTheme];

					$("#fw-edit-options-modal-theme-default").spectrum("set", ckavThemeSkin['default']);
					$("#fw-edit-options-modal-theme-primary").spectrum("set", ckavThemeSkin['primary']);
					$("#fw-edit-options-modal-theme-dark").spectrum("set", ckavThemeSkin['dark']);
					$("#fw-edit-options-modal-theme-light").spectrum("set", ckavThemeSkin['light']);
					$("#fw-edit-options-modal-theme-lighten").spectrum("set", ckavThemeSkin['lighten']);
					$("#fw-edit-options-modal-theme-basefontcolor").spectrum("set", ckavThemeSkin['basefontcolor']);

				});
				
			});
		}

	});
})();

