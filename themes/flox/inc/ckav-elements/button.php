<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
	exit;

class CKav_Button extends Widget_Base {

	public function get_name() { 
		return 'ckav-button';
	}

	public function get_title() {
		return esc_html__( 'Button', 'flox' );
	}
 
	public function get_icon() {
		return 'eicon-button';
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
				'text', [
					'label'			 => esc_html__( 'Button text', 'flox' ),
					'type'			 => Controls_Manager::TEXT,
					'label_block'	 => true,
					'placeholder'	 => esc_html__( 'Button', 'flox' ),
					'default'		 => 'Button',
				]
			);
			$this->add_control(
				'url', [
					'type'          => Controls_Manager::URL,
					'label'         => esc_html__('Button URL', 'flox'),
					'placeholder'   => esc_url('http://example.com'),
					'label_block'   => true,
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
					'default' => '',
					'options' => [
						'large' => esc_html__('Large', 'flox'),
						'' => esc_html__('Default', 'flox'),
						'small' => esc_html__('small', 'flox'),
						'mini' => esc_html__('mini', 'flox'),
						'tiny' => esc_html__('tiny', 'flox'),
					],
				]
			);
			$this->add_control(
				'color', [
					'type' => Controls_Manager::SELECT,
					'label' => esc_html__('Color', 'flox'),
					'default' => 'primary-btn',
					'options' => [
						'default-btn' => esc_html__('Default', 'flox'),
						'primary-btn' => esc_html__('Primary', 'flox'),
						'dark-btn' => esc_html__('Dark', 'flox'),
						'white-btn' => esc_html__('White', 'flox'),
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
				'align',
				[
					'label' => esc_html__( 'Alignment', 'flox' ),
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
						'{{WRAPPER}}' => 'text-align: {{VALUE}};',
					],
				]
			);

		$this->end_controls_section();

	}

	protected function render() {
		
		$settings = $this->get_settings_for_display();
		
		require THEME_ELE . '/templates/button/style1.php';
	}

	protected function _content_template() { }
}
