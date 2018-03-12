<?php
namespace Aloo\WordPress\Plugin;

abstract class AbstractBase implements PluginInterface
{
    /**
     * Plugin directory
     *
     * @var string
     */
    private $plugin_directory;
    /**
     * Plugin URL
     *
     * @var string
     */
    private $plugin_url;
    /**
     * Get/Set directory
     *
     * @param string $directory
     * @return string
     */
    public function directory($directory = null)
    {
        if (!\is_null($directory)) {
            /*
            * Set directory
            */
            $this->plugin_directory = $directory;
        }
        return $this->plugin_directory;
    }
    /**
     * Get/Set URL
     *
     * @param string $url
     * @return string
     */
    public function url($url = null)
    {
        if (!\is_null($url)) {
            /*
            * Set URL
            */
            $this->plugin_url = $url;
        }
        return $this->plugin_url;
    }
}
