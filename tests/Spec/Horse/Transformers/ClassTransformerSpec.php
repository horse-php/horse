<?php namespace Spec\Horse\Transformers;

use PhpSpec\ObjectBehavior;
use Horse\Parsers\BlockParser;
use Horse\Testing\DummyCommand;
use Prophecy\Argument;

class ClassTransformerSpec extends ObjectBehavior {

    function let(BlockParser $parser)
    {
        $this->beConstructedWith($parser);
    }

    function it_can_be_instantiated()
    {
        $this->shouldHaveType('Horse\Transformers\ClassTransformer');
    }

    function it_transforms_a_class(DummyCommand $command)
    {
        $command->setName('dummy-command')->shouldBeCalled();
        $command->setDescription('Very dummy command')->shouldBeCalled();
        $command->setDefinition(Argument::type('array'))->shouldBeCalled();

        $this->transform($command)->shouldBe($command);
    }

}

