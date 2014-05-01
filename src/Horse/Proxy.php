<?php namespace Horse;

abstract class Proxy {

    /**
     * The wrapped object.
     *
     * @var mixed
     */
    protected $object;

    /**
     * The constructor.
     *
     * @param mixed $object
     * @return Proxy
     */
    public function __construct($object)
    {
        $this->object = $object;
    }

    /**
     * Redirect dynamic method call.
     *
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    public function __call($name, array $arguments = [])
    {
        return \call_user_func_array([$this->object, $name], $arguments);
    }

}

