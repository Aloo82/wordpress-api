<?php
namespace Aloo\WordPress;

interface LoggingTraitInterface
{
    /**
     * Set class logger
     *
     * @param Logger $logger
     * @return void
     */
    public function setLogger(Logger $logger);
    /**
     * Get class logger
     *
     * @return void
     */
    public function getLogger();
}
