<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
	exit;

class CKav_Portfolio extends Widget_Base {

	public function get_name() { 
		return 'ckav-portfolio';
	}

	public function get_title() {
		return esc_html__( 'Portfolio', 'flox' );
	}
 
	public function get_icon() {
		return 'eicon-gallery-grid';
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
                'portfolio_items',
                [
                    'label' => esc_html__( 'Display items', 'flox' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 3,
                    'max' => 100,
                    'step' => 1,
                    'default' => 6,
                ]
			);
			
			$this->add_control(
                'filter_status',
                [
                    'label' => esc_html__( 'Show filters?', 'flox' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Yes', 'flox' ),
                    'label_off' => esc_html__( 'No', 'flox' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
			);
			
			$this->add_control(
                'title_status',
                [
                    'label' => esc_html__( 'Show title?', 'flox' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Yes', 'flox' ),
                    'label_off' => esc_html__( 'No', 'flox' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
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
				'column', [
					'label' => esc_html__( 'Columns', 'flox' ),
					'type' => Controls_Manager::NUMBER,
					'min' => 1,
					'max' => 4,
					'step' => 1,
					'default' => 3,
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
					]
				]
			);

			$this->add_control(
				'image_ratio', [
					'type' => Controls_Manager::SELECT,
					'label' => esc_html__('Image ratio', 'flox'),
					'default' => 'ratio-3x4',
					'options' => [
						'ratio-3x4' => esc_html__('Default', 'flox'),
						'square' => esc_html__('Square', 'flox'),
					],
					'separator' => "before"
				]
			);

			$this->add_control(
				'imgrd', [
					'label' => esc_html__( 'Image radius', 'flox' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 50,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 10,
					],
					'selectors' => [
						'{{WRAPPER}} .portfolio-box .portfolio-img' => 'border-radius: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'upper', [
					'type' => Controls_Manager::SWITCHER,
					'label' => esc_html__('Portfolio Title - uppercase?', 'flox'),
					'label_block' => false,
					'default' => 'no',
					'yes' => esc_html__( 'Yes', 'flox' ),
					'no' => esc_html__( 'No', 'flox' ), 
					'separator' => "before"
				]
			);

			$this->add_control(
				'filter-upper', [
					'type' => Controls_Manager::SWITCHER,
					'label' => esc_html__('Filters - uppercase?', 'flox'),
					'label_block' => false,
					'default' => 'no',
					'yes' => esc_html__( 'Yes', 'flox' ),
					'no' => esc_html__( 'No', 'flox' ), 
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

			$this->add_responsive_control(
				'filter_align',
				[
					'label' => esc_html__( 'Filter alignment', 'flox' ),
					'type' => Controls_Manager::CHOOSE,
					'options' => [
						'flex-start' => [
							'title' => esc_html__( 'Left', 'flox' ),
							'icon' => 'fa fa-align-left',
						],
						'center' => [
							'title' => esc_html__( 'Center', 'flox' ),
							'icon' => 'fa fa-align-center',
						],
						'flex-end' => [
							'title' => esc_html__( 'Right', 'flox' ),
							'icon' => 'fa fa-align-right',
						],
					],
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .filter-wrp .filters' => 'justify-content: {{VALUE}};',
					],
				]
			);

		$this->end_controls_section();

	}

	protected function render() {
		
		$settings = $this->get_settings_for_display();
		
		require THEME_ELE . '/templates/portfolio/style1.php';
	}

	protected function _content_template() { }
}
