<?php
defined('_EXEC') or die;

class Controller
{
    public $view;
    public $system;
    public $model;
    public $security;
	public $format;
	public $module;
	public $component;

    public function __construct()
	{
        $this->view      = new View();
        $this->security  = new Security();
		$this->format  	 = new Format();
		$this->module 	 = new Modules();
		$this->component = new Components();

        if($this->format->adminPath() === true)
            $this->system = new System();

        $this->loadModel();
	}

    public function loadModel ( $class = false, $type = false, $file = false )
	{
        $class = ( $class === false ) ? $this : $class;

		$model = str_replace(CONTROLLER_PHP, '', get_class($class)) . MODEL_PHP;

        $paths['components'] = $this->format->checkAdmin(PATH_ADMINISTRATOR_COMPONENTS, PATH_COMPONENTS);
        $paths['modules'] = $this->format->checkAdmin(PATH_ADMINISTRATOR_MODULES, PATH_MODULES);
        $paths['models'] = $this->format->checkAdmin(PATH_ADMINISTRATOR_MODELS, PATH_MODELS);

        switch ( $type )
        {
            case 'component':
                $path = $paths['components'] . 'com_' . $file . '/models/' . $model . '.php';
                break;

            case 'module':
                $path = $paths['modules'] . 'mod_' . $file . '/models/' . $model . '.php';
                break;

            default:
                $path = $paths['models'] . $model . '.php';
                break;
        }

        $path = $this->security->directorySeparator($path);

		if ( file_exists($path) )
		{
			require_once $path;
			$this->model = new $model();
		}
        else
        {
            if ( Configuration::$debug === true && $type === 'component' || $type === 'module' )
                Errors::system('model_does_exists', $path);
        }
	}
}
