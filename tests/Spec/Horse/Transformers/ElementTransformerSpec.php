<?php namespace Spec\Horse\Transformers;

use PhpSpec\ObjectBehavior;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class ElementTransformerSpec extends ObjectBehavior {

    function it_can_be_instantiated()
    {
        $this->shouldHaveType('Horse\Transformers\ElementTransformer');
    }

    function it_transforms_the_mode_identifier()
    {
        $this->transformMode('required')->shouldBe(InputArgument::REQUIRED);

        $this->transformMode('optional')->shouldBe(InputArgument::OPTIONAL);
    }

    function it_transforms_an_element()
    {
        $argument = $this->transform(['name', 'required']);

        $argument->shouldHaveType('Symfony\Component\Console\Input\InputArgument');
        $argument->isRequired()->shouldBe(true);
        $argument->getName()->shouldBe('name');
    }

}

