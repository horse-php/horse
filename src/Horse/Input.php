<?php namespace Horse;

use Symfony\Component\Console\Input\InputInterface;

class Input {

    /**
     * The input.
     *
     * @var InputInterface
     */
    protected $input;

    /**
     * The constructor.
     *
     * @param InputInterface $input
     * @return Input
     */
    public function __construct(InputInterface $input)
    {
        $this->input = $input;
    }

    // custom methods....

    /**
     * Redirect dynamic method call.
     *
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    public function __call($name, array $arguments = [])
    {
        return \call_user_func_array([$this->input, $name], $arguments);
    }

}

