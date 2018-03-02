<?php
namespace Aloo\WordPress\Core\Plugin;

interface iActivator
{
    const METHOD_ACTIVATE = 'activate';
    const METHOD_DEACTIVATE = 'deactivate';

    /*
    * Activate Plugin
    */
    public function activate();
    /*
    * Deactivate Plugin
    */
    public function deactivate();
}
