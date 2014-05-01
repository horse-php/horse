<?php namespace Spec\Horse\Transformers;

use PhpSpec\ObjectBehavior;
use Horse\Parsers\BlockParser;
use Horse\Testing\DummyCommand;
use Horse\Parsers\MetadataParser;
use Horse\Transformers\ElementTransformer;

class ClassTransformerSpec extends ObjectBehavior {

    function let()
    {
        // BlockParser cannot be instantiated without a \Reflector instance
        $reflector = new \ReflectionClass('stdClass');

        $this->beConstructedWith(
            new BlockParser($reflector),
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

