<?php namespace Spec\Horse\Transformers;

use PhpSpec\ObjectBehavior;
use Horse\Parsers\BlockParser;
use Horse\Testing\DummyCommand;
use Horse\Parsers\MetadataParser;
use Horse\Transformers\ElementTransformer;

class ClassTransformerSpec extends ObjectBehavior {

    function let()
    {
        $this->beConstructedWith(
            new BlockParser,
            new MetadataParser,
            new ElementTransformer
        );
    }

    function it_can_be_instantiated()
    {
        $this->shouldHaveType('Horse\Transformers\ClassTransformer');
    }

    function it_transforms_a_class()
    {
        $this->transform($command = new DummyCommand)->shouldBe($command);
    }

}

