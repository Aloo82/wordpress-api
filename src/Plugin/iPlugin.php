<?php
namespace Aloo\WordPress\Core\Plugin;

interface iPlugin
{
    public function directory($directory = null);
    public function url($url = null);
    public function version();
    public function run();
}
