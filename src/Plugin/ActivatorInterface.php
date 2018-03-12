<?php
namespace Aloo\WordPress\Plugin;

interface ActivatorInterface
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
