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
    class V2SmsDryPostResponse200DataNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return 'TouchSms\\ApiClient\\Api\\Model\\V2SmsDryPostResponse200Data' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'TouchSms\\ApiClient\\Api\\Model\\V2SmsDryPostResponse200Data' === \get_class($data);
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \TouchSms\ApiClient\Api\Model\V2SmsDryPostResponse200Data();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('messages', $data) && null !== $data['messages']) {
                $values = [];
                foreach ($data['messages'] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, 'TouchSms\\ApiClient\\Api\\Model\\OutboundMessageResponse', 'json', $context);
                }
                $object->setMessages($values);
                unset($data['messages']);
            } elseif (\array_key_exists('messages', $data) && null === $data['messages']) {
                $object->setMessages(null);
            }
            if (\array_key_exists('errors', $data) && null !== $data['errors']) {
                $values_1 = [];
                foreach ($data['errors'] as $value_1) {
                    $values_1[] = $this->denormalizer->denormalize($value_1, 'TouchSms\\ApiClient\\Api\\Model\\OutboundMessageError', 'json', $context);
                }
                $object->setErrors($values_1);
                unset($data['errors']);
            } elseif (\array_key_exists('errors', $data) && null === $data['errors']) {
                $object->setErrors(null);
            }
            foreach ($data as $key => $value_2) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value_2;
                }
            }

            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            if ($object->isInitialized('messages') && null !== $object->getMessages()) {
                $values = [];
                foreach ($object->getMessages() as $value) {
                    $values[] = $this->normalizer->normalize($value, 'json', $context);
                }
                $data['messages'] = $values;
            }
            if ($object->isInitialized('errors') && null !== $object->getErrors()) {
                $values_1 = [];
                foreach ($object->getErrors() as $value_1) {
                    $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
                }
                $data['errors'] = $values_1;
            }
            foreach ($object as $key => $value_2) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_2;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['TouchSms\\ApiClient\\Api\\Model\\V2SmsDryPostResponse200Data' => false];
        }
    }
} else {
    class V2SmsDryPostResponse200DataNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return 'TouchSms\\ApiClient\\Api\\Model\\V2SmsDryPostResponse200Data' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'TouchSms\\ApiClient\\Api\\Model\\V2SmsDryPostResponse200Data' === \get_class($data);
        }

        public function denormalize($data, $type, $format = null, array $context = [])
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \TouchSms\ApiClient\Api\Model\V2SmsDryPostResponse200Data();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('messages', $data) && null !== $data['messages']) {
                $values = [];
                foreach ($data['messages'] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, 'TouchSms\\ApiClient\\Api\\Model\\OutboundMessageResponse', 'json', $context);
                }
                $object->setMessages($values);
                unset($data['messages']);
            } elseif (\array_key_exists('messages', $data) && null === $data['messages']) {
                $object->setMessages(null);
            }
            if (\array_key_exists('errors', $data) && null !== $data['errors']) {
                $values_1 = [];
                foreach ($data['errors'] as $value_1) {
                    $values_1[] = $this->denormalizer->denormalize($value_1, 'TouchSms\\ApiClient\\Api\\Model\\OutboundMessageError', 'json', $context);
                }
                $object->setErrors($values_1);
                unset($data['errors']);
            } elseif (\array_key_exists('errors', $data) && null === $data['errors']) {
                $object->setErrors(null);
            }
            foreach ($data as $key => $value_2) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value_2;
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
            if ($object->isInitialized('messages') && null !== $object->getMessages()) {
                $values = [];
                foreach ($object->getMessages() as $value) {
                    $values[] = $this->normalizer->normalize($value, 'json', $context);
                }
                $data['messages'] = $values;
            }
            if ($object->isInitialized('errors') && null !== $object->getErrors()) {
                $values_1 = [];
                foreach ($object->getErrors() as $value_1) {
                    $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
                }
                $data['errors'] = $values_1;
            }
            foreach ($object as $key => $value_2) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_2;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['TouchSms\\ApiClient\\Api\\Model\\V2SmsDryPostResponse200Data' => false];
        }
    }
}
