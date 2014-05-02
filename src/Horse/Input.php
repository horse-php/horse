<?php namespace Horse;

use Symfony\Component\Console\Input\InputInterface;

class Input extends Proxy {

    /**
     * Get the wrapped input object.
     *
     * @return InputInterface
     */
    public function getInput()
    {
        return $this->object;
    }

    /**
     * Alias for getOption/getArgument.
     *
     * @param string $key
     * @return mixed
     */
    public function __invoke($key)
    {
        if ($this->isArgument($key))
        {
            return $this->object->getArgument($key);
        }

        return $this->object->getOption($key);
    }

    /**
     * Determine whether the string is a valid argument name.
     *
     * @param string $string
     * @return boolean
     */
    public function isArgument($string)
    {
        return \strpos($string, '-') === false;
    }

}

