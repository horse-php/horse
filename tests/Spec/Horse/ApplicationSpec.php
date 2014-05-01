<?php namespace Spec\Horse;

use PhpSpec\ObjectBehavior;
use Horse\Command;
use Symfony\Component\Console\Application;
use Horse\Testing\DummyCommand;

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

    function it_sets_the_real_console_application_instance(Application $application)
    {
        $this->getApplication()->shouldHaveType('Symfony\Component\Console\Application');

        $this->setApplication($application);

        $this->getApplication()->shouldBe($application);
    }

    function it_runs_the_application(Application $application)
    {
        $command = new DummyCommand;

        $application->add($command)->shouldBeCalled();
        $application->run()->willReturn(0);

        $this->addCommand($command);
        $this->setApplication($application);

        $this->run()->shouldBe(0);
    }

}

