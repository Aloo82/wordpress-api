<?php
/**
 * Created by PhpStorm.
 * User: Práta
 * Date: 12/09/2017
 * Time: 20:34
 */

namespace Aloo\WordPress\Dashboard\Notification;

class Constants
{
    const OPTION_NAME = 'Aloo/WordPress/Notification';
    /**
     * CSS Classes
     */
    const CLASS_NOTICE = 'notice';
    const CLASS_ERROR = 'notice-error';
    const CLASS_WARNING = 'notice-warning';
    const CLASS_SUCCESS = 'notice-success';
    const CLASS_INFO = 'notice-info';
    const CLASS_DISMISSIBLE = 'is-dismissible';
    /**
     * Templates
     */
    const TEMPLATE_NOTICE = '
        <{notice.tag} class="{notice.classes}">
            {notice.prefix}{notice.message}{notice.postfix}
        </{notice.tag}>';
}
