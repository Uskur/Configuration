# Configuration
CakePHP Configuration Plugin for CakePHP 2.x

## Create Schema
```console
.../Console/cake schema create -p Configuration
```

## Usage

1. Create 'configs' folder in App/Config
2. Change default installation values in install method App/Plugin/Configuration/Model/Configuration.php
3. Add following lines to bootstrap
  ```php
  // Load domain-specific config
  if (! isset($_SERVER['SERVER_NAME']) ) { //for cli
  	$_SERVER['SERVER_NAME'] = $_SERVER['argv'][count($_SERVER['argv'])-1];
  	if($_SERVER['SERVER_NAME']=='bake') $_SERVER['SERVER_NAME']='localhost';
  	unset($_SERVER['argv'][count($_SERVER['argv'])-1]);
  	
  }
  
  Configure::write('Config.file',"configs/".str_replace('.', '_', $_SERVER['SERVER_NAME']));
  try {
  	Configure::load(Configure::read('Config.file'));	
  } catch (Exception $e) {
          App::uses('Configuration', 'Configuration.Model');
  	$Configuration = new Configuration();
  	$Configuration->init(false);
  	Configure::load(Configure::read('Config.file'));
  }
  ```
4. Get values Configure::read('MyCategory.my_field');

## Unit Tests

Simply go to http://localhost/your_app/test.php
