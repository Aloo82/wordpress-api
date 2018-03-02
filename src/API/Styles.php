<?php
/**
 * Created by PhpStorm.
 * User: Práta
 * Date: 03/09/2017
 * Time: 16:25
 */

namespace Aloo\WordPress\Core\API;

class Styles
{
    /**
     * Register a CSS stylesheet.
     *
     * @see WP_Dependencies::add()
     * @link https://www.w3.org/TR/CSS2/media.html#media-types List of CSS media types.
     *
     * @since 2.6.0
     * @since 4.3.0 A return value was added.
     *
     * @param string $handle Name of the stylesheet. Should be unique.
     * @param string $src Full URL of the stylesheet, or path of the stylesheet relative to the WordPress root directory.
     * @param array $deps Optional. An array of registered stylesheet handles this stylesheet depends on. Default empty array.
     * @param string|bool|null $ver Optional. String specifying stylesheet version number, if it has one, which is added to the URL
     *                                 as a query string for cache busting purposes. If version is set to false, a version
     *                                 number is automatically added equal to current installed WordPress version.
     *                                 If set to null, no version is added.
     * @param string $media Optional. The media for which this stylesheet has been defined.
     *                                 Default 'all'. Accepts media types like 'all', 'print' and 'screen', or media queries like
     *                                 '(orientation: portrait)' and '(max-width: 640px)'.
     * @return bool Whether the style has been registered. True on success, false on failure.
     */
    function wp_register_style($handle, $src, $deps = array(), $ver = false, $media = 'all')
    {
        return wp_register_style($handle, $src, $deps, $ver, $media);
    }

    /**
     * Enqueue a CSS stylesheet.
     *
     * Registers the style if source provided (does NOT overwrite) and enqueues.
     *
     * @see WP_Dependencies::add()
     * @see WP_Dependencies::enqueue()
     * @link https://www.w3.org/TR/CSS2/media.html#media-types List of CSS media types.
     *
     * @since 2.6.0
     *
     * @param string $handle Name of the stylesheet. Should be unique.
     * @param string $src Full URL of the stylesheet, or path of the stylesheet relative to the WordPress root directory.
     *                                 Default empty.
     * @param array $deps Optional. An array of registered stylesheet handles this stylesheet depends on. Default empty array.
     * @param string|bool|null $ver Optional. String specifying stylesheet version number, if it has one, which is added to the URL
     *                                 as a query string for cache busting purposes. If version is set to false, a version
     *                                 number is automatically added equal to current installed WordPress version.
     *                                 If set to null, no version is added.
     * @param string $media Optional. The media for which this stylesheet has been defined.
     *                                 Default 'all'. Accepts media types like 'all', 'print' and 'screen', or media queries like
     *                                 '(orientation: portrait)' and '(max-width: 640px)'.
     */
    function wp_enqueue_style($handle, $src = '', $deps = array(), $ver = false, $media = 'all')
    {
        wp_enqueue_style($handle, $src, $deps, $ver, $media);
    }
}
