<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
	exit;

class CKav_Experience extends Widget_Base {

	public function get_name() { 
		return 'ckav-experience';
	}

	public function get_title() {
		return esc_html__( 'Experience', 'flox' );
	}
 
	public function get_icon() {
		return 'eicon-bullet-list';
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
                'exp_list',
                [
                    'label' => '',
                    'type' => Controls_Manager::REPEATER,
                    'default' => [
                        [
                            'title' => esc_html__( 'Experience list', 'flox' ),
                        ],
                    ],
                    'fields' => [
                        [
                            'name' => 'year',
                            'type' => Controls_Manager::TEXT,
                            'label' => esc_html__('Year', 'flox'),
                            'default'   =>  esc_html__('2011 2019', 'flox'),
                            'label_block' => true,
                        ],
                        [
                            'name' => 'title',
                            'type' => Controls_Manager::TEXT,
                            'label' => esc_html__('Title', 'flox'),
                            'default'   =>  esc_html__('Art Director','flox'),
                            'label_block' => true,
                        ],
                        [
                            'name' => 'subtitle',
                            'type' => Controls_Manager::TEXT,
                            'label' => esc_html__('Sub title', 'flox'),
                            'default'   =>  esc_html__('Eclipse Systems','flox'),
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
                        [
                            'name' => 'label',
                            'type' => Controls_Manager::TEXT,
                            'label' => esc_html__('Label', 'flox'),
                            'default'   =>  esc_html__('Present','flox'),
                            'label_block' => true,
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
				'present_color', [
					'label'		 =>esc_html__( 'Present color', 'flox' ),
					'type'		 => Controls_Manager::COLOR,
					'selectors'	 => [
						'{{WRAPPER}} .exp-list .content-title+p .present' => 'color: {{VALUE}};',
					],
				]
			);
            $this->add_control(
				'dot_color', [
					'label'		 =>esc_html__( 'Point color', 'flox' ),
					'type'		 => Controls_Manager::COLOR,
					'selectors'	 => [
						'{{WRAPPER}} .exp-list .content-title:after' => 'background-color: {{VALUE}};',
					],
				]
			);
			$this->add_control(
				'dotbdr_color', [
					'label'		 =>esc_html__( 'Point border color', 'flox' ),
					'type'		 => Controls_Manager::COLOR,
					'selectors'	 => [
						'{{WRAPPER}} .exp-list .content-title:after' => 'box-shadow: 0 0 0 6px {{VALUE}};',
					],
				]
			);

		$this->end_controls_section();

	}

	protected function render() {
		
		$settings = $this->get_settings_for_display();
		
		require THEME_ELE . '/templates/experience/style1.php';
	}

	protected function _content_template() { }
}
