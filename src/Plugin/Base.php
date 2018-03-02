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
            $this->_directory = $directory;
        }
        return $this->_directory;
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
            $this->_url = $url;
        }
        return $this->_url;
    }
}
