<?php

declare(strict_types=1);

namespace NeutronStars\Symfony\Enum\Normalizer\Tests\Fixture;

use NeutronStars\Enum\Enum;

/**
 * @method static self FOO()
 * @method static self BAR()
 * Class FooBarEnum
 * @package NeutronStars\Symfony\Enum\Normalizer\Tests\Fixture
 */
class FooBarEnum extends Enum
{
    public const FOO = 'Foo';
    public const BAR = 'Bar';
}