<?php
namespace Aloo\WordPress\Dashboard;

use Aloo\WordPress;

class NotificationHandler implements WordPress\LoggingTraitInterface
{
    use WordPress\LoggingTrait {
        setLogger as protected traitLogger;
    }

    const NOTIFICATION_METHOD = "sendNotifications";
    private $registered = false;
    
    public $pluginApi;
    public $optionApi;

    /**
     * Notification constructor
     */
    public function __construct()
    {
        /**
         * Intialise apis
         */
        $this->pluginApi = new WordPress\API\Plugin();
        $this->optionApi = new WordPress\API\Option();
    }

    /**
     * Set logger
     *
     * @param WordPress\Logger $logger
     * @return void
     */
    public function setLogger(WordPress\Logger $logger)
    {
        $this->traitLogger($logger);
        if ($this->api instanceof WordPress\LoggingTraitInterface) {
            $this->api->setLogger($logger);
        }
    }

    /**
     * Register notification handler with WordPress
     *
     * @return void
     */
    public function register()
    {
        /**
         * Register Admin Notices listener
         */
        $this->pluginApi->add_action(WordPress\API\Plugin\Action::ADMIN_NOTICES, [$this, self::NOTIFICATION_METHOD]);
        $this->registered = true;
        return $this->registered;
    }

    /**
     * Add a WordPress dashboard notification
     *
     * @param Notification $notification
     * @return void
     */
    public function addDashboardNotification(Notification $notification)
    {
        $id = uniqid();
        $json = $notification->toJson();
        /**
         * Get existing notifications
         */
        $notifications = $this->getNotifications();
        $notifications[$id] = $json;
        
        $this->optionApi->update_option(Notification\Constants::OPTION_NAME, $notifications);
    }

    /**
     * Send notifications to WordPress dashboard
     *
     * @return void
     */
    public function sendNotifications()
    {
        $notifications = $this->getNotifications();
        while (count($notifications) > 0) {
            $notification = Notification::fromJson(array_pop($notifications));
            echo $notification;
        }
        $this->optionApi->update_option(Notification\Constants::OPTION_NAME, $notifications);
    }

    /**
     * Get notifications
     *
     * @return void
     */
    private function getNotifications()
    {
        /**
         * Get notifications array
         */
        $notifications = $this->optionApi->get_option(Notification\Constants::OPTION_NAME);
        if (!is_array($notifications)) {
            $notifications = array();
            $this->optionApi->add_option(Notification\Constants::OPTION_NAME, $notifications);
        }
        return $notifications;
    }
}
