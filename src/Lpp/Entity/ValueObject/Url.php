<?php

namespace Lpp\Entity\ValueObject;

use Lpp\Validator\UrlValidator;

class Url
{
    /**
     * @var string
     */
    private $url;

    /**
     * @param string $url
     * @throws \Lpp\Exceptions\ValidationException
     */
    public function __construct($url)
    {
        $this->url = $url;
        (new UrlValidator($this))->validate();
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}