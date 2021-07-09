<?php

declare(strict_types=1);

namespace NeutronStars\Symfony\Enum\Normalizer;

use NeutronStars\Enum\Enum;
use Symfony\Component\Serializer\Exception\NotNormalizableValueException;

class AbstractEnumNormalizer
{
    /** @var string|Enum $className */
    protected $className;

    /**
     * @param string|null $className
     * @throws NotNormalizableValueException
     */
    public function __construct($className = null)
    {
        $this->className = $className ?? Enum::class;
        if ($this->className !== Enum::class
            && !is_subclass_of($this->className, Enum::class, true)) {
            throw new NotNormalizableValueException('Class ' . $this->className . ' is not supported !');
        }
    }
}