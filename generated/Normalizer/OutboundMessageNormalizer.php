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
    class OutboundMessageNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return 'TouchSms\\ApiClient\\Api\\Model\\OutboundMessage' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'TouchSms\\ApiClient\\Api\\Model\\OutboundMessage' === \get_class($data);
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \TouchSms\ApiClient\Api\Model\OutboundMessage();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('to', $data) && null !== $data['to']) {
                $object->setTo($data['to']);
                unset($data['to']);
            } elseif (\array_key_exists('to', $data) && null === $data['to']) {
                $object->setTo(null);
            }
            if (\array_key_exists('from', $data) && null !== $data['from']) {
                $object->setFrom($data['from']);
                unset($data['from']);
            } elseif (\array_key_exists('from', $data) && null === $data['from']) {
                $object->setFrom(null);
            }
            if (\array_key_exists('body', $data) && null !== $data['body']) {
                $object->setBody($data['body']);
                unset($data['body']);
            } elseif (\array_key_exists('body', $data) && null === $data['body']) {
                $object->setBody(null);
            }
            if (\array_key_exists('campaign', $data) && null !== $data['campaign']) {
                $object->setCampaign($data['campaign']);
                unset($data['campaign']);
            } elseif (\array_key_exists('campaign', $data) && null === $data['campaign']) {
                $object->setCampaign(null);
            }
            if (\array_key_exists('metadata', $data) && null !== $data['metadata']) {
                $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['metadata'] as $key => $value) {
                    $values[$key] = $value;
                }
                $object->setMetadata($values);
                unset($data['metadata']);
            } elseif (\array_key_exists('metadata', $data) && null === $data['metadata']) {
                $object->setMetadata(null);
            }
            if (\array_key_exists('media', $data) && null !== $data['media']) {
                $values_1 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['media'] as $key_1 => $value_1) {
                    $values_1[$key_1] = $value_1;
                }
                $object->setMedia($values_1);
                unset($data['media']);
            } elseif (\array_key_exists('media', $data) && null === $data['media']) {
                $object->setMedia(null);
            }
            if (\array_key_exists('reference', $data) && null !== $data['reference']) {
                $object->setReference($data['reference']);
                unset($data['reference']);
            } elseif (\array_key_exists('reference', $data) && null === $data['reference']) {
                $object->setReference(null);
            }
            if (\array_key_exists('date', $data) && null !== $data['date']) {
                $object->setDate($data['date']);
                unset($data['date']);
            } elseif (\array_key_exists('date', $data) && null === $data['date']) {
                $object->setDate(null);
            }
            foreach ($data as $key_2 => $value_2) {
                if (preg_match('/.*/', (string) $key_2)) {
                    $object[$key_2] = $value_2;
                }
            }

            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            $data['to'] = $object->getTo();
            $data['from'] = $object->getFrom();
            $data['body'] = $object->getBody();
            if ($object->isInitialized('campaign') && null !== $object->getCampaign()) {
                $data['campaign'] = $object->getCampaign();
            }
            if ($object->isInitialized('metadata') && null !== $object->getMetadata()) {
                $values = [];
                foreach ($object->getMetadata() as $key => $value) {
                    $values[$key] = $value;
                }
                $data['metadata'] = $values;
            }
            if ($object->isInitialized('media') && null !== $object->getMedia()) {
                $values_1 = [];
                foreach ($object->getMedia() as $key_1 => $value_1) {
                    $values_1[$key_1] = $value_1;
                }
                $data['media'] = $values_1;
            }
            if ($object->isInitialized('reference') && null !== $object->getReference()) {
                $data['reference'] = $object->getReference();
            }
            if ($object->isInitialized('date') && null !== $object->getDate()) {
                $data['date'] = $object->getDate();
            }
            foreach ($object as $key_2 => $value_2) {
                if (preg_match('/.*/', (string) $key_2)) {
                    $data[$key_2] = $value_2;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['TouchSms\\ApiClient\\Api\\Model\\OutboundMessage' => false];
        }
    }
} else {
    class OutboundMessageNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return 'TouchSms\\ApiClient\\Api\\Model\\OutboundMessage' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'TouchSms\\ApiClient\\Api\\Model\\OutboundMessage' === \get_class($data);
        }

        public function denormalize($data, $type, $format = null, array $context = [])
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \TouchSms\ApiClient\Api\Model\OutboundMessage();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('to', $data) && null !== $data['to']) {
                $object->setTo($data['to']);
                unset($data['to']);
            } elseif (\array_key_exists('to', $data) && null === $data['to']) {
                $object->setTo(null);
            }
            if (\array_key_exists('from', $data) && null !== $data['from']) {
                $object->setFrom($data['from']);
                unset($data['from']);
            } elseif (\array_key_exists('from', $data) && null === $data['from']) {
                $object->setFrom(null);
            }
            if (\array_key_exists('body', $data) && null !== $data['body']) {
                $object->setBody($data['body']);
                unset($data['body']);
            } elseif (\array_key_exists('body', $data) && null === $data['body']) {
                $object->setBody(null);
            }
            if (\array_key_exists('campaign', $data) && null !== $data['campaign']) {
                $object->setCampaign($data['campaign']);
                unset($data['campaign']);
            } elseif (\array_key_exists('campaign', $data) && null === $data['campaign']) {
                $object->setCampaign(null);
            }
            if (\array_key_exists('metadata', $data) && null !== $data['metadata']) {
                $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['metadata'] as $key => $value) {
                    $values[$key] = $value;
                }
                $object->setMetadata($values);
                unset($data['metadata']);
            } elseif (\array_key_exists('metadata', $data) && null === $data['metadata']) {
                $object->setMetadata(null);
            }
            if (\array_key_exists('media', $data) && null !== $data['media']) {
                $values_1 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['media'] as $key_1 => $value_1) {
                    $values_1[$key_1] = $value_1;
                }
                $object->setMedia($values_1);
                unset($data['media']);
            } elseif (\array_key_exists('media', $data) && null === $data['media']) {
                $object->setMedia(null);
            }
            if (\array_key_exists('reference', $data) && null !== $data['reference']) {
                $object->setReference($data['reference']);
                unset($data['reference']);
            } elseif (\array_key_exists('reference', $data) && null === $data['reference']) {
                $object->setReference(null);
            }
            if (\array_key_exists('date', $data) && null !== $data['date']) {
                $object->setDate($data['date']);
                unset($data['date']);
            } elseif (\array_key_exists('date', $data) && null === $data['date']) {
                $object->setDate(null);
            }
            foreach ($data as $key_2 => $value_2) {
                if (preg_match('/.*/', (string) $key_2)) {
                    $object[$key_2] = $value_2;
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
            $data['to'] = $object->getTo();
            $data['from'] = $object->getFrom();
            $data['body'] = $object->getBody();
            if ($object->isInitialized('campaign') && null !== $object->getCampaign()) {
                $data['campaign'] = $object->getCampaign();
            }
            if ($object->isInitialized('metadata') && null !== $object->getMetadata()) {
                $values = [];
                foreach ($object->getMetadata() as $key => $value) {
                    $values[$key] = $value;
                }
                $data['metadata'] = $values;
            }
            if ($object->isInitialized('media') && null !== $object->getMedia()) {
                $values_1 = [];
                foreach ($object->getMedia() as $key_1 => $value_1) {
                    $values_1[$key_1] = $value_1;
                }
                $data['media'] = $values_1;
            }
            if ($object->isInitialized('reference') && null !== $object->getReference()) {
                $data['reference'] = $object->getReference();
            }
            if ($object->isInitialized('date') && null !== $object->getDate()) {
                $data['date'] = $object->getDate();
            }
            foreach ($object as $key_2 => $value_2) {
                if (preg_match('/.*/', (string) $key_2)) {
                    $data[$key_2] = $value_2;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['TouchSms\\ApiClient\\Api\\Model\\OutboundMessage' => false];
        }
    }
}
