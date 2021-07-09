<?php

declare(strict_types=1);

namespace NeutronStars\Symfony\Enum\Normalizer;

use NeutronStars\Enum\Enum;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class EnumNormalizer extends AbstractEnumNormalizer implements NormalizerInterface
{
    /**
     * @param mixed $data
     * @param null $format
     * @return bool
     */
    public function supportsNormalization($data, $format = null)
    {
        return is_a($data, Enum::class, true);
    }

    /**
     * @param mixed $object
     * @param string|null $format
     * @param array $context
     * @return string|null
     */
    public function normalize($object, $format = null, array $context = [])
    {
        if ($object instanceof Enum) {
            return (string) $object;
        }
        return null;
    }
}