<?php
namespace DF_CUSTOM_LIST;

use Pimple\Container as PimpleContainer;
/**
 * DI Container.
 */
class Container extends PimpleContainer
{
    public static $instance;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->initObjects();
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new Container;
        }

        return self::$instance;
    }

    /**
     * Define dependancies.
     */
    public function initObjects()
    {
        $this['activation'] = function ($container) {
            return new Activation($container);
        };

        $this['divi_modules'] = function ($container) {
            return new DiviModules($container);
        };

        $this['themes'] = function ($container) {
            return new Themes($container);
        };

    }

    /**
     * Start the plugin
     */
    public function run()
    {
        // divi module register.
        add_action('et_builder_ready', array($this['divi_modules'], 'register'), 1);

        add_action('plugins_loaded', array($this['themes'], 'checkDependancies'));

        add_action('admin_head', array($this['divi_modules'], 'flushLocalStorage'));
    }

}
