<?php namespace Spec\Horse;

use PhpSpec\ObjectBehavior;
use Horse\Command;

class ApplicationSpec extends ObjectBehavior {

    function it_is_initializable()
    {
        $this->shouldHaveType('Horse\Application');
    }

    function it_adds_a_new_command(Command $command)
    {
        $this->getCommands()->shouldHaveCount(0);

        $this->addCommand($command);

        $this->getCommands()->shouldHaveCount(1);
    }

}

