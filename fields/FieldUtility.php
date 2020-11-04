<?php

if ( !defined( 'ABSPATH' ) ) exit;

class FieldUtility {

    const FIELD_PREFIX          = 'field_';

    const FIELD_NAME_SELECT     = 'select';
    const FIELD_NAME_AUTO       = 'auto';
    const FIELD_NAME_BASE       = 'base';

    protected $field;

    public function __construct( array $field ) {

        $this->field = wp_parse_args( $field, [

            'name'  => '',
            'value' => '',

        ] );

    }

    public function get() : array {

        return array_merge( $this->getParent(), $this->getSubFields() );

    }

    public function getParent() {

        return [

            'type'              => 'group',
            'name'              => $this->field['name'],
            'value'             => $this->field['value'],
            'layout'		    => 'block',
            'label'             => __('Gruppo','acf'),
            'instructions'      => __('Instructionssda sda adssda a dsad ','acf'),

        ];

    }

    public function getSubFields() {

        return [

            'sub_fields'     => [

                $this->getSelect(),
                $this->getBreakpoints(),

            ]

        ];

    }

    protected function getSelect() {

        return [

            'key'           => self::FIELD_PREFIX . self::FIELD_NAME_SELECT,
            'name'          => self::FIELD_NAME_SELECT,
            'label'         => 'Testo',
            'type'          => 'text',
            'instructions'  => '',
            'required'      => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'hide_label' => 0,
            'hide_field' => 0,
            'default_value' => 'b',
            'placeholder' => '',
            'prepend' => 'aaaaa',
            'append' => '',
            'maxlength' => '',

        ];

    }
}
