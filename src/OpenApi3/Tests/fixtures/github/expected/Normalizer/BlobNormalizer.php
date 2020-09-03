<?php

namespace Github\Normalizer;

use Jane\JsonSchemaRuntime\Reference;
use Jane\JsonSchemaRuntime\Normalizer\CheckArray;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class BlobNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Github\\Model\\Blob';
    }
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'Github\\Model\\Blob';
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Github\Model\Blob();
        if (\array_key_exists('content', $data)) {
            $object->setContent($data['content']);
        }
        if (\array_key_exists('encoding', $data)) {
            $object->setEncoding($data['encoding']);
        }
        if (\array_key_exists('url', $data)) {
            $object->setUrl($data['url']);
        }
        if (\array_key_exists('sha', $data)) {
            $object->setSha($data['sha']);
        }
        if (\array_key_exists('size', $data) && $data['size'] !== null) {
            $object->setSize($data['size']);
        }
        elseif (\array_key_exists('size', $data) && $data['size'] === null) {
            $object->setSize(null);
        }
        if (\array_key_exists('node_id', $data)) {
            $object->setNodeId($data['node_id']);
        }
        if (\array_key_exists('highlighted_content', $data)) {
            $object->setHighlightedContent($data['highlighted_content']);
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if (null !== $object->getContent()) {
            $data['content'] = $object->getContent();
        }
        if (null !== $object->getEncoding()) {
            $data['encoding'] = $object->getEncoding();
        }
        if (null !== $object->getUrl()) {
            $data['url'] = $object->getUrl();
        }
        if (null !== $object->getSha()) {
            $data['sha'] = $object->getSha();
        }
        if (null !== $object->getSize()) {
            $data['size'] = $object->getSize();
        }
        if (null !== $object->getNodeId()) {
            $data['node_id'] = $object->getNodeId();
        }
        if (null !== $object->getHighlightedContent()) {
            $data['highlighted_content'] = $object->getHighlightedContent();
        }
        return $data;
    }
}