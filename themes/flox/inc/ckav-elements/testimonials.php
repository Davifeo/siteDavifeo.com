<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
	exit;

class CKav_Testimonials extends Widget_Base {

	public function get_name() { 
		return 'ckav-testimonials';
	}

	public function get_title() {
		return esc_html__( 'Testimonials', 'flox' );
	}
 
	public function get_icon() {
		return 'eicon-testimonial';
	}

	public function get_categories() {
		return [ 'ckav-pack' ];
	}

	protected function _register_controls() {

		/*
		* Content section 
		*************************/
		$this->start_controls_section(
			'section_tab', [
				'label' =>esc_html__( 'Content section', 'flox' ),
			]
		);
			
			$this->add_control(
				'style', [
					'type' => Controls_Manager::SELECT,
					'label' => esc_html__('Style', 'flox'),
					'default' => 'style1',
					'options' => [
						'style1' => esc_html('Style 1', 'flox'),
						'style2' => esc_html('Style 2', 'flox'),
						'style3' => esc_html('Style 3', 'flox'),
					]
				]
			);
			
            $this->add_control(
                'testimonial_list',
                [
                    'label' => '',
                    'type' => Controls_Manager::REPEATER,
                    'default' => [
                        [
                            'title' => esc_html__( 'SALLIE MALONE', 'flox' ),
                        ],
                    ],
                    'fields' => [
                        [
                            'name' => 'person_image',
                            'type' => Controls_Manager::MEDIA,
                            'label' => esc_html__('Image', 'flox'),
                            'label_block' => true,
                        ],
                        [
                            'name' => 'title',
                            'type' => Controls_Manager::TEXT,
                            'label' => esc_html__('Title', 'flox'),
                            'default'   =>  esc_html__('SALLIE MALONE', 'flox'),
                            'label_block' => true,
                        ],
                        [
                            'name' => 'subtitle',
                            'type' => Controls_Manager::TEXT,
                            'label' => esc_html__('Sub title', 'flox'),
                            'default'   =>  esc_html__('Art Director','flox'),
                            'label_block' => true,
                        ],
                        [
                            'name' => 'desc',
                            'label'			 => esc_html__( 'Description', 'flox' ),
                            'type'			 => Controls_Manager::TEXTAREA,
                            'label_block'	 => true,
                            'placeholder'	 => esc_html__( 'Description text', 'flox' ),
                            'default'		 => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ',
                        ],
                    ],
                    'title_field' => '{{{ title }}}',
                ]
            );

        $this->end_controls_section();


        /*
		* Settings
		*************************/
		$this->start_controls_section(
			'setting_tab', [
				'label' =>esc_html__( 'Settings', 'flox' ),
			]
		);

			$this->add_control(
				'display-type', [
					'type' => Controls_Manager::SELECT,
					'label' => esc_html__('Display style', 'flox'),
					'default' => 'grid',
					'options' => [
						'grid' => esc_html('Grid', 'flox'),
						'carousel' => esc_html('Carousel', 'flox'),
					]
				]
			);

			$this->add_control(
				'carousel-item', [
					'label' => esc_html__( 'Carousel items', 'flox' ),
					'type' => Controls_Manager::NUMBER,
					'min' => 1,
					'max' => 3,
					'step' => 1,
					'default' => 1,
					'condition' => [
						'display-type' => 'carousel',
					],
				]
			);

			$this->add_control(
				'column', [
					'label' => esc_html__( 'Columns', 'flox' ),
					'type' => Controls_Manager::NUMBER,
					'min' => 1,
					'max' => 4,
					'step' => 1,
					'default' => 2,
					'condition' => [
						'display-type' => 'grid',
					],
				]
			);
			
			$this->add_control(
				'gutter', [
					'type' => Controls_Manager::SELECT,
					'label' => esc_html__('Gird gutter', 'flox'),
					'default' => 'gt30 mb30',
					'options' => [
						'gt0 mb0' => esc_html('0', 'flox'),
						'gt1 mb1' => esc_html('1', 'flox'),
						'gt10 mb10' => esc_html('10', 'flox'),
						'gt20 mb20' => esc_html('20', 'flox'),
						'gt30 mb30' => esc_html('30', 'flox'),
						'gt40 mb40' => esc_html('40', 'flox'),
						'gt50 mb50' => esc_html('50', 'flox'),
						'gt60 mb60' => esc_html('60', 'flox'),
					],
					'condition' => [
						'display-type' => 'grid',
					],
				]
			);
			
			$this->add_control(
				'light_theme', [
					'type' => Controls_Manager::SWITCHER,
					'label' => esc_html__('Apply light theme?', 'flox'),
					'label_block' => false,
					'default' => 'no',
					'yes' => esc_html__( 'Yes', 'flox' ),
					'no' => esc_html__( 'No', 'flox' ), 
				]
			);

		$this->end_controls_section();

	}

	protected function render() {
		
		$settings = $this->get_settings_for_display();
		
		require THEME_ELE . '/templates/testimonials/'.$settings['style'].'.php';
	}

	protected function _content_template() { }
}
