<?php
/**
 * Created by PhpStorm.
 * User: Práta
 * Date: 16/08/2017
 * Time: 00:17
 */

namespace Aloo\WordPress\Core\API;

class Option
{
    /**
     * Retrieves an option value based on an option name.
     *
     * If the option does not exist or does not have a value, then the return value
     * will be false. This is useful to check whether you need to install an option
     * and is commonly used during installation of plugin options and to test
     * whether upgrading is required.
     *
     * If the option was serialized then it will be unserialized when it is returned.
     *
     * Any scalar values will be returned as strings. You may coerce the return type of
     * a given option by registering an {@see 'option_$option'} filter callback.
     *
     * @since 1.5.0
     *
     * @global wpdb $wpdb WordPress database abstraction object.
     *
     * @param string $option  Name of option to retrieve. Expected to not be SQL-escaped.
     * @param mixed  $default Optional. Default value to return if the option does not exist.
     * @return mixed Value set for the option.
     */
    public function get_option( $option, $default = false ) {
        return get_option($option, $default);
    }

    /**
     * Update the value of an option that was already added.
     *
     * You do not need to serialize values. If the value needs to be serialized, then
     * it will be serialized before it is inserted into the database. Remember,
     * resources can not be serialized or added as an option.
     *
     * If the option does not exist, then the option will be added with the option value,
     * with an `$autoload` value of 'yes'.
     *
     * @since 1.0.0
     * @since 4.2.0 The `$autoload` parameter was added.
     *
     * @global wpdb $wpdb WordPress database abstraction object.
     *
     * @param string      $option   Option name. Expected to not be SQL-escaped.
     * @param mixed       $value    Option value. Must be serializable if non-scalar. Expected to not be SQL-escaped.
     * @param string|bool $autoload Optional. Whether to load the option when WordPress starts up. For existing options,
     *                              `$autoload` can only be updated using `update_option()` if `$value` is also changed.
     *                              Accepts 'yes'|true to enable or 'no'|false to disable. For non-existent options,
     *                              the default value is 'yes'. Default null.
     * @return bool False if value was not updated and true if value was updated.
     */
    public function update_option( $option, $value, $autoload = null ) {
        return update_option($option, $value, $autoload);
    }

    /**
     * Add a new option.
     *
     * You do not need to serialize values. If the value needs to be serialized, then
     * it will be serialized before it is inserted into the database. Remember,
     * resources can not be serialized or added as an option.
     *
     * You can create options without values and then update the values later.
     * Existing options will not be updated and checks are performed to ensure that you
     * aren't adding a protected WordPress option. Care should be taken to not name
     * options the same as the ones which are protected.
     *
     * @since 1.0.0
     *
     * @global wpdb $wpdb WordPress database abstraction object.
     *
     * @param string         $option      Name of option to add. Expected to not be SQL-escaped.
     * @param mixed          $value       Optional. Option value. Must be serializable if non-scalar. Expected to not be SQL-escaped.
     * @param string         $deprecated  Optional. Description. Not used anymore.
     * @param string|bool    $autoload    Optional. Whether to load the option when WordPress starts up.
     *                                    Default is enabled. Accepts 'no' to disable for legacy reasons.
     * @return bool False if option was not added and true if option was added.
     */
    public function add_option( $option, $value = '', $deprecated = '', $autoload = 'yes' ) {
        return add_option($option, $value, $deprecated, $autoload);
    }
}