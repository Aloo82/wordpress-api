<?php
/**
 * Created by PhpStorm.
 * User: Práta
 * Date: 24/08/2017
 * Time: 09:59
 */

namespace Aloo\WordPress\Core\API;

class Rewrite
{
    /**
     * Examine a URL and try to determine the post ID it represents.
     *
     * Checks are supposedly from the hosted site blog.
     *
     * @since 1.0.0
     *
     * @global WP_Rewrite $wp_rewrite
     * @global WP         $wp
     *
     * @param string $url Permalink to check.
     * @return int Post ID, or 0 on failure.
     */
    public function url_to_postid($url)
    {
        return url_to_postid($url);
    }
}
