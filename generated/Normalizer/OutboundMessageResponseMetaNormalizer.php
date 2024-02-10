<?php

declare(strict_types=1);

namespace TouchSms\ApiClient\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use TouchSms\ApiClient\Api\Runtime\Normalizer\CheckArray;
use TouchSms\ApiClient\Api\Runtime\Normalizer\ValidatorTrait;

if (!class_exists(Kernel::class) || (Kernel::MAJOR_VERSION >= 7 || Kernel::MAJOR_VERSION === 6 && Kernel::MINOR_VERSION === 4)) {
    class OutboundMessageResponseMetaNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return 'TouchSms\\ApiClient\\Api\\Model\\OutboundMessageResponseMeta' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'TouchSms\\ApiClient\\Api\\Model\\OutboundMessageResponseMeta' === \get_class($data);
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \TouchSms\ApiClient\Api\Model\OutboundMessageResponseMeta();
            if (\array_key_exists('cost', $data) && \is_int($data['cost'])) {
                $data['cost'] = (float) $data['cost'];
            }
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('size', $data) && null !== $data['size']) {
                $object->setSize($data['size']);
                unset($data['size']);
            } elseif (\array_key_exists('size', $data) && null === $data['size']) {
                $object->setSize(null);
            }
            if (\array_key_exists('parts', $data) && null !== $data['parts']) {
                $object->setParts($data['parts']);
                unset($data['parts']);
            } elseif (\array_key_exists('parts', $data) && null === $data['parts']) {
                $object->setParts(null);
            }
            if (\array_key_exists('is_unicode', $data) && null !== $data['is_unicode']) {
                $object->setIsUnicode($data['is_unicode']);
                unset($data['is_unicode']);
            } elseif (\array_key_exists('is_unicode', $data) && null === $data['is_unicode']) {
                $object->setIsUnicode(null);
            }
            if (\array_key_exists('cost', $data) && null !== $data['cost']) {
                $object->setCost($data['cost']);
                unset($data['cost']);
            } elseif (\array_key_exists('cost', $data) && null === $data['cost']) {
                $object->setCost(null);
            }
            if (\array_key_exists('country', $data) && null !== $data['country']) {
                $object->setCountry($data['country']);
                unset($data['country']);
            } elseif (\array_key_exists('country', $data) && null === $data['country']) {
                $object->setCountry(null);
            }
            foreach ($data as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value;
                }
            }

            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            if ($object->isInitialized('size') && null !== $object->getSize()) {
                $data['size'] = $object->getSize();
            }
            if ($object->isInitialized('parts') && null !== $object->getParts()) {
                $data['parts'] = $object->getParts();
            }
            if ($object->isInitialized('isUnicode') && null !== $object->getIsUnicode()) {
                $data['is_unicode'] = $object->getIsUnicode();
            }
            if ($object->isInitialized('cost') && null !== $object->getCost()) {
                $data['cost'] = $object->getCost();
            }
            if ($object->isInitialized('country') && null !== $object->getCountry()) {
                $data['country'] = $object->getCountry();
            }
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['TouchSms\\ApiClient\\Api\\Model\\OutboundMessageResponseMeta' => false];
        }
    }
} else {
    class OutboundMessageResponseMetaNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return 'TouchSms\\ApiClient\\Api\\Model\\OutboundMessageResponseMeta' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'TouchSms\\ApiClient\\Api\\Model\\OutboundMessageResponseMeta' === \get_class($data);
        }

        public function denormalize($data, $type, $format = null, array $context = [])
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \TouchSms\ApiClient\Api\Model\OutboundMessageResponseMeta();
            if (\array_key_exists('cost', $data) && \is_int($data['cost'])) {
                $data['cost'] = (float) $data['cost'];
            }
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('size', $data) && null !== $data['size']) {
                $object->setSize($data['size']);
                unset($data['size']);
            } elseif (\array_key_exists('size', $data) && null === $data['size']) {
                $object->setSize(null);
            }
            if (\array_key_exists('parts', $data) && null !== $data['parts']) {
                $object->setParts($data['parts']);
                unset($data['parts']);
            } elseif (\array_key_exists('parts', $data) && null === $data['parts']) {
                $object->setParts(null);
            }
            if (\array_key_exists('is_unicode', $data) && null !== $data['is_unicode']) {
                $object->setIsUnicode($data['is_unicode']);
                unset($data['is_unicode']);
            } elseif (\array_key_exists('is_unicode', $data) && null === $data['is_unicode']) {
                $object->setIsUnicode(null);
            }
            if (\array_key_exists('cost', $data) && null !== $data['cost']) {
                $object->setCost($data['cost']);
                unset($data['cost']);
            } elseif (\array_key_exists('cost', $data) && null === $data['cost']) {
                $object->setCost(null);
            }
            if (\array_key_exists('country', $data) && null !== $data['country']) {
                $object->setCountry($data['country']);
                unset($data['country']);
            } elseif (\array_key_exists('country', $data) && null === $data['country']) {
                $object->setCountry(null);
            }
            foreach ($data as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value;
                }
            }

            return $object;
        }

        /**
         * @return array|string|int|float|bool|\ArrayObject|null
         */
        public function normalize($object, $format = null, array $context = [])
        {
            $data = [];
            if ($object->isInitialized('size') && null !== $object->getSize()) {
                $data['size'] = $object->getSize();
            }
            if ($object->isInitialized('parts') && null !== $object->getParts()) {
                $data['parts'] = $object->getParts();
            }
            if ($object->isInitialized('isUnicode') && null !== $object->getIsUnicode()) {
                $data['is_unicode'] = $object->getIsUnicode();
            }
            if ($object->isInitialized('cost') && null !== $object->getCost()) {
                $data['cost'] = $object->getCost();
            }
            if ($object->isInitialized('country') && null !== $object->getCountry()) {
                $data['country'] = $object->getCountry();
            }
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['TouchSms\\ApiClient\\Api\\Model\\OutboundMessageResponseMeta' => false];
        }
    }
}
