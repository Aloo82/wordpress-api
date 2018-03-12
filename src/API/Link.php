<?php
/**
 * Created by PhpStorm.
 * User: Práta
 * Date: 24/08/2017
 * Time: 21:50
 */

namespace Aloo\WordPress\API;

class Link
{
    // phpcs:disable
    /**
     * Retrieves the full permalink for the current post or post ID.
     *
     * @since 1.0.0
     *
     * @param int|WP_Post $post      Optional. Post ID or post object. Default is the global `$post`.
     * @param bool        $leavename Optional. Whether to keep post name or page name. Default false.
     * @return string|false The permalink URL or false if post does not exist.
     */
    public function get_permalink($post = 0, $leavename = false)
    {
        return get_permalink($post, $leavename);
    }
    /**
     * Retrieves a URL within the plugins or mu-plugins directory.
     *
     * Defaults to the plugins directory URL if no arguments are supplied.
     *
     * @since 2.6.0
     *
     * @param  string $path   Optional. Extra path appended to the end of the URL, including
     *                        the relative directory if $plugin is supplied. Default empty.
     * @param  string $plugin Optional. A full path to a file inside a plugin or mu-plugin.
     *                        The URL will be relative to its directory. Default empty.
     *                        Typically this is done by passing `__FILE__` as the argument.
     * @return string Plugins URL link with optional paths appended.
     */
    function plugins_url($path = '', $plugin = '')
    {
        return plugins_url($path, $plugin);
    }
}
