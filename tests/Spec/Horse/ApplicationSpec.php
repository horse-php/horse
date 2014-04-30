<?php namespace Spec\Horse;

use PhpSpec\ObjectBehavior;
use Horse\Command;

class ApplicationSpec extends ObjectBehavior {

    function let()
    {
        $this->beConstructedWith('Test Application', '1.0.0');
    }

    function it_can_be_instantiated()
    {
        $this->shouldHaveType('Horse\Application');

        $this->getName()->shouldBe('Test Application');

        $this->getVersion()->shouldBe('1.0.0');
    }

    function it_adds_a_new_command(Command $command)
    {
        $this->getCommands()->shouldHaveCount(0);

        $this->addCommand($command);

        $this->getCommands()->shouldHaveCount(1);
    }

}

