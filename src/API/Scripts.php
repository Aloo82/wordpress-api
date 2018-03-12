<?php
/**
 * Created by PhpStorm.
 * User: Práta
 * Date: 03/09/2017
 * Time: 16:23
 */

namespace Aloo\WordPress\API;

class Scripts
{
    // phpcs:disable
    /**
     * Register a new script.
     *
     * Registers a script to be enqueued later using the wp_enqueue_script() function.
     *
     * @see WP_Dependencies::add()
     * @see WP_Dependencies::add_data()
     *
     * @since 2.1.0
     * @since 4.3.0 A return value was added.
     *
     * @param string $handle Name of the script. Should be unique.
     * @param string $src Full URL of the script, or path of the script relative to the WordPress root directory.
     * @param array $deps Optional. An array of registered script handles this script depends on. Default empty array.
     * @param string|bool|null $ver Optional. String specifying script version number, if it has one, which is added to the URL
     *                                    as a query string for cache busting purposes. If version is set to false, a version
     *                                    number is automatically added equal to current installed WordPress version.
     *                                    If set to null, no version is added.
     * @param bool $in_footer Optional. Whether to enqueue the script before </body> instead of in the <head>.
     *                                    Default 'false'.
     * @return bool Whether the script has been registered. True on success, false on failure.
     */
    function wp_register_script($handle, $src, $deps = array(), $ver = false, $in_footer = false)
    {
        return wp_register_script($handle, $src, $deps, $ver, $in_footer);
    }

    /**
     * Enqueue a script.
     *
     * Registers the script if $src provided (does NOT overwrite), and enqueues it.
     *
     * @see WP_Dependencies::add()
     * @see WP_Dependencies::add_data()
     * @see WP_Dependencies::enqueue()
     *
     * @since 2.1.0
     *
     * @param string $handle Name of the script. Should be unique.
     * @param string $src Full URL of the script, or path of the script relative to the WordPress root directory.
     *                                    Default empty.
     * @param array $deps Optional. An array of registered script handles this script depends on. Default empty array.
     * @param string|bool|null $ver Optional. String specifying script version number, if it has one, which is added to the URL
     *                                    as a query string for cache busting purposes. If version is set to false, a version
     *                                    number is automatically added equal to current installed WordPress version.
     *                                    If set to null, no version is added.
     * @param bool $in_footer Optional. Whether to enqueue the script before </body> instead of in the <head>.
     *                                    Default 'false'.
     */
    function wp_enqueue_script($handle, $src = '', $deps = array(), $ver = false, $in_footer = false)
    {
        wp_enqueue_script($handle, $src, $deps, $ver, $in_footer);
    }
}
