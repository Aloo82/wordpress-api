<?php
/**
 * Created by PhpStorm.
 * User: Práta
 * Date: 24/08/2017
 * Time: 22:36
 */

namespace Aloo\WordPress\Core\API;

class Post
{
    /**
     * Retrieve the Post Global Unique Identifier (guid).
     *
     * The guid will appear to be a link, but should not be used as an link to the
     * post. The reason you should not use it as a link, is because of moving the
     * blog across domains.
     *
     * @since 1.5.0
     *
     * @param int|WP_Post $post Optional. Post ID or post object. Default is global $post.
     * @return string
     */
    public function get_the_guid( $post = 0 ) {
        return get_the_guid($post);
    }

    public function get_post_by_guid($guid) {
        global $wpdb;
        return $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE guid='%s'", $guid) );
    }

    /**
     * Retrieve the URL for an attachment.
     *
     * @since 2.1.0
     *
     * @global string $pagenow
     *
     * @param int $post_id Optional. Attachment ID. Default 0.
     * @return string|false Attachment URL, otherwise false.
     */
    public function wp_get_attachment_url( $post_id = 0 ) {
        return wp_get_attachment_url($post_id);
    }
    /**
     * Retrieve post title.
     *
     * If the post is protected and the visitor is not an admin, then "Protected"
     * will be displayed before the post title. If the post is private, then
     * "Private" will be located before the post title.
     *
     * @since 0.71
     *
     * @param int|WP_Post $post Optional. Post ID or WP_Post object. Default is global $post.
     * @return string
     */
    function get_the_title( $post = 0 ) {
        return get_the_title( $post );
    }
    /**
     * Retrieves post data given a post ID or post object.
     *
     * See sanitize_post() for optional $filter values. Also, the parameter
     * `$post`, must be given as a variable, since it is passed by reference.
     *
     * @since 1.5.1
     *
     * @global WP_Post $post
     *
     * @param int|WP_Post|null $post   Optional. Post ID or post object. Defaults to global $post.
     * @param string           $output Optional. The required return type. One of OBJECT, ARRAY_A, or ARRAY_N, which correspond to
     *                                 a WP_Post object, an associative array, or a numeric array, respectively. Default OBJECT.
     * @param string           $filter Optional. Type of filter to apply. Accepts 'raw', 'edit', 'db',
     *                                 or 'display'. Default 'raw'.
     * @return WP_Post|array|null Type corresponding to $output on success or null on failure.
     *                            When $output is OBJECT, a `WP_Post` instance is returned.
     */
    function get_post( $post = null, $output = OBJECT, $filter = 'raw' ) {
        return get_post($post, $output, $filter);
    }
}