<?php
/**
 * Created by PhpStorm.
 * User: Práta
 * Date: 15/08/2017
 * Time: 16:09
 */

namespace Aloo\WordPress\Core\API;

class Plugin
{
    /**
     * Hook a function or method to a specific filter action.
     *
     * WordPress offers filter hooks to allow plugins to modify
     * various types of internal data at runtime.
     *
     * A plugin can modify data by binding a callback to a filter hook. When the filter
     * is later applied, each bound callback is run in order of priority, and given
     * the opportunity to modify a value by returning a new value.
     *
     * The following example shows how a callback function is bound to a filter hook.
     *
     * Note that `$example` is passed to the callback, (maybe) modified, then returned:
     *
     *     function example_callback( $example ) {
     *         // Maybe modify $example in some way.
     *         return $example;
     *     }
     *     add_filter( 'example_filter', 'example_callback' );
     *
     * Bound callbacks can accept from none to the total number of arguments passed as parameters
     * in the corresponding apply_filters() call.
     *
     * In other words, if an apply_filters() call passes four total arguments, callbacks bound to
     * it can accept none (the same as 1) of the arguments or up to four. The important part is that
     * the `$accepted_args` value must reflect the number of arguments the bound callback *actually*
     * opted to accept. If no arguments were accepted by the callback that is considered to be the
     * same as accepting 1 argument. For example:
     *
     *     // Filter call.
     *     $value = apply_filters( 'hook', $value, $arg2, $arg3 );
     *
     *     // Accepting zero/one arguments.
     *     function example_callback() {
     *         ...
     *         return 'some value';
     *     }
     *     add_filter( 'hook', 'example_callback' ); // Where $priority is default 10, $accepted_args is default 1.
     *
     *     // Accepting two arguments (three possible).
     *     function example_callback( $value, $arg2 ) {
     *         ...
     *         return $maybe_modified_value;
     *     }
     *     add_filter( 'hook', 'example_callback', 10, 2 ); // Where $priority is 10, $accepted_args is 2.
     *
     * *Note:* The function will return true whether or not the callback is valid.
     * It is up to you to take care. This is done for optimization purposes, so
     * everything is as quick as possible.
     *
     * @since 0.71
     *
     * @global array $wp_filter      A multidimensional array of all hooks and the callbacks hooked to them.
     *
     * @param string   $tag             The name of the filter to hook the $function_to_add callback to.
     * @param callable $function_to_add The callback to be run when the filter is applied.
     * @param int      $priority        Optional. Used to specify the order in which the functions
     *                                  associated with a particular action are executed. Default 10.
     *                                  Lower numbers correspond with earlier execution,
     *                                  and functions with the same priority are executed
     *                                  in the order in which they were added to the action.
     * @param int      $accepted_args   Optional. The number of arguments the function accepts. Default 1.
     * @return true
     */
    function add_filter( $tag, $function_to_add, $priority = 10, $accepted_args = 1 ) {
        return add_filter($tag, $function_to_add, $priority, $accepted_args);
    }
    /**
     * Call the functions added to a filter hook.
     *
     * The callback functions attached to filter hook $tag are invoked by calling
     * this function. This function can be used to create a new filter hook by
     * simply calling this function with the name of the new hook specified using
     * the $tag parameter.
     *
     * The function allows for additional arguments to be added and passed to hooks.
     *
     *     // Our filter callback function
     *     function example_callback( $string, $arg1, $arg2 ) {
     *         // (maybe) modify $string
     *         return $string;
     *     }
     *     add_filter( 'example_filter', 'example_callback', 10, 3 );
     *
     *     /*
     *      * Apply the filters by calling the 'example_callback' function we
     *      * "hooked" to 'example_filter' using the add_filter() function above.
     *      * - 'example_filter' is the filter hook $tag
     *      * - 'filter me' is the value being filtered
     *      * - $arg1 and $arg2 are the additional arguments passed to the callback.
     *     $value = apply_filters( 'example_filter', 'filter me', $arg1, $arg2 );
     *
     * @since 0.71
     *
     * @global array $wp_filter         Stores all of the filters.
     * @global array $wp_current_filter Stores the list of current filters with the current one last.
     *
     * @param string $tag     The name of the filter hook.
     * @param mixed  $value   The value on which the filters hooked to `$tag` are applied on.
     * @param mixed  $var,... Additional variables passed to the functions hooked to `$tag`.
     * @return mixed The filtered value after all hooked functions are applied to it.
     */
    public function apply_filters( $tag, $value ) {
        return apply_filters($tag, $value);
    }
    /**
     * Hooks a function on to a specific action.
     *
     * Actions are the hooks that the WordPress core launches at specific points
     * during execution, or when specific events occur. Plugins can specify that
     * one or more of its PHP functions are executed at these points, using the
     * Action API.
     *
     * @since 1.2.0
     *
     * @param string   $tag             The name of the action to which the $function_to_add is hooked.
     * @param callable $function_to_add The name of the function you wish to be called.
     * @param int      $priority        Optional. Used to specify the order in which the functions
     *                                  associated with a particular action are executed. Default 10.
     *                                  Lower numbers correspond with earlier execution,
     *                                  and functions with the same priority are executed
     *                                  in the order in which they were added to the action.
     * @param int      $accepted_args   Optional. The number of arguments the function accepts. Default 1.
     * @return true Will always return true.
     */
    public function add_action($tag, $function_to_add, $priority = 10, $accepted_args = 1) {
        return add_action($tag, $function_to_add, $priority, $accepted_args);
    }
    /**
     * Add a top-level menu page.
     *
     * This function takes a capability which will be used to determine whether
     * or not a page is included in the menu.
     *
     * The function which is hooked in to handle the output of the page must check
     * that the user has the required capability as well.
     *
     * @global array $menu
     * @global array $admin_page_hooks
     * @global array $_registered_pages
     * @global array $_parent_pages
     *
     * @param string   $page_title The text to be displayed in the title tags of the page when the menu is selected.
     * @param string   $menu_title The text to be used for the menu.
     * @param string   $capability The capability required for this menu to be displayed to the user.
     * @param string   $menu_slug  The slug name to refer to this menu by (should be unique for this menu).
     * @param callable $function   The function to be called to output the content for this page.
     * @param string   $icon_url   The URL to the icon to be used for this menu.
     *                             * Pass a base64-encoded SVG using a data URI, which will be colored to match
     *                               the color scheme. This should begin with 'data:image/svg+xml;base64,'.
     *                             * Pass the name of a Dashicons helper class to use a font icon,
     *                               e.g. 'dashicons-chart-pie'.
     *                             * Pass 'none' to leave div.wp-menu-image empty so an icon can be added via CSS.
     * @param int      $position   The position in the menu order this one should appear.
     * @return string The resulting page's hook_suffix.
     */
    function add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function = '', $icon_url = '', $position = null ) {
        return \add_menu_page($page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position);
    }
    /**
     * Add a submenu page.
     *
     * This function takes a capability which will be used to determine whether
     * or not a page is included in the menu.
     *
     * The function which is hooked in to handle the output of the page must check
     * that the user has the required capability as well.
     *
     * @global array $submenu
     * @global array $menu
     * @global array $_wp_real_parent_file
     * @global bool  $_wp_submenu_nopriv
     * @global array $_registered_pages
     * @global array $_parent_pages
     *
     * @param string   $parent_slug The slug name for the parent menu (or the file name of a standard WordPress admin page).
     * @param string   $page_title  The text to be displayed in the title tags of the page when the menu is selected.
     * @param string   $menu_title  The text to be used for the menu.
     * @param string   $capability  The capability required for this menu to be displayed to the user.
     * @param string   $menu_slug   The slug name to refer to this menu by (should be unique for this menu).
     * @param callable $function    The function to be called to output the content for this page.
     * @return false|string The resulting page's hook_suffix, or false if the user does not have the capability required.
     */
    public function add_submenu_page($parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function = '')
    {
        return add_submenu_page($parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function);
    }
    /**
    * Set the activation hook for a plugin.
    *
    * When a plugin is activated, the action 'activate_PLUGINNAME' hook is
    * called. In the name of this hook, PLUGINNAME is replaced with the name
    * of the plugin, including the optional subdirectory. For example, when the
    * plugin is located in wp-content/plugins/sampleplugin/sample.php, then
    * the name of this hook will become 'activate_sampleplugin/sample.php'.
    *
    * When the plugin consists of only one file and is (as by default) located at
    * wp-content/plugins/sample.php the name of this hook will be
    * 'activate_sample.php'.
    *
    * @since 2.0.0
    *
    * @param string   $file     The filename of the plugin including the path.
    * @param callable $function The function hooked to the 'activate_PLUGIN' action.
    */
    public function register_activation_hook($file, $function) {
        register_activation_hook($file, $function);
    }
    /**
    * Set the deactivation hook for a plugin.
    *
    * When a plugin is deactivated, the action 'deactivate_PLUGINNAME' hook is
    * called. In the name of this hook, PLUGINNAME is replaced with the name
    * of the plugin, including the optional subdirectory. For example, when the
    * plugin is located in wp-content/plugins/sampleplugin/sample.php, then
    * the name of this hook will become 'deactivate_sampleplugin/sample.php'.
    *
    * When the plugin consists of only one file and is (as by default) located at
    * wp-content/plugins/sample.php the name of this hook will be
    * 'deactivate_sample.php'.
    *
    * @since 2.0.0
    *
    * @param string   $file     The filename of the plugin including the path.
    * @param callable $function The function hooked to the 'deactivate_PLUGIN' action.
    */
    public function register_deactivation_hook($file, $function) {
        register_deactivation_hook($file, $function);
    }
}