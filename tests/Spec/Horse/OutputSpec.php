<?php namespace Spec\Horse;

use PhpSpec\ObjectBehavior;
use Symfony\Component\Console\Output\NullOutput;

class OutputSpec extends ObjectBehavior {

    function let()
    {
        $this->beConstructedWith(new NullOutput);
    }

    function it_can_be_instantiated()
    {
        $this->shouldHaveType('Horse\Output');
    }

    function it_returns_the_wrapped_object()
    {
        $this->getOutput()
             ->shouldHaveType('Symfony\Component\Console\Output\NullOutput');
    }

}

