<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
	exit;

class CKav_Title extends Widget_Base {

	public function get_name() { 
		return 'ckav-title';
	}

	public function get_title() {
		return esc_html__( 'Title', 'flox' );
	}
 
	public function get_icon() {
		return 'eicon-type-tool';
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
					'label' => esc_html__('Choose Style', 'flox'),
					'default' => 'section_title',
					'options' => [
						'section_title' => esc_html__('Section title', 'flox'),
						'content_title' => esc_html__('Content title', 'flox'),
						'sub_title' => esc_html__('Sub title', 'flox'),
						'normal_title' => esc_html__('Normal title', 'flox'),
					],
				]
			);
	
			$this->add_control(
				'title_text', [
					'label'			 => esc_html__( 'Text content', 'flox' ),
					'type'			 => Controls_Manager::TEXTAREA,
					'label_block'	 => true,
					'placeholder'	 => esc_html__( 'Title text', 'flox' ),
					'default'		 => 'Text content',
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
				'size', [
					'type' => Controls_Manager::SELECT,
					'label' => esc_html__('Size', 'flox'),
					'default' => 'medium',
					'options' => [
						'xxlarge' => esc_html__('XX-Large', 'flox'),
						'xlarge' => esc_html__('X-Large', 'flox'),
						'large' => esc_html__('Large', 'flox'),
						'medium' => esc_html__('Medium', 'flox'),
						'small' => esc_html__('small', 'flox'),
						'mini' => esc_html__('mini', 'flox'),
						'tiny' => esc_html__('tiny', 'flox'),
					],
					'condition' => [
						'style!' => 'normal_title'
					],
				]
			);
			$this->add_control(
				'tag', [
					'type' => Controls_Manager::SELECT,
					'label' => esc_html__('Tag', 'flox'),
					'default' => 'h2',
					'options' => [
						'h1' => esc_html__('H1', 'flox'),
						'h2' => esc_html__('H2', 'flox'),
						'h3' => esc_html__('H3', 'flox'),
						'h4' => esc_html__('H4', 'flox'),
						'h5' => esc_html__('H5', 'flox'),
						'h6' => esc_html__('H6', 'flox'),
					],
					'condition' => [
						'style' => 'normal_title',
					],
				]
			);

			$this->add_control(
				'title_color', [
					'label'		 =>esc_html__( 'Color', 'flox' ),
					'type'		 => Controls_Manager::COLOR,
					'selectors'	 => [
						'{{WRAPPER}} .content-title, {{WRAPPER}} .section-title, {{WRAPPER}} .sub-title, {{WRAPPER}} h1, {{WRAPPER}} h2, {{WRAPPER}} h3, {{WRAPPER}} h4, {{WRAPPER}} h5, {{WRAPPER}} h6' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'fsize', [
					'label' => esc_html__( 'Font size', 'flox' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 14,
							'max' => 120,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 20,
					],
					'selectors' => [
						'{{WRAPPER}} h1, {{WRAPPER}} h2, {{WRAPPER}} h3, {{WRAPPER}} h4, {{WRAPPER}} h5, {{WRAPPER}} h6' => 'font-size: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'style' => 'normal_title',
					],
				]
			);
	

			$this->add_control(
				'upper', [
					'type' => Controls_Manager::SWITCHER,
					'label' => esc_html__('Text uppercase?', 'flox'),
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
						'left' => [
							'title' => esc_html__( 'Left', 'flox' ),
							'icon' => 'fa fa-align-left',
						],
						'center' => [
							'title' => esc_html__( 'Center', 'flox' ),
							'icon' => 'fa fa-align-center',
						],
						'right' => [
							'title' => esc_html__( 'Right', 'flox' ),
							'icon' => 'fa fa-align-right',
						],
					],
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .content-title, {{WRAPPER}} .section-title, {{WRAPPER}} .sub-title, {{WRAPPER}} h1, {{WRAPPER}} h2, {{WRAPPER}} h3, {{WRAPPER}} h4, {{WRAPPER}} h5, {{WRAPPER}} h6' => 'text-align: {{VALUE}};',
					],
					/* 'condition' => [
						'style!' => 'section_title',
					], */
				]
			);

			$this->add_responsive_control(
				'mr-b',
				[
					'label' => esc_html__( 'Margin bottom', 'flox' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 200,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .content-title, {{WRAPPER}} .section-title, {{WRAPPER}} .sub-title, {{WRAPPER}} h1, {{WRAPPER}} h2, {{WRAPPER}} h3, {{WRAPPER}} h4, {{WRAPPER}} h5, {{WRAPPER}} h6' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

	}

	protected function render() {
		
		$settings = $this->get_settings_for_display();
		
		require THEME_ELE . '/templates/title/'. $settings['style'] .'.php';
	}

	protected function _content_template() { }
}
