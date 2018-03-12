<?php
namespace Aloo\WordPress;

use Aloo\WordPress;

interface APITraitInterface
{
    public function getWordPressAPI() : WordPress\API;
    public function setWordPressAPI(WordPress\API $wordPressAPI);
}
