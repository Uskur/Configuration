<?php

App::uses('AppModel', 'Model');

/**
 * Configuration Model
 *
 */
class Configuration extends AppModel
{

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'name';
    public $order = 'Configuration.category ASC, Configuration.name ASC';
    public $categories = array('Store', 'Paypal', 'Payu', 'Iyzico');
    public $types = array('text', 'select', 'boolean', 'number', 'array');
    public $virtualFields = array('full_name' => "CONCAT(category,'.',name)");

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'name' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'allowEmpty' => false,
            ),
            'unique' => array(
                'rule' => array('isUnique'),
                'on' => 'create',
            ),
        ),
    );

    public function install()
    {
        $defaults[$this->alias] = array();

        $defaults[$this->alias][] = array(
            'category' => 'Store',
            'name' => 'name',
            'type' => 'text',
            'editable' => true,
            'description' => 'Name of the store',
            'default_value' => 'Beşrenk',
            'value' => 'Beşrenk',
            'options' => null
        );
        $defaults[$this->alias][] = array(
            'category' => 'Store',
            'name' => 'email',
            'type' => 'text',
            'editable' => true,
            'description' => 'Out going email',
            'default_value' => 'dukkan@uskur.com.tr',
            'value' => 'dukkan@uskur.com.tr',
            'options' => null
        );
        $defaults[$this->alias][] = array(
            'category' => 'Store',
            'name' => 'password_token_expiration',
            'type' => 'number',
            'editable' => true,
            'description' => 'Token expiration time for passwords.',
            'default_value' => '12',
            'value' => '12',
            'options' => null
        );
        $defaults[$this->alias][] = array(
            'category' => 'Store',
            'name' => 'check_out_currency',
            'type' => 'text',
            'editable' => true,
            'description' => 'Store\'s default check out currency.',
            'default_value' => 'TL',
            'value' => 'TL',
            'options' => null
        );
        $defaults[$this->alias][] = array(
            'category' => 'Store',
            'name' => 'language',
            'type' => 'text',
            'editable' => true,
            'description' => 'Store\'s default language.',
            'default_value' => 'tur',
            'value' => 'tur',
            'options' => null
        );
        $defaults[$this->alias][] = array(
            'category' => 'Store',
            'name' => 'order_information_email',
            'type' => 'text',
            'editable' => true,
            'description' => 'Order information email',
            'default_value' => 'siparis_bilgilendirme@uskur.com.tr',
            'value' => 'siparis_bilgilendirme@uskur.com.tr',
            'options' => null
        );
        $defaults[$this->alias][] = array(
            'category' => 'Store',
            'name' => 'theme',
            'type' => 'text',
            'editable' => true,
            'description' => 'Theme of store',
            'default_value' => 'Purupa',
            'value' => 'Purupa',
            'options' => null
        );
        $defaults[$this->alias][] = array(
            'category' => 'ProductFile',
            'name' => 'directory',
            'type' => 'text',
            'editable' => true,
            'description' => 'Directory of files',
            'default_value' => '/media/sf_www/files/dukkan',
            'value' => '/media/sf_www/files/dukkan',
            'options' => null
        );
        $defaults[$this->alias][] = array(
            'category' => 'ProductFile',
            'name' => 'max_size',
            'type' => 'number',
            'editable' => true,
            'description' => 'Maximum file size in bytes (10*1024*1024=10485760)',
            'default_value' => '10485760',
            'value' => '10485760',
            'options' => null
        );
        $defaults[$this->alias][] = array(
            'category' => 'Order',
            'name' => 'cargo_price',
            'type' => 'boolean',
            'editable' => true,
            'description' => 'Use cargo price?',
            'default_value' => '0',
            'value' => '0',
            'options' => null
        );
        $defaults[$this->alias][] = array(
            'category' => 'Paypal',
            'name' => 'client_id',
            'type' => 'text',
            'editable' => true,
            'description' => 'Paypal client id',
            'default_value' => '',
            'value' => '',
            'options' => null
        );
        $defaults[$this->alias][] = array(
            'category' => 'Paypal',
            'name' => 'secret',
            'type' => 'text',
            'editable' => true,
            'description' => 'Paypal secret',
            'default_value' => '',
            'value' => '',
            'options' => null
        );
        $defaults[$this->alias][] = array(
            'category' => 'Payu',
            'name' => 'vendor_code',
            'type' => 'text',
            'editable' => true,
            'description' => 'Payu vendor code',
            'default_value' => 'OPU_TEST',
            'value' => 'OPU_TEST',
            'options' => null
        );
        $defaults[$this->alias][] = array(
            'category' => 'Payu',
            'name' => 'key_coding',
            'type' => 'text',
            'editable' => true,
            'description' => 'Payu key coding',
            'default_value' => 'SECRET_KEY',
            'value' => 'SECRET_KEY',
            'options' => null
        );
        $defaults[$this->alias][] = array(
            'category' => 'Payu',
            'name' => 'pos_id',
            'type' => 'text',
            'editable' => true,
            'description' => 'Payu pos id',
            'default_value' => '',
            'value' => '',
            'options' => null
        );
        $defaults[$this->alias][] = array(
            'category' => 'Payu',
            'name' => 'signature_key',
            'type' => 'text',
            'editable' => true,
            'description' => 'Payu signature key',
            'default_value' => '',
            'value' => '',
            'options' => null
        );
        $defaults[$this->alias][] = array(
            'category' => 'Payu',
            'name' => 'payu_check_out_currency',
            'type' => 'text',
            'editable' => true,
            'description' => 'Store\'s default check out currency for Payu.',
            'default_value' => 'TRL',
            'value' => 'TRL',
            'options' => null
        );
        $defaults[$this->alias][] = array(
            'category' => 'Iyzico',
            'name' => 'api_id',
            'type' => 'text',
            'editable' => true,
            'description' => 'Iyzico api id',
            'default_value' => '',
            'value' => '',
            'options' => null
        );
        $defaults[$this->alias][] = array(
            'category' => 'Iyzico',
            'name' => 'secret_key',
            'type' => 'text',
            'editable' => true,
            'description' => 'Iyzico api id',
            'default_value' => '',
            'value' => '',
            'options' => null
        );
        $defaults[$this->alias][] = array(
            'category' => 'Iyzico',
            'name' => 'iyzico_check_out_currency',
            'type' => 'text',
            'editable' => true,
            'description' => 'Store\'s default check out currency dor Iyzico.',
            'default_value' => 'TRY',
            'value' => 'TRY',
            'options' => null
        );
        foreach ($defaults[$this->alias] as $default) {
            $found = null;
            $found = $this->find('first', array(
                'conditions' => array(
                    'Configuration.name' => $default['name'],
                    'Configuration.type' => $default['type']
                )
            ));
            if (!$found) {
                $this->create();
                $save[$this->alias] = $default;
                $this->save($save);
            }
        }

        //check for local defaults
        if (isset($defaults['Local'][Configure::read('PanelSite.id')])) {
            foreach ($defaults['Local'][Configure::read('PanelSite.id')] as $default) {
                $found = null;
                $found = $this->find('first', array('conditions' => array(
                        'Configuration.category' => $default['category'],
                        'Configuration.name' => $default['name'],
                )));
                if (!$found) {
                    $save[$this->alias] = $default;
                    $save[$this->alias]['value'] = $default['default_value'];
                } else {
                    $save[$this->alias] = $default;
                    if (!empty($found[$this->alias]['value']) || is_numeric($found[$this->alias]['value']))
                        $save[$this->alias]['value'] = $found[$this->alias]['value'];
                    else
                        $save[$this->alias]['value'] = $default['default_value'];
                    $save[$this->alias]['id'] = $found[$this->alias]['id'];
                }
                $this->create();
                $this->save($save);
            }
        }
    }

    public function get($name)
    {
        $configuration = $this->find('first', array(
            'conditions' => array(
                'Configuration.name' => $name
            )
        ));
        if (!empty($configuration))
            return $configuration[$this->alias]['value'];
        return false;
    }

    public function getAll()
    {
        return $this->find('list', array('fields' => array('full_name', 'value')));
    }

    public function afterSave($created, $options = array())
    {
        $this->init();
    }

    public function update($name, $value)
    {
        list($category, $name) = explode('.', $name);
        $field = $this->find('first', array(
            'conditions' => array(
                'Configuration.name' => $name,
                'Configuration.category' => $category
            )
        ));
        $field[$this->alias]['value'] = $value;
        return $this->save($field);
    }

    public function init($deleteExisting = true)
    {
        if ($deleteExisting) {
            //delete existing config
            $files = glob(APP . 'Config/configs/*');
            foreach ($files as $file) {
                if (is_file($file))
                    unlink($file); // delete file
            }
        }

        $configurations = $this->find('all');
        if (empty($configurations)) {
            $this->install();
            $configurations = $this->find('all');
        }
        foreach ($configurations as $configuration) {
            if ($configuration[$this->alias]['type'] == 'array') {
                $configuration[$this->alias]['value'] = json_decode($configuration[$this->alias]['value'], true);
            }
            Configure::write($configuration[$this->alias]['full_name'], $configuration[$this->alias]['value']);
        }
        Configure::dump(Configure::read('Config.file'));
    }

}
