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
    class AccountInformationNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return 'TouchSms\\ApiClient\\Api\\Model\\AccountInformation' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'TouchSms\\ApiClient\\Api\\Model\\AccountInformation' === \get_class($data);
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \TouchSms\ApiClient\Api\Model\AccountInformation();
            if (\array_key_exists('credits', $data) && \is_int($data['credits'])) {
                $data['credits'] = (float) $data['credits'];
            }
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('id', $data) && null !== $data['id']) {
                $object->setId($data['id']);
                unset($data['id']);
            } elseif (\array_key_exists('id', $data) && null === $data['id']) {
                $object->setId(null);
            }
            if (\array_key_exists('firstname', $data) && null !== $data['firstname']) {
                $object->setFirstname($data['firstname']);
                unset($data['firstname']);
            } elseif (\array_key_exists('firstname', $data) && null === $data['firstname']) {
                $object->setFirstname(null);
            }
            if (\array_key_exists('surname', $data) && null !== $data['surname']) {
                $object->setSurname($data['surname']);
                unset($data['surname']);
            } elseif (\array_key_exists('surname', $data) && null === $data['surname']) {
                $object->setSurname(null);
            }
            if (\array_key_exists('email', $data) && null !== $data['email']) {
                $object->setEmail($data['email']);
                unset($data['email']);
            } elseif (\array_key_exists('email', $data) && null === $data['email']) {
                $object->setEmail(null);
            }
            if (\array_key_exists('mobile', $data) && null !== $data['mobile']) {
                $object->setMobile($data['mobile']);
                unset($data['mobile']);
            } elseif (\array_key_exists('mobile', $data) && null === $data['mobile']) {
                $object->setMobile(null);
            }
            if (\array_key_exists('credits', $data) && null !== $data['credits']) {
                $object->setCredits($data['credits']);
                unset($data['credits']);
            } elseif (\array_key_exists('credits', $data) && null === $data['credits']) {
                $object->setCredits(null);
            }
            if (\array_key_exists('settings', $data) && null !== $data['settings']) {
                $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['settings'] as $key => $value) {
                    $values[$key] = $value;
                }
                $object->setSettings($values);
                unset($data['settings']);
            } elseif (\array_key_exists('settings', $data) && null === $data['settings']) {
                $object->setSettings(null);
            }
            foreach ($data as $key_1 => $value_1) {
                if (preg_match('/.*/', (string) $key_1)) {
                    $object[$key_1] = $value_1;
                }
            }

            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            if ($object->isInitialized('id') && null !== $object->getId()) {
                $data['id'] = $object->getId();
            }
            if ($object->isInitialized('firstname') && null !== $object->getFirstname()) {
                $data['firstname'] = $object->getFirstname();
            }
            if ($object->isInitialized('surname') && null !== $object->getSurname()) {
                $data['surname'] = $object->getSurname();
            }
            if ($object->isInitialized('email') && null !== $object->getEmail()) {
                $data['email'] = $object->getEmail();
            }
            if ($object->isInitialized('mobile') && null !== $object->getMobile()) {
                $data['mobile'] = $object->getMobile();
            }
            if ($object->isInitialized('credits') && null !== $object->getCredits()) {
                $data['credits'] = $object->getCredits();
            }
            if ($object->isInitialized('settings') && null !== $object->getSettings()) {
                $values = [];
                foreach ($object->getSettings() as $key => $value) {
                    $values[$key] = $value;
                }
                $data['settings'] = $values;
            }
            foreach ($object as $key_1 => $value_1) {
                if (preg_match('/.*/', (string) $key_1)) {
                    $data[$key_1] = $value_1;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['TouchSms\\ApiClient\\Api\\Model\\AccountInformation' => false];
        }
    }
} else {
    class AccountInformationNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return 'TouchSms\\ApiClient\\Api\\Model\\AccountInformation' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'TouchSms\\ApiClient\\Api\\Model\\AccountInformation' === \get_class($data);
        }

        public function denormalize($data, $type, $format = null, array $context = [])
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \TouchSms\ApiClient\Api\Model\AccountInformation();
            if (\array_key_exists('credits', $data) && \is_int($data['credits'])) {
                $data['credits'] = (float) $data['credits'];
            }
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('id', $data) && null !== $data['id']) {
                $object->setId($data['id']);
                unset($data['id']);
            } elseif (\array_key_exists('id', $data) && null === $data['id']) {
                $object->setId(null);
            }
            if (\array_key_exists('firstname', $data) && null !== $data['firstname']) {
                $object->setFirstname($data['firstname']);
                unset($data['firstname']);
            } elseif (\array_key_exists('firstname', $data) && null === $data['firstname']) {
                $object->setFirstname(null);
            }
            if (\array_key_exists('surname', $data) && null !== $data['surname']) {
                $object->setSurname($data['surname']);
                unset($data['surname']);
            } elseif (\array_key_exists('surname', $data) && null === $data['surname']) {
                $object->setSurname(null);
            }
            if (\array_key_exists('email', $data) && null !== $data['email']) {
                $object->setEmail($data['email']);
                unset($data['email']);
            } elseif (\array_key_exists('email', $data) && null === $data['email']) {
                $object->setEmail(null);
            }
            if (\array_key_exists('mobile', $data) && null !== $data['mobile']) {
                $object->setMobile($data['mobile']);
                unset($data['mobile']);
            } elseif (\array_key_exists('mobile', $data) && null === $data['mobile']) {
                $object->setMobile(null);
            }
            if (\array_key_exists('credits', $data) && null !== $data['credits']) {
                $object->setCredits($data['credits']);
                unset($data['credits']);
            } elseif (\array_key_exists('credits', $data) && null === $data['credits']) {
                $object->setCredits(null);
            }
            if (\array_key_exists('settings', $data) && null !== $data['settings']) {
                $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['settings'] as $key => $value) {
                    $values[$key] = $value;
                }
                $object->setSettings($values);
                unset($data['settings']);
            } elseif (\array_key_exists('settings', $data) && null === $data['settings']) {
                $object->setSettings(null);
            }
            foreach ($data as $key_1 => $value_1) {
                if (preg_match('/.*/', (string) $key_1)) {
                    $object[$key_1] = $value_1;
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
            if ($object->isInitialized('id') && null !== $object->getId()) {
                $data['id'] = $object->getId();
            }
            if ($object->isInitialized('firstname') && null !== $object->getFirstname()) {
                $data['firstname'] = $object->getFirstname();
            }
            if ($object->isInitialized('surname') && null !== $object->getSurname()) {
                $data['surname'] = $object->getSurname();
            }
            if ($object->isInitialized('email') && null !== $object->getEmail()) {
                $data['email'] = $object->getEmail();
            }
            if ($object->isInitialized('mobile') && null !== $object->getMobile()) {
                $data['mobile'] = $object->getMobile();
            }
            if ($object->isInitialized('credits') && null !== $object->getCredits()) {
                $data['credits'] = $object->getCredits();
            }
            if ($object->isInitialized('settings') && null !== $object->getSettings()) {
                $values = [];
                foreach ($object->getSettings() as $key => $value) {
                    $values[$key] = $value;
                }
                $data['settings'] = $values;
            }
            foreach ($object as $key_1 => $value_1) {
                if (preg_match('/.*/', (string) $key_1)) {
                    $data[$key_1] = $value_1;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['TouchSms\\ApiClient\\Api\\Model\\AccountInformation' => false];
        }
    }
}
