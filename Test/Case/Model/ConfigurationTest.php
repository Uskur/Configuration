<?php

App::uses('Configuration', 'Model');

/**
 * CakePHP Configuration
 * @author Ogulcan Tatlı <ogulcan@uskur.com.tr>
 */
class ConfigurationTest extends CakeTestCase
{

    public $fixtures = array('plugin.configuration.configuration');

    public function setUp()
    {
        parent::setUp();
        $this->Configuration = ClassRegistry::init('Configuration.Configuration');
    }

    /**
     * Test for initialize
     */
    public function testInit()
    {
        Configure::write('Config.file', "configs/" . str_replace('.', '_', $_SERVER['SERVER_NAME']));
        $this->Configuration->install();
        //check created config
        $result = false;
        if (Configure::dump(Configure::read('Config.file'))) {
            $result = true;
        }
        $this->assertEquals(true, $result);
    }

    /**
     * Test for install control it by Store name
     */
    public function testInstall()
    {
        $this->Configuration->install();
        $configuration = $this->Configuration->find('first', array(
            'conditions' => array(
                'Configuration.category' => 'Store',
                'Configuration.name' => 'name'
            )
        ));

        $result = false;
        if (!empty($configuration['Configuration'])) {
            $result = true;
        }
        $this->assertEquals(true, $result);
    }

}
