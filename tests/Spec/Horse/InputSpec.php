<?php namespace Spec\Horse;

use PhpSpec\ObjectBehavior;
use Symfony\Component\Console\Input\ArrayInput;

class InputSpec extends ObjectBehavior {

    function let()
    {
        $this->beConstructedWith(new ArrayInput([]));
    }

    function it_can_be_instantiated()
    {
        $this->shouldHaveType('Horse\Input');
    }

    function it_validates_an_argument_name()
    {
        $this->isArgument('-f')->shouldBe(false);
        $this->isArgument('--age')->shouldBe(false);
        $this->isArgument('name')->shouldBe(true);
    }

    function it_returns_the_wrapped_object()
    {
        $this->getInput()
             ->shouldHaveType('Symfony\Component\Console\Input\ArrayInput');
    }

}

