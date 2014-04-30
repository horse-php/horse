<?php namespace Spec\Horse;

use PhpSpec\ObjectBehavior;

class CommandSpec extends ObjectBehavior {

    function it_can_be_instantiated()
    {
        $this->shouldHaveType('Horse\Command');
    }



}
