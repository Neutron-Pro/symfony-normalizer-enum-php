<?php

declare(strict_types=1);

namespace NeutronStars\Symfony\Enum\Normalizer\Tests;

use NeutronStars\Symfony\Enum\Normalizer\EnumDenormalizer;
use NeutronStars\Symfony\Enum\Normalizer\EnumNormalizer;
use NeutronStars\Symfony\Enum\Normalizer\Tests\Fixture\FooBarEnum;
use PHPUnit\Framework\TestCase;

class TestNormalizerEnum extends TestCase
{
    public function testNormalizeEnum(): void
    {
        $normalizer = new EnumNormalizer(FooBarEnum::class);
        $this->assertSame(
            'BAR',
            $normalizer->normalize(FooBarEnum::BAR()),
            'Unable to normalize the FooBarEnum.'
        );
    }

    public function testDenormalizeEnum(): void
    {
        $denormalizer = new EnumDenormalizer(FooBarEnum::class);
        $this->assertSame(
            FooBarEnum::FOO(),
            $denormalizer->denormalize('FOO', FooBarEnum::class),
            'Unable to denormalize the FooBarEnum.'
        );
    }
}