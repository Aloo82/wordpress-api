<?php
namespace Aloo\WordPress\Core\Plugin;

use \Aloo\WordPress\Core\API;

class Loader 
{
    private $activator;
    private $plugin;
    private $plugin_file;
    private $plugin_directory;
    private $plugin_url;

    public function __construct($file_path, iPlugin $plugin, iActivator $activator = null)
    {
        $this->plugin = $plugin;
        $this->plugin_file = $file_path;
        $this->plugin_directory = \dirname($this->plugin_file);
        $this->activator = $activator;
        /*
        * Determine plugin URL
        */
        $api = new API\Link();
        $this->plugin_url = $api->plugins_url(\basename($this->plugin_directory));
    }

    public function run()
    {
        $api = new API\Plugin();
        /*
        * Register activation & deactivation hooks
        */
        if ($this->activator instanceof iActivator) {
            $api->register_activation_hook($this->plugin_file, [$this->activator, iActivator::METHOD_ACTIVATE]);
            $api->register_deactivation_hook($this->plugin_file, [$this->activator, iActivator::METHOD_DEACTIVATE]);
        }
        /*
        * Configure plugin
        */
        $this->plugin->directory($this->plugin_directory);
        $this->plugin->url($this->plugin_url);
        /*
        * Run plugin
        */
        $this->plugin->run();
    }

    public static function load($file_path, iPlugin $plugin, iActivator $activator)
    {
        $loader = new Loader($file_path, $plugin, $activator);
        $loader->run();
    }
}
