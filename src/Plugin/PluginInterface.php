<?php
namespace Aloo\WordPress\Plugin;

interface PluginInterface
{
    public function directory($directory = null);
    public function url($url = null);
    public function version();
    public function start();
}
