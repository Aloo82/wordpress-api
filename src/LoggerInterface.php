<?php
namespace Aloo\WordPress;

interface LoggerInterface
{
    /**
     * Adds a log record at an arbitrary level.
     *
     * This method allows for compatibility with common interfaces.
     *
     * @param mixed  $level   The log level
     * @param string $message The log message
     * @param array  $context The log context
     */
    public function log($level, $message, array $context = []);
    /**
     * Adds a log record at the DEBUG level.
     *
     * This method allows for compatibility with common interfaces.
     *
     * @param string $message The log message
     * @param array  $context The log context
     */
    public function debug($message, array $context = []);
    /**
     * Adds a log record at the INFO level.
     *
     * This method allows for compatibility with common interfaces.
     *
     * @param string $message The log message
     * @param array  $context The log context
     */
    public function info($message, array $context = []);
    /**
     * Adds a log record at the NOTICE level.
     *
     * This method allows for compatibility with common interfaces.
     *
     * @param string $message The log message
     * @param array  $context The log context
     */
    public function notice($message, array $context = []);
    /**
     * Adds a log record at the WARNING level.
     *
     * This method allows for compatibility with common interfaces.
     *
     * @param string $message The log message
     * @param array  $context The log context
     */
    public function warning($message, array $context = []);
    /**
     * Adds a log record at the ERROR level.
     *
     * This method allows for compatibility with common interfaces.
     *
     * @param string $message The log message
     * @param array  $context The log context
     */
    public function error($message, array $context = []);
    /**
     * Adds a log record at the CRITICAL level.
     *
     * This method allows for compatibility with common interfaces.
     *
     * @param string $message The log message
     * @param array  $context The log context
     */
    public function critical($message, array $context = []);
    /**
     * Adds a log record at the ALERT level.
     *
     * This method allows for compatibility with common interfaces.
     *
     * @param string $message The log message
     * @param array  $context The log context
     */
    public function alert($message, array $context = []);
    /**
     * Adds a log record at the EMERGENCY level.
     *
     * This method allows for compatibility with common interfaces.
     *
     * @param string $message The log message
     * @param array  $context The log context
     */
    public function emergency($message, array $context = []);
}
