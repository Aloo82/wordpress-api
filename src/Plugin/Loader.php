<?php
namespace Aloo\WordPress\Plugin;

use \Aloo\WordPress;
use \Aloo\WordPress\API;

class Loader implements WordPress\LoggingTraitInterface
{
    use WordPress\LoggingTrait {
        setLogger as protected traitLogger;
    }
    
    private $activator;
    private $plugin;
    private $plugin_file;
    private $plugin_directory;
    private $plugin_url;
    
    public $link_api;
    public $plugin_api;

    public function __construct($file_path, PluginInterface $plugin, ActivatorInterface $activator = null)
    {
        $this->plugin_file = $file_path;
        $this->plugin = $plugin;
        $this->activator = $activator;
        $this->link_api = new API\Link();
        $this->plugin_api = new API\Plugin();
    }

    public function setLogger(WordPress\Logger $logger)
    {
        $this->traitLogger($logger);
        if ($this->plugin_api instanceof WordPress\LoggingTraitInterface) {
            $this->plugin_api->setLogger($logger);
        }
    }

    public function load()
    {
        /*
        * Register activation & deactivation hooks
        */
        if ($this->activator instanceof ActivatorInterface) {
            $this->plugin_api->register_activation_hook(
                $this->plugin_file,
                [$this->activator, ActivatorInterface::METHOD_ACTIVATE]
            );
            $this->plugin_api->register_deactivation_hook(
                $this->plugin_file,
                [$this->activator, ActivatorInterface::METHOD_DEACTIVATE]
            );
        }
        /*
        * Configure plugin
        */
        $this->plugin->directory($this->getPluginDirectory());
        $this->plugin->url($this->getPluginUrl());
        /*
        * Run plugin
        */
        $this->plugin->start();
    }

    private function getPluginDirectory()
    {
        return \dirname($this->plugin_file);
    }

    private function getPluginUrl()
    {
        return $this->link_api->plugins_url($this->getPluginDirectory());
    }
}
