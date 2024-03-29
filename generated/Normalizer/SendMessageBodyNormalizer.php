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
    class SendMessageBodyNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return 'TouchSms\\ApiClient\\Api\\Model\\SendMessageBody' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'TouchSms\\ApiClient\\Api\\Model\\SendMessageBody' === \get_class($data);
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \TouchSms\ApiClient\Api\Model\SendMessageBody();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('messages', $data) && null !== $data['messages']) {
                $values = [];
                foreach ($data['messages'] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, 'TouchSms\\ApiClient\\Api\\Model\\OutboundMessage', 'json', $context);
                }
                $object->setMessages($values);
                unset($data['messages']);
            } elseif (\array_key_exists('messages', $data) && null === $data['messages']) {
                $object->setMessages(null);
            }
            foreach ($data as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value_1;
                }
            }

            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            $values = [];
            foreach ($object->getMessages() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['messages'] = $values;
            foreach ($object as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_1;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['TouchSms\\ApiClient\\Api\\Model\\SendMessageBody' => false];
        }
    }
} else {
    class SendMessageBodyNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return 'TouchSms\\ApiClient\\Api\\Model\\SendMessageBody' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'TouchSms\\ApiClient\\Api\\Model\\SendMessageBody' === \get_class($data);
        }

        public function denormalize($data, $type, $format = null, array $context = [])
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \TouchSms\ApiClient\Api\Model\SendMessageBody();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('messages', $data) && null !== $data['messages']) {
                $values = [];
                foreach ($data['messages'] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, 'TouchSms\\ApiClient\\Api\\Model\\OutboundMessage', 'json', $context);
                }
                $object->setMessages($values);
                unset($data['messages']);
            } elseif (\array_key_exists('messages', $data) && null === $data['messages']) {
                $object->setMessages(null);
            }
            foreach ($data as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value_1;
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
            $values = [];
            foreach ($object->getMessages() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['messages'] = $values;
            foreach ($object as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_1;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['TouchSms\\ApiClient\\Api\\Model\\SendMessageBody' => false];
        }
    }
}
