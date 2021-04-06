<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
	exit;

class CKav_Blogposts extends Widget_Base {

	public function get_name() { 
		return 'ckav-blogposts';
	}

	public function get_title() {
		return esc_html__( 'Blog posts', 'flox' );
	}
 
	public function get_icon() {
		return 'eicon-wordpress';
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
                'post_items',
                [
                    'label' => esc_html__( 'Display items', 'flox' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 3,
                    'max' => 20,
                    'step' => 1,
                    'default' => 6,
                ]
            );

            $this->add_control(
                'date',
                [
                    'label' => esc_html__( 'Show date?', 'flox' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Yes', 'flox' ),
                    'label_off' => esc_html__( 'No', 'flox' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            $this->add_control(
                'author',
                [
                    'label' => esc_html__( 'Show author?', 'flox' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Yes', 'flox' ),
                    'label_off' => esc_html__( 'No', 'flox' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            $this->add_control(
                'desc',
                [
                    'label' => esc_html__( 'Show description?', 'flox' ),
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
				'light_theme', [
					'type' => Controls_Manager::SWITCHER,
					'label' => esc_html__('Apply light theme?', 'flox'),
					'label_block' => false,
					'default' => 'no',
					'yes' => esc_html__( 'Yes', 'flox' ),
					'no' => esc_html__( 'No', 'flox' ), 
				]
			);
			$this->add_control(
				'postbox_bg', [
					'label'		 =>esc_html__( 'Box background', 'flox' ),
					'type'		 => Controls_Manager::COLOR,
					'selectors'	 => [
						'{{WRAPPER}} .ckav-postbox' => 'background-color: {{VALUE}};',
					],
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
					],
					'separator' => 'before',
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
            

		$this->end_controls_section();

	}

	protected function render() {
		
		$settings = $this->get_settings_for_display();
		
		require THEME_ELE . '/templates/blogposts/style1.php';
	}

	protected function _content_template() { }
}
