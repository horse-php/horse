<?php namespace Spec\Horse\Testing;

use PhpSpec\ObjectBehavior;

class DummyCommandSpec extends ObjectBehavior {

    function let()
    {
        $this->beConstructedWith('dummy-command');
    }

    function it_can_be_instantiated()
    {
        $this->shouldHaveType('Horse\Testing\DummyCommand');
    }

    function it_runs_the_command()
    {
        $this->execute(null, null)->shouldBe('foobar');
    }

}

