<?php

namespace Lpp\Validator\Rules;

trait UrlRuleTrait
{
    /**
     * @param $url
     * @return bool
     */
    public function isValidUrl($url)
    {
        return filter_var($url, FILTER_VALIDATE_URL);
    }
}