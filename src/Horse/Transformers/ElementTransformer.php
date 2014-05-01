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
        list($name, $mode, $description, $default) = $element;

        return new InputArgument($name, $this->transformMode($mode), $description, $default);
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

