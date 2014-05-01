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



}

