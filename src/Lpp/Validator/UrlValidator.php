<?php

namespace Lpp\Validator;

use Lpp\Entity\ValueObject\Url;
use Lpp\Exceptions\ValidationException;
use Lpp\Validator\Rules\UrlRuleTrait;

class UrlValidator implements ValidatorInterface
{
    use UrlRuleTrait;

    /**
     * @var Url
     */
    private $url;

    public function __construct(Url $url)
    {
        $this->url = $url;
    }

    /**
     * @throws ValidationException
     */
    public function validate()
    {
        if (!$this->isValidUrl($this->url->getUrl())) {
            throw new ValidationException('Url is invalid');
        }
    }
}