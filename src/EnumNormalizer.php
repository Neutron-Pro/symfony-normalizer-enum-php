<?php

declare(strict_types=1);

namespace NeutronStars\Symfony\Enum\Normalizer;

use NeutronStars\Enum\Enum;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class EnumNormalizer extends AbstractEnumNormalizer implements NormalizerInterface
{
    public function supportsNormalization($data, string $format = null): bool
    {
        return is_a($data, Enum::class, true);
    }

    /**
     * @param mixed $object
     * @param string|null $format
     * @param array $context
     * @return string|null
     */
    public function normalize($object, string $format = null, array $context = []): ?string
    {
        if ($object instanceof Enum) {
            return (string) $object;
        }
        return null;
    }
}