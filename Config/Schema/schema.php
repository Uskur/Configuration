<?php

class ConfigurationSchema extends CakeSchema
{

    public $configurations = array(
        'id' => array(
            'type' => 'integer',
            'null' => false,
            'default' => null,
            'length' => 11,
            'key' => 'primary'
        ),
        'category' => array(
            'type' => 'string',
            'null' => true,
            'default' => null,
            'length' => 15,
            'collate' => 'utf8_general_ci',
            'charset' => 'utf8'
        ),
        'name' => array(
            'type' => 'string',
            'null' => true,
            'default' => null,
            'length' => 45,
            'collate' => 'utf8_general_ci',
            'charset' => 'utf8'
        ),
        'value' => array(
            'type' => 'text',
            'null' => true,
            'default' => null,
            'collate' => 'utf8_general_ci',
            'charset' => 'utf8'
        ),
        'editable' => array(
            'type' => 'boolean',
            'null' => false,
            'default' => '0'
        ),
        'type' => array(
            'type' => 'string',
            'null' => true,
            'default' => null,
            'length' => 45,
            'collate' => 'utf8_general_ci',
            'charset' => 'utf8'
        ),
        'description' => array(
            'type' => 'string',
            'null' => true,
            'default' => null,
            'length' => 250,
            'collate' => 'utf8_general_ci',
            'charset' => 'utf8'
        ),
        'options' => array(
            'type' => 'text',
            'null' => true,
            'default' => null,
            'collate' => 'utf8_general_ci',
            'charset' => 'utf8'
        ),
        'default_value' => array(
            'type' => 'text',
            'null' => true,
            'default' => null,
            'collate' => 'utf8_general_ci',
            'charset' => 'utf8'
        ),
        'indexes' => array(
            'PRIMARY' => array('column' => 'id', 'unique' => 1),
            'name_UNIQUE' => array('column' => 'name', 'unique' => 1)
        ),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
    );

}
