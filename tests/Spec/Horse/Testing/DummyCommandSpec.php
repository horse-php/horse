<?php namespace Spec\Horse\Testing;

use PhpSpec\ObjectBehavior;

class DummyCommandSpec extends ObjectBehavior {

    function it_can_be_instantiated()
    {
        $this->shouldHaveType('Horse\Testing\DummyCommand');
    }



}
