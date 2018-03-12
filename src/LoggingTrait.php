<?php
namespace Aloo\WordPress;

trait LoggingTrait
{
    private $logger;

    public function setLogger(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function getLogger()
    {
        if (is_null($this->logger)) {
            $className = \get_class($this);
            $this->logger = new Logger($className);
            $this->logger->notice("Undefined logger, initialising new Logger", ["name" => $className]);
        }
        
        return $this->logger;
    }
}
