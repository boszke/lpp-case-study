<?php

namespace Lpp\Test\Lpp\Enitity\ValueObject;

use Lpp\Entity\ValueObject\Url;
use Lpp\Exceptions\ValidationException;
use PHPUnit\Framework\TestCase;

class UrlTest extends TestCase
{
    public function correctUrlsDataProvider()
    {
        return [
            ['http://www.example.com'],
            ['https://github.com'],
            ['http://wp.pl'],
        ];
    }

    /**
     * @dataProvider correctUrlsDataProvider
     * @param string $url
     */
    public function testValidUrl($url)
    {
        new Url($url);
    }

    public function incorrectUrlsDataProvider()
    {
        return [
            ['http://www.exam ple.com'],
            ['lorem'],
            ['htqweq:/wp.pl'],
        ];
    }

    /**
     * @dataProvider incorrectUrlsDataProvider
     * @param string $url
     */
    public function testInvalidUrl($url)
    {
        $this->expectException(ValidationException::class);
        new Url($url);
    }
}