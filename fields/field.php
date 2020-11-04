<?php

if ( !defined( 'ABSPATH' ) ) exit;

if ( !class_exists( 'MyTestConditionalField' ) ) :

    class MyTestConditionalField extends acf_field {

        protected $settings;

        function __construct( $settings ) {

            $this->name     = 'my-test-conditional';
            $this->label    = __( 'Test Conditional', 'test' );
            $this->category = 'test';
            $this->settings = $settings;

            parent::__construct();

        }

        function render_field( $field ) {

            acf_render_field_wrap( [

                'type'                              => 'group',
                'name'                              => $field['name'],
                'value'                             => $field['value'],
                'label'                             => __( 'Group', 'acf' ),

                'sub_fields'                        => [

                    [

                        'label'                     => 'Select',
                        'name'                      => 'select',
                        'key'                       => 'select',
                        'type'                      => 'select',

                        'choices'                   => [

                            0                       => 'Simple',
                            1                       => 'Advanced'

                        ]

                    ],

                    [

                        'label'                     => 'Static',
                        'name'                      => 'static',
                        'key'                       => 'static',
                        'type'                      => 'button_group',

                        'choices'                   => [

                            'l'                     => __( 'Left' ),
                            'c'                     => __( 'Center' ),
                            'r'                     => __( 'Right' )

                        ],

                        'conditional_logic'         => [

                            [

                                [

                                    'field'         => 'select',
                                    'operator'      => '==',
                                    'value'         => '0'

                                ],

                            ],

                        ],

                    ],

                    [

                        'label'                     => 'Breakpoints',
                        'name'                      => 'breakpoints',
                        'key'                       => 'breakpoints',
                        'type'                      => 'group',

                        'conditional_logic'         => [

                            [

                                [

                                    'field'         => 'select',
                                    'operator'      => '==',
                                    'value'         => '1'

                                ],

                            ],

                        ],

                        'sub_fields' => array_map( function( $slug ) {

                            return [

                                'label'             => 'Align ' . $slug,
                                'name'              => $slug,
                                'key'               => $slug,
                                'type'              => 'button_group',

                                'choices'           => [

                                    'l'             => __( 'Left' ),
                                    'c'             => __( 'Center' ),
                                    'r'             => __( 'Right' )

                                ],

                            ];

                        }, [

                            'xs',
                            'sm',
                            'md',
                            'lg'

                        ] ),

                    ],

                ],

            ] );

        }

    }

    new MyTestConditionalField( $this->settings );

endif;

