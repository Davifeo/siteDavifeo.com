<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
	exit;

class CKav_Skills extends Widget_Base {

	public function get_name() { 
		return 'ckav-skills';
	}

	public function get_title() {
		return esc_html__( 'Skills', 'flox' );
	}
 
	public function get_icon() {
		return 'eicon-skill-bar';
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
                'skill_list',
                [
                    'label' => '',
                    'type' => Controls_Manager::REPEATER,
                    'default' => [
                        [
                            'title' => esc_html__( 'Skills', 'flox' ),
                        ],
                    ],
                    'fields' => [
                        [
                            'name' => 'title',
                            'type' => Controls_Manager::TEXT,
                            'label' => esc_html__('Title', 'flox'),
                            'default'   =>  esc_html__('My skill','flox'),
                            'label_block' => true,
                        ],
                        [
                            'name' => 'percent',
                            'label' => esc_html__( 'Percentage', 'flox' ),
                            'type' => Controls_Manager::SLIDER,
                            'default' => [
                                'size' => 50,
                                'unit' => '%',
                            ],
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
				'bar_color', [
					'label'		 =>esc_html__( 'Progress color', 'flox' ),
					'type'		 => Controls_Manager::COLOR,
					'selectors'	 => [
						'{{WRAPPER}} .progress-bar' => 'background-color: {{VALUE}};',
					],
				]
			);

		$this->end_controls_section();
	}

	protected function render() {
		
		$settings = $this->get_settings_for_display();
		
		require THEME_ELE . '/templates/skills/style1.php';
	}

	protected function _content_template() { }
}
