<?php
namespace Aloo\WordPress;

final class API implements LoggingTraitInterface
{
    use LoggingTrait {
        setLogger as setTraitLogger;
    }

    private $linkAPI;
    private $loadAPI;
    private $optionAPI;
    private $pluginAPI;
    private $postAPI;
    private $rewriteAPI;
    private $scriptsAPI;
    private $stylesAPI;

    public function __construct()
    {
        $this->linkAPI = new API\Link();
        $this->loadAPI = new API\Load();
        $this->optionAPI = new API\Option();
        $this->pluginAPI = new API\Plugin();
        $this->postAPI = new API\Post();
        $this->rewriteAPI = new API\Rewrite();
        $this->scriptsAPI = new API\Scripts();
        $this->stylesAPI = new API\Styles();
    }

    /**
     * Set class logger
     *
     * @param Logger $logger
     * @return void
     */
    public function setLogger(Logger $logger)
    {
        $this->setTraitLogger($logger);
        $this->pluginAPI->setLogger($logger);
    }

    /**
     * Get/Set Link API
     *
     * @param API\Link $link
     * @return API\Link
     */
    public function link(API\Link $link = null) : API\Link
    {
        if (!is_null($link)) {
            $this->linkAPI = $link;
        }
        return $this->linkAPI;
    }

    /**
     * Get/Set Load API
     *
     * @param API\Load $load
     * @return API\Load
     */
    public function load(API\Load $load = null) : API\Load
    {
        if (!is_null($load)) {
            $this->loadAPI = $load;
        }
        return $this->loadAPI;
    }

    /**
     * Get/Set Option API
     *
     * @param API\Option $option
     * @return API\Option
     */
    public function option(API\Option $option = null) : API\Option
    {
        if (!is_null($option)) {
            $this->optionAPI = $option;
        }
        return $this->optionAPI;
    }

    /**
     * Get/Set Plugin API
     *
     * @param API\Plugin $plugin
     * @return API\Plugin
     */
    public function plugin(API\Plugin $plugin = null) : API\Plugin
    {
        if (!is_null($plugin)) {
            $this->pluginAPI = $plugin;
        }
        return $this->pluginAPI;
    }

    /**
     * Get/Set Post API
     *
     * @param API\Post $post
     * @return API\Post
     */
    public function post(API\Post $post = null) : API\Post
    {
        if (!is_null($post)) {
            $this->postAPI = $post;
        }
        return $this->postAPI;
    }

    /**
     * Get/Set Rewrite API
     *
     * @param API\Rewrite $rewrite
     * @return API\Rewrite
     */
    public function rewrite(API\Rewrite $rewrite = null) : API\Rewrite
    {
        if (!is_null($rewrite)) {
            $this->rewriteAPI = $rewrite;
        }
        return $this->rewriteAPI;
    }

    /**
     * Get/Set Scripts API
     *
     * @param API\Scripts $scripts
     * @return API\Scripts
     */
    public function scripts(API\Scripts $scripts = null) : API\Scripts
    {
        if (!is_null($scripts)) {
            $this->scriptsAPI = $scripts;
        }
        return $this->scriptsAPI;
    }

    /**
     * Get/Set Styles API
     *
     * @param API\Styles $styles
     * @return API\Styles
     */
    public function styles(API\Styles $styles = null) : API\Styles
    {
        if (!is_null($styles)) {
            $this->stylesAPI = $styles;
        }
        return $this->stylesAPI;
    }
}