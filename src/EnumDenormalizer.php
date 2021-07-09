<?php

declare(strict_types=1);

namespace NeutronStars\Symfony\Enum\Normalizer;

use NeutronStars\Enum\Enum;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class EnumDenormalizer extends AbstractEnumNormalizer implements DenormalizerInterface
{
    /**
     * @param mixed $data
     * @param string $type
     * @param null $format
     * @return bool
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return is_a($type, Enum::class, true);
    }

    /**
     * @param mixed $data
     * @param string $type
     * @param string|null $format
     * @param array $context
     * @return Enum
     * @throws \ReflectionException
     */
    public function denormalize($data, $type, $format = null, array $context = [])
    {
        return $this->className::from($data);
    }
}