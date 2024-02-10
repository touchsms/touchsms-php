<?php

declare(strict_types=1);

namespace TouchSms\ApiClient\Api\Normalizer;

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
    class JaneObjectNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;
        protected $normalizers = ['TouchSms\\ApiClient\\Api\\Model\\OutboundMessage' => 'TouchSms\\ApiClient\\Api\\Normalizer\\OutboundMessageNormalizer', 'TouchSms\\ApiClient\\Api\\Model\\OutboundMessageResponse' => 'TouchSms\\ApiClient\\Api\\Normalizer\\OutboundMessageResponseNormalizer', 'TouchSms\\ApiClient\\Api\\Model\\OutboundMessageResponseMeta' => 'TouchSms\\ApiClient\\Api\\Normalizer\\OutboundMessageResponseMetaNormalizer', 'TouchSms\\ApiClient\\Api\\Model\\OutboundMessageError' => 'TouchSms\\ApiClient\\Api\\Normalizer\\OutboundMessageErrorNormalizer', 'TouchSms\\ApiClient\\Api\\Model\\SendMessageBody' => 'TouchSms\\ApiClient\\Api\\Normalizer\\SendMessageBodyNormalizer', 'TouchSms\\ApiClient\\Api\\Model\\AccountInformation' => 'TouchSms\\ApiClient\\Api\\Normalizer\\AccountInformationNormalizer', 'TouchSms\\ApiClient\\Api\\Model\\V2SmsPostResponse200' => 'TouchSms\\ApiClient\\Api\\Normalizer\\V2SmsPostResponse200Normalizer', 'TouchSms\\ApiClient\\Api\\Model\\V2SmsPostResponse200Data' => 'TouchSms\\ApiClient\\Api\\Normalizer\\V2SmsPostResponse200DataNormalizer', 'TouchSms\\ApiClient\\Api\\Model\\V2SmsDryPostResponse200' => 'TouchSms\\ApiClient\\Api\\Normalizer\\V2SmsDryPostResponse200Normalizer', 'TouchSms\\ApiClient\\Api\\Model\\V2SmsDryPostResponse200Data' => 'TouchSms\\ApiClient\\Api\\Normalizer\\V2SmsDryPostResponse200DataNormalizer', 'TouchSms\\ApiClient\\Api\\Model\\V2AccountGetResponse200' => 'TouchSms\\ApiClient\\Api\\Normalizer\\V2AccountGetResponse200Normalizer', '\\Jane\\Component\\JsonSchemaRuntime\\Reference' => '\\TouchSms\\ApiClient\\Api\\Runtime\\Normalizer\\ReferenceNormalizer'];
        protected $normalizersCache = [];

        public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
        {
            return \array_key_exists($type, $this->normalizers);
        }

        public function supportsNormalization($data, $format = null, array $context = []): bool
        {
            return \is_object($data) && \array_key_exists(\get_class($data), $this->normalizers);
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
        {
            $normalizerClass = $this->normalizers[\get_class($object)];
            $normalizer = $this->getNormalizer($normalizerClass);

            return $normalizer->normalize($object, $format, $context);
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            $denormalizerClass = $this->normalizers[$type];
            $denormalizer = $this->getNormalizer($denormalizerClass);

            return $denormalizer->denormalize($data, $type, $format, $context);
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['TouchSms\\ApiClient\\Api\\Model\\OutboundMessage' => false, 'TouchSms\\ApiClient\\Api\\Model\\OutboundMessageResponse' => false, 'TouchSms\\ApiClient\\Api\\Model\\OutboundMessageResponseMeta' => false, 'TouchSms\\ApiClient\\Api\\Model\\OutboundMessageError' => false, 'TouchSms\\ApiClient\\Api\\Model\\SendMessageBody' => false, 'TouchSms\\ApiClient\\Api\\Model\\AccountInformation' => false, 'TouchSms\\ApiClient\\Api\\Model\\V2SmsPostResponse200' => false, 'TouchSms\\ApiClient\\Api\\Model\\V2SmsPostResponse200Data' => false, 'TouchSms\\ApiClient\\Api\\Model\\V2SmsDryPostResponse200' => false, 'TouchSms\\ApiClient\\Api\\Model\\V2SmsDryPostResponse200Data' => false, 'TouchSms\\ApiClient\\Api\\Model\\V2AccountGetResponse200' => false, '\\Jane\\Component\\JsonSchemaRuntime\\Reference' => false];
        }

        private function getNormalizer(string $normalizerClass)
        {
            return $this->normalizersCache[$normalizerClass] ?? $this->initNormalizer($normalizerClass);
        }

        private function initNormalizer(string $normalizerClass)
        {
            $normalizer = new $normalizerClass();
            $normalizer->setNormalizer($this->normalizer);
            $normalizer->setDenormalizer($this->denormalizer);
            $this->normalizersCache[$normalizerClass] = $normalizer;

            return $normalizer;
        }
    }
} else {
    class JaneObjectNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;
        protected $normalizers = ['TouchSms\\ApiClient\\Api\\Model\\OutboundMessage' => 'TouchSms\\ApiClient\\Api\\Normalizer\\OutboundMessageNormalizer', 'TouchSms\\ApiClient\\Api\\Model\\OutboundMessageResponse' => 'TouchSms\\ApiClient\\Api\\Normalizer\\OutboundMessageResponseNormalizer', 'TouchSms\\ApiClient\\Api\\Model\\OutboundMessageResponseMeta' => 'TouchSms\\ApiClient\\Api\\Normalizer\\OutboundMessageResponseMetaNormalizer', 'TouchSms\\ApiClient\\Api\\Model\\OutboundMessageError' => 'TouchSms\\ApiClient\\Api\\Normalizer\\OutboundMessageErrorNormalizer', 'TouchSms\\ApiClient\\Api\\Model\\SendMessageBody' => 'TouchSms\\ApiClient\\Api\\Normalizer\\SendMessageBodyNormalizer', 'TouchSms\\ApiClient\\Api\\Model\\AccountInformation' => 'TouchSms\\ApiClient\\Api\\Normalizer\\AccountInformationNormalizer', 'TouchSms\\ApiClient\\Api\\Model\\V2SmsPostResponse200' => 'TouchSms\\ApiClient\\Api\\Normalizer\\V2SmsPostResponse200Normalizer', 'TouchSms\\ApiClient\\Api\\Model\\V2SmsPostResponse200Data' => 'TouchSms\\ApiClient\\Api\\Normalizer\\V2SmsPostResponse200DataNormalizer', 'TouchSms\\ApiClient\\Api\\Model\\V2SmsDryPostResponse200' => 'TouchSms\\ApiClient\\Api\\Normalizer\\V2SmsDryPostResponse200Normalizer', 'TouchSms\\ApiClient\\Api\\Model\\V2SmsDryPostResponse200Data' => 'TouchSms\\ApiClient\\Api\\Normalizer\\V2SmsDryPostResponse200DataNormalizer', 'TouchSms\\ApiClient\\Api\\Model\\V2AccountGetResponse200' => 'TouchSms\\ApiClient\\Api\\Normalizer\\V2AccountGetResponse200Normalizer', '\\Jane\\Component\\JsonSchemaRuntime\\Reference' => '\\TouchSms\\ApiClient\\Api\\Runtime\\Normalizer\\ReferenceNormalizer'];
        protected $normalizersCache = [];

        public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
        {
            return \array_key_exists($type, $this->normalizers);
        }

        public function supportsNormalization($data, $format = null, array $context = []): bool
        {
            return \is_object($data) && \array_key_exists(\get_class($data), $this->normalizers);
        }

        /**
         * @return array|string|int|float|bool|\ArrayObject|null
         */
        public function normalize($object, $format = null, array $context = [])
        {
            $normalizerClass = $this->normalizers[\get_class($object)];
            $normalizer = $this->getNormalizer($normalizerClass);

            return $normalizer->normalize($object, $format, $context);
        }

        public function denormalize($data, $type, $format = null, array $context = [])
        {
            $denormalizerClass = $this->normalizers[$type];
            $denormalizer = $this->getNormalizer($denormalizerClass);

            return $denormalizer->denormalize($data, $type, $format, $context);
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['TouchSms\\ApiClient\\Api\\Model\\OutboundMessage' => false, 'TouchSms\\ApiClient\\Api\\Model\\OutboundMessageResponse' => false, 'TouchSms\\ApiClient\\Api\\Model\\OutboundMessageResponseMeta' => false, 'TouchSms\\ApiClient\\Api\\Model\\OutboundMessageError' => false, 'TouchSms\\ApiClient\\Api\\Model\\SendMessageBody' => false, 'TouchSms\\ApiClient\\Api\\Model\\AccountInformation' => false, 'TouchSms\\ApiClient\\Api\\Model\\V2SmsPostResponse200' => false, 'TouchSms\\ApiClient\\Api\\Model\\V2SmsPostResponse200Data' => false, 'TouchSms\\ApiClient\\Api\\Model\\V2SmsDryPostResponse200' => false, 'TouchSms\\ApiClient\\Api\\Model\\V2SmsDryPostResponse200Data' => false, 'TouchSms\\ApiClient\\Api\\Model\\V2AccountGetResponse200' => false, '\\Jane\\Component\\JsonSchemaRuntime\\Reference' => false];
        }

        private function getNormalizer(string $normalizerClass)
        {
            return $this->normalizersCache[$normalizerClass] ?? $this->initNormalizer($normalizerClass);
        }

        private function initNormalizer(string $normalizerClass)
        {
            $normalizer = new $normalizerClass();
            $normalizer->setNormalizer($this->normalizer);
            $normalizer->setDenormalizer($this->denormalizer);
            $this->normalizersCache[$normalizerClass] = $normalizer;

            return $normalizer;
        }
    }
}
