<?php namespace Horse\Transformers;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class ElementTransformer {

    /**
     * The mode identifiers and their respective values.
     *
     * @var array
     */
    protected $modes = [
        'required' => InputArgument::REQUIRED,
        'optional' => InputArgument::OPTIONAL,

        'value_none'     => InputOption::VALUE_NONE,
        'value_required' => InputOption::VALUE_REQUIRED,
        'value_optional' => InputOption::VALUE_OPTIONAL,
    ];

    /**
     * Transform the element to an instance of InputArgument or InputOption.
     *
     * @param array $element
     * @return mixed
     */
    public function transform(array $element)
    {
        // argument: [name, mode, description, default]
        // option: [name, shortcut, mode, description, default]

        $isArgument = $this->isArgument($element[0]);

        $class = 'Symfony\Component\Console\Input\Input'.($isArgument ? 'Argument' : 'Option');

        $reflector = new \ReflectionClass($class);

        if ($isArgument)
        {
            $element[1] = $this->transformMode($element[1]);
        }
        else
        {
            $element[2] = $this->transformMode($element[2]);
        }

        $element[0] = $this->cleanName($element[0]);

        return $reflector->newInstanceArgs($element);
    }

    /**
     * Transform the argument/option mode.
     *
     * @param string $mode
     * @return integer
     */
    public function transformMode($mode)
    {
        if (\array_key_exists($mode, $this->modes))
        {
            return $this->modes[$mode];
        }

        throw new \UnexpectedValueException("Mode {$mode} does not exist");
    }

    /**
     * Determine whether it's an argument based on the name.
     *
     * @param string $name
     * @return boolean
     */
    public function isArgument($name)
    {
        return \strpos($name, '-') === false;
    }

    /**
     * Clean the argument/option name.
     *
     * @param string $name
     * @return string
     */
    public function cleanName($name)
    {
        return \str_replace('-', '', $name);
    }

}

