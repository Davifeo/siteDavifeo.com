<?php

namespace Elementor;

if ( !defined( 'ABSPATH' ) )
	exit;

class CKav_Pricing extends Widget_Base {

	public function get_name() { 
		return 'ckav-pricing';
	}

	public function get_title() {
		return esc_html__( 'Pricing', 'flox' );
	}
 
	public function get_icon() {
		return 'eicon-price-table';
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
                'columns', [
                    'type' => Controls_Manager::SELECT,
                    'label' => esc_html__('Number of columns', 'flox'),
                    'default' => '3',
                    'options' => [
                        '1' => esc_html__('1', 'flox'),
                        '2' => esc_html__('2', 'flox'),
                        '3' => esc_html__('3', 'flox'),
                        '4' => esc_html__('4', 'flox'),
                    ],
                ]
            );
			
            $this->add_control(
                'price_packs',
                [
                    'label' => '',
                    'type' => Controls_Manager::REPEATER,
                    'default' => [
                        [
                            'title' => esc_html__( 'Price packs', 'flox' ),
                        ],
                    ],
                    'fields' => [
                        [
                            'name' => 'title',
                            'type' => Controls_Manager::TEXT,
                            'label' => esc_html__('Title', 'flox'),
                            'default'   =>  esc_html__('Basic','flox'),
                            'label_block' => true,
                        ],
                        [
                            'name' => 'icon_status',
                            'type' => Controls_Manager::SWITCHER,
                            'label' => esc_html__('Use font icon?', 'flox'),
                            'label_block' => false,
                            'default' => 'yes',
                            'yes' => esc_html__( 'Yes', 'flox' ),
                            'no' => esc_html__( 'No', 'flox' ), 
                        ],
                        [
                            'name' => 'icon',
                            'label' => esc_html__( 'Icon', 'flox' ),
                            'type' => Controls_Manager::ICONS,
                            'default' => [
                                'value' => 'pe-7s-rocket',
                                'library' => 'pixeden-icons'
                            ],
                            'condition' => [
                                'icon_status' => 'yes',
                            ],
                        ],
                        [
                            'name' => 'icon_image',
                            'type' => Controls_Manager::MEDIA,
                            'label' => esc_html__('Icon image', 'flox'),
                            'label_block' => true,
                            'condition' => [
                                'icon_status' => '',
                            ],
                        ],
                        [
                            'name' => 'price_content',
                            'type' => Controls_Manager::TEXTAREA,
                            'label' => esc_html__('Price Content', 'flox'),
                            'default' => esc_html__("Web Development\nAdvertising\nApp Development\nMusic\nWriting\nPhotography", 'flox'),
                            'label_block' => true,
                        ],
                        [
                            'name' => 'price_val',
                            'type' => Controls_Manager::TEXT,
                            'label' => esc_html__('Price value', 'flox'),
                            'default'   =>  esc_html__('$30','flox'),
                            'label_block' => false,
                        ],
                        [
                            'name' => 'plan_duration',
                            'type' => Controls_Manager::TEXT,
                            'label' => esc_html__('Duration text', 'flox'),
                            'default'   => esc_html__('/ Hour', 'flox'),
                            'label_block' => false,
                        ],
                        [
                            'name' => 'btn_text',
                            'type' => Controls_Manager::TEXT,
                            'label' => esc_html__('Button Text', 'flox'),
                            'default'   => esc_html__('Get started', 'flox'),
                            'label_block' => false,
                        ],
                        [
                            'name'          => 'btn_url',
                            'type'          => Controls_Manager::URL,
                            'label'         => esc_html__('Button URL', 'flox'),
                            'placeholder'   => esc_url('http://example.com'),
                            'label_block'   => true,
                        ],
                        [
                            'name' => 'featured',
                            'type' => Controls_Manager::SWITCHER,
                            'label' => esc_html__('Make it featured?', 'flox'),
                            'label_block' => false,
                            'default' => 'no',
                            'yes' => esc_html__( 'Yes', 'flox' ),
                            'no' => esc_html__( 'No', 'flox' ), 
                        ],
                        [
                            'name' => 'label_text',
                            'type' => Controls_Manager::TEXT,
                            'label' => esc_html__('Label Text', 'flox'),
                            'default'   => esc_html__('Popular', 'flox'),
                            'label_block' => false,
                            'condition' => [
                                'featured' => 'yes',
                            ],
                        ],
                        [
                            'name' => 'btn_color',
                            'type' => Controls_Manager::SELECT,
                            'label' => esc_html__('Button color', 'flox'),
                            'default' => 'primary-btn',
                            'options' => [
                                'default-btn' => esc_html__('Default', 'flox'),
                                'primary-btn' => esc_html__('Primary', 'flox'),
                                'dark-btn' => esc_html__('Dark', 'flox'),
                                'white-btn' => esc_html__('White', 'flox'),
                            ],
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
				'icon_color', [
					'label'		 =>esc_html__( 'Normal - icon', 'flox' ),
					'type'		 => Controls_Manager::COLOR,
					'selectors'	 => [
						'{{WRAPPER}} .iconbox' => 'color: {{VALUE}};',
                    ],
                    'separator' => 'before',
				]
            );
            $this->add_control(
				'normal_bg', [
					'label'		 =>esc_html__( 'Normal - background', 'flox' ),
					'type'		 => Controls_Manager::COLOR,
					'selectors'	 => [
						'{{WRAPPER}} .price-pack:not(.popular)' => 'background-color: {{VALUE}};',
					],
				]
            );
            $this->add_control(
				'popular_icon_color', [
					'label'		 =>esc_html__( 'Popular - Icon', 'flox' ),
					'type'		 => Controls_Manager::COLOR,
					'selectors'	 => [
						'{{WRAPPER}} .popular .iconbox' => 'color: {{VALUE}};',
                    ],
                    'separator' => 'before',
				]
            );
            $this->add_control(
				'popular_bg', [
					'label'		 =>esc_html__( 'Popular - background', 'flox' ),
					'type'		 => Controls_Manager::COLOR,
					'selectors'	 => [
						'{{WRAPPER}} .price-pack.popular' => 'background-color: {{VALUE}};',
                    ],
                    
				]
            );
            
            $this->add_control(
				'poptag_color', [
					'label'		 =>esc_html__( 'Popular tag color', 'flox' ),
                    'type'		 => Controls_Manager::COLOR,
                    'selectors'	 => [
                        '{{WRAPPER}} .pop-label' => 'background-color: {{VALUE}};',
                        '{{WRAPPER}} .pop-label::after' => 'border-top-color: {{VALUE}};',
                    ],
                    'separator' => 'before',
				]
            );
            $this->add_control(
				'poptagtxt_color', [
					'label'		 =>esc_html__( 'Popular tag text', 'flox' ),
					'type'		 => Controls_Manager::COLOR,
					'selectors'	 => [
                        '{{WRAPPER}} .pop-label' => 'color: {{VALUE}};',
					],
				]
			);

            
		$this->end_controls_section();

	}

	protected function render() {
		
		$settings = $this->get_settings_for_display();
		
		require THEME_ELE . '/templates/pricing/style1.php';
	}

	protected function _content_template() { }
}
