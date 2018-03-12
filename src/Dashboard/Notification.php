<?php
namespace Aloo\WordPress\Dashboard;

use Aloo\WordPress\Dashboard\Notification\Constants;
use Aloo\WordPress\Helper\View;

class Notification
{
    private $tag = 'div';
    private $type = Constants::CLASS_INFO;
    private $message = '';
    private $prefix = '';
    private $postfix = '';
    private $dismissible = true;

    public function tag($tag = null)
    {
        if (!is_null($tag)) {
            $this->tag = (string) $tag;
        }
        return $this->tag;
    }

    public function type($type = null)
    {
        if (!is_null($type)) {
            switch ($type) {
                case Constants::CLASS_ERROR:
                case Constants::CLASS_WARNING:
                case Constants::CLASS_SUCCESS:
                case Constants::CLASS_INFO:
                    $this->type = (string) $type;
                    break;
            }
        }
        return $this->type;
    }

    public function message($message = null)
    {
        if (!is_null($message)) {
            $this->message = (string) $message;
        }
        return $this->message;
    }

    public function prefix($prefix = null)
    {
        if (!is_null($prefix)) {
            $this->prefix = (string) $prefix;
        }
        return $this->prefix;
    }

    public function postfix($postfix = null)
    {
        if (!is_null($postfix)) {
            $this->postfix = (string) $postfix;
        }
        return $this->postfix;
    }

    public function classes()
    {
        return implode(' ', array_filter([
            Constants::CLASS_NOTICE,
            $this->type(),
            $this->dismissible() ? Constants::CLASS_DISMISSIBLE : null
        ]));
    }

    public function dismissible($dismissible = null)
    {
        if (is_bool($dismissible)) {
            $this->dismissible = (bool) $dismissible;
        }
        return $this->dismissible;
    }

    public function __toString()
    {
        $view = new View(Constants::TEMPLATE_NOTICE);
        $view->assign('notice', $this);
        return $view->render();
    }

    public function toJson()
    {
        return \json_encode([
            'tag' => $this->tag,
            'type' => $this->type,
            'message' => $this->message,
            'prefix' => $this->prefix,
            'postfix' => $this->postfix,
            'dismissible' => $this->dismissible
        ]);
    }

    public static function fromJson($json)
    {
        $decoded = \json_decode($json);
        $instance = new self();
        foreach ($decoded as $key => $value) {
            $method = [$instance, $key];
            if (is_callable($method)) {
                call_user_func($method, $value);
            }
        }
        return $instance;
    }
}
