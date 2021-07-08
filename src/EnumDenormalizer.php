<?php

declare(strict_types=1);

namespace NeutronStars\Symfony\Enum\Normalizer;

use NeutronStars\Enum\Enum;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class EnumDenormalizer extends AbstractEnumNormalizer implements DenormalizerInterface
{
    public function supportsDenormalization($data, string $type, string $format = null): bool
    {
        return is_a($type, Enum::class, true);
    }

    /**
     * @param mixed $data
     * @param string $type
     * @param string|null $format
     * @param array $context
     * @return object
     * @throws \ReflectionException
     */
    public function denormalize($data, string $type, string $format = null, array $context = [])
    {
        return $this->className::from($data);
    }
}