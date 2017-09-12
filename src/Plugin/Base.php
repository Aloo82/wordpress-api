<?php
namespace Aloo\WordPress\Core\Plugin;

abstract class Base implements iPlugin
{
    const VERSION = '0.0.0';
    /**
     * Plugin directory
     *
     * @var string
     */
    private $_directory;
    /**
     * Plugin URL
     *
     * @var string
     */
    private $_url;
    /**
     * Get plugin version
     *
     * @return string
     */
    public function version()
    {
        return $this::VERSION;
    }
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
            $this->directory = $directory;
        }
        return $this->directory;
    }
    /**
     * Get/Set URL
     *
     * @param string $url
     * @return void
     */
    public function url($url = null)
    {
        if (!\is_null($url)) {
            /*
            * Set URL
            */
            $this->url = $url;
        }
        return $this->url;
    }
}