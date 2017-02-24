<?php

namespace HGG\PropertyAccessor;

use Symfony\Component\PropertyAccess\PropertyAccess;

trait PropertyAccessor
{
    /**
     * @var \Symfony\Component\PropertyAccess\PropertyAccessorInterface
     */
    protected $propAccessor;

    /**
     * PropertyAccessor constructor.
     */
    protected function getPropAcc()
    {
        if (null === $this->propAccessor) {
            $this->propAccessor = self::getPropertyAccessor();
        }

        return $this->propAccessor;
    }

    /**
     * @return \Symfony\Component\PropertyAccess\PropertyAccessorInterface
     */
    public static function getPropertyAccessor()
    {
        return PropertyAccess::createPropertyAccessorBuilder(
        )
            ->enableExceptionOnInvalidIndex()
            ->enableMagicCall()
            ->getPropertyAccessor();
    }

    /**
     * @param mixed  $object         An object or array
     * @param string $path           The path in the Symfony PropertyAccessor
     *                               syntax
     * @param mixed  $default        The default value to be returned if the
     *                               path does not exist and $throwException is
     *                               false
     * @param bool   $throwException Whether to throw an exception on invalid
     *                               path or not.
     *
     * @return mixed
     * @throws \Exception
     */
    public function getValue($object, $path, $default = null, $throwException = true)
    {
        try {
            $result = $this->getPropAcc()->getValue($object, $path);
        } catch (\Exception $e) {
            if ($throwException) {
                throw $e;
            } else {
                $result = $default;
            }
        }

        return $result;
    }
}

