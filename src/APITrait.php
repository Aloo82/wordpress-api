<?php
namespace Aloo\WordPress;

trait APITrait
{
    private $wordPressAPI;

    public function getWordPressAPI() : API
    {
        if (\is_null($this->wordPressAPI)) {
            $this->wordPressAPI = new API();
        }
        return $this->wordPressAPI;
    }

    public function setWordPressAPI(API $wordPressAPI)
    {
        $this->wordPressAPI = $wordPressAPI;
    }
}
